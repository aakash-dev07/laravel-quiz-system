<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorey;
use App\Models\Mcq;
use App\Models\Quize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    function admin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where([
            'name'     => $validatedData['name'],
            'password' => $validatedData['password']
        ])->first();


        if ($admin) {
            Session::put('admin', $admin);
            return redirect('dashboard');
        }


        return redirect()->back()->withErrors(['name' => 'Invalid credentials.']);
    }

    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            $username = $admin->name;
            return view('admin', ['name' => $username]);
        } else {
            return redirect('admin-login');
        }
    }

    function categories()
    {
        $categories = Categorey::all();
        $admin = Session::get('admin');
        if ($admin) {
            $username = $admin->name;
            return view('categories', ['name' => $username, 'categories' => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        Session::forget('admin');
        return redirect('admin-login');
    }

    function categoriesData(Request $request)
    {
        $validation = $request->validate([
            'categorey' => 'required|min:3|unique:categoreys,name'
        ]);
        $admin = Session::get('admin');
        $categorey = new Categorey;

        $categorey->name = $request->categorey;
        $categorey->creator = $admin->name;

        if ($categorey->save()) {
            return redirect('admin-categories');
        } else {
            return "failed";
        }
    }

    function deleteCategories($id)
    {
        $deletedata = Categorey::destroy($id);
        if ($deletedata) {
            return redirect('admin-categories');
        } else {
            return "Something went wrong";
        }
    }

    function addQuiz()
    {
        $categories = Categorey::all();
        $admin = Session::get('admin');
        if ($admin) {
            $username = $admin->name;
            $quiz_data = request('quiz');
            $categorey_id = request('category_id');

            if ($quiz_data && $categorey_id && !Session::has('QuizDetails')) {
                $quiz = new Quize();
                $quiz->name = $quiz_data;
                $quiz->categorey_id = $categorey_id;

                if ($quiz->save()) {
                    Session::put('QuizDetails', $quiz);
                }
            }

            return view('add-quiz', ['name' => $username, 'categories' => $categories]);
        } else {
            return redirect('dashboard');
        }
    }

    function addMcqs(Request $request)
    {
        $mcq = new Mcq();
        $admin = Session::get('admin');
        $quiz = Session::get('QuizDetails');

        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->categorey_id = $quiz->categorey_id;
        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->correct_ans = $request->correct_ans;

        if ($mcq->save()) {
            if ($mcq->submit == "add-more") {
                return redirect(url()->previous());
            } else {
                Session::forget('QuizDetails');
                return redirect('/admin-categories');
            }
        }
    }
}

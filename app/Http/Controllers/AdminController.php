<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorey;
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

    function dashboard(){
        $admin=Session::get('admin');
        if($admin){
            $username=$admin->name;
            return view('admin',['name'=>$username]);
        } else{
            return redirect('admin-login');
        }
    }

    function categories(){
         $admin=Session::get('admin');
        if($admin){
            $username=$admin->name;
            return view('categories',['name'=>$username]);

        } else{
            return redirect('admin-login');
        }
    }

    function logout(){
        Session::forget('admin');
        return redirect('admin-login');
    }

    function categoriesData(Request $request){
        $admin=Session::get('admin');
        $categorey=new Categorey;
        $categorey->name=$request->categorey;
        $categorey->creator=$admin->name;

        if($categorey->save()){
            return "success";
        }else{
            return "failed";
        }

    }
}

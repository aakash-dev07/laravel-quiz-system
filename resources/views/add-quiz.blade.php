<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-quiz</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    <!-- Navbar Component -->
    <x-navbar :name="$name"></x-navbar>


    <!-- Main Content Wrapper -->

    @if(!session('QuizDetails'))

    <div class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md mx-4">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Add Quiz</h2>

            <form action="\add-quiz" method="get" class="space-y-6">
                @csrf

                <div>
                    <label for="quiz" class="block text-sm font-medium text-gray-700 mb-2">Admin name</label>
                    <input
                        type="text"
                        id="quiz"
                        name="quiz"
                        placeholder="Enter Quiz name"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                    @error('admin_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>

                    <select
                        id="category_id"
                        name="category_id"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-white">
                        <option value="" disabled selected>-- Choose a Category --</option>

                        @isset($categories)
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @endisset
                    </select>

                    @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Login
                    </button>
                </div>
            </form>
        </div>

    </div>
    @else
    <div class="bg-gray-100 font-sans min-h-[calc(100vh-4rem)] flex items-center justify-center py-8">
        <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-xl mx-4 border border-gray-200">

            <div class="text-center mb-6">
                <p class="text-green-600 font-bold text-lg">
                    Quiz : {{ session('QuizDetails')->name }}
                </p>
                <h2 class="text-3xl font-semibold text-gray-800 mt-2">Add MCQs</h2>
            </div>

            <form action="add-mcqs" method="post" class="space-y-5">

            @csrf

                <input type="hidden" name="quiz_id" value="{{ session('QuizDetails')->id }}">

                <div>
                    <textarea
                        name="question"
                        rows="3"
                        placeholder="Enter your question name"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none"></textarea>
                </div>

                <div>
                    <input
                        type="text"
                        name="a"
                        placeholder="Enter first option"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                </div>

                <div>
                    <input
                        type="text"
                        name="b"
                        placeholder="Enter second option"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                </div>

                <div>
                    <input
                        type="text"
                        name="c"
                        placeholder="Enter third option"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                </div>

                <div>
                    <input
                        type="text"
                        name="d"
                        placeholder="Enter forth option"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                </div>

                <div>
                    <select
                        name="correct_ans"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-white">
                        <option value="" disabled selected>Select Right Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row gap-4">
                    <button
                        type="submit"
                        name="action"
                        value="add-more"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Add More
                    </button>

                    <button
                        type="submit"
                        name="action"
                        value="done"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

</body>

</html>
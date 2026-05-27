<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    <!-- Navbar Component -->
    <x-navbar :name="$name"></x-navbar>

    <!-- Main Content Wrapper -->
    <main class="max-w-4xl w-full mx-auto p-4 sm:p-6 lg:p-8 flex flex-col space-y-8">

        <!-- 1. Add Category Form -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Add New Category</h2>

            <form action="/add-categories" method="POST" class="flex flex-col sm:flex-row items-end gap-4">
                @csrf

                <!-- Input Field -->
                <div class="flex-grow w-full">
                    <label for="categories" class="block text-sm font-medium text-gray-700 mb-1.5">Category Name</label>
                    <input
                        type="text"
                        id="categories"
                        name="categorey"
                        placeholder="Enter category name (e.g., PHP, Science)"
                        required
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                </div>

                @error('categorey')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <div class="w-full sm:w-auto">
                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 whitespace-nowrap">
                        Add Category
                    </button>
                </div>
            </form>
        </div>

        <!-- 2. Categories List Table Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-lg font-bold text-gray-800">Existing Categories</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-6 py-3.5 w-20">ID</th>
                            <th class="px-6 py-3.5">Category Name</th>
                            <th class="px-6 py-3.5">Creator</th>
                            <th class="px-6 py-3.5 text-right w-28">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @isset($categories)
                        @foreach($categories as $category)
                        <tr class="hover:bg-gray-50/70 transition duration-150">
                            <td class="px-6 py-4 font-medium text-gray-950">{{ $category->id }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $category->name }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    {{ $category->creator ?? $name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <!-- Delete Form Link -->
                                

                                <a href="{{ url('/delete-category/'.$category->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this category?');"
                                    class="inline-flex items-center space-x-1 text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg font-medium transition duration-150">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <!-- Default Dummy Row (For Preview Only) -->
                        <tr class="hover:bg-gray-50/70 transition duration-150">
                            <td class="px-6 py-4 font-medium text-gray-950">#1</td>
                            <td class="px-6 py-4 font-semibold text-gray-800">General Knowledge</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    {{ $name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button type="button" class="inline-flex items-center space-x-1 text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg font-medium transition duration-150">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                    <span>Delete</span>

                                    </a>
                                </button>
                            </td>
                        </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

</html>
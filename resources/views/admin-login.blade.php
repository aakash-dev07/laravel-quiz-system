<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md mx-4">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Admin Login</h2>

        <form action="\admin-login" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="admin_name" class="block text-sm font-medium text-gray-700 mb-2">Admin name</label>
                <input 
                    type="text" 
                    id="admin_name" 
                    name="name" 
                    placeholder="Enter Admin name" 
                    required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                >
                @error('admin_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter Admin password" 
                    required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Login
                </button>
            </div>
        </form>
        </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

   <x-navbar name={{$name}}>
        
   </x-navbar>

   <div class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

   <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md mx-4">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Add categories</h2>

        <form action="\add-categories" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="admin_name" class="block text-sm font-medium text-gray-700 mb-2">Admin name</label>
                <input 
                    type="text" 
                    id="categories" 
                    name="categorey" 
                    placeholder="Enter Categorie name" 
                    required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                >
              
            </div>

            

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-xl transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Add
                </button>
            </div>
        </form>
        </div>
        </div>

</body>
</html>
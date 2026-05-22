 <header class="bg-[#fcfbf7] border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <div class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="text-2xl font-bold text-slate-800 tracking-tight">QuizMaster Pro</span>
                </div>

                <nav class="hidden md:flex items-center space-x-1 h-full">
                    <a href="#" class="bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Overview</a>
                    <a href="/dashboard" class="bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Dashboard</a>
                    <a href="/admin-categories" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Manage Categories</a>
                    <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Manage Quizzes</a>
                    <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Reports</a>
                    <a href="#" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-4 py-2 rounded-lg text-sm font-medium transition duration-150">Admin Profile</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <div class="h-9 w-9 rounded-full bg-slate-300 flex items-center justify-center text-slate-700 font-semibold border border-gray-300 shadow-sm overflow-hidden">
                            <svg class="h-6 w-6 text-gray-500 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="text-sm hidden sm:block">
                            <p class="text-gray-400 text-xs leading-none">Welcome,</p>
                            <p class="text-gray-800 font-semibold leading-tight mt-0.5"> {{ucfirst($name)}}</p>
                        </div>
                    </div>
                    
                    <a href="/logout" class="text-sm font-medium text-red-600 hover:text-red-700 hover:underline border-l border-gray-300 pl-4 transition duration-150">
                        Logout
                    </a>
                </div>

            </div>
        </div>
    </header>

    
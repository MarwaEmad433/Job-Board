<header class="header text-gray-600 body-font border-b border-gray-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('listings.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl text-white">Laravel Job Board</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            @auth
                <a href="{{ route('dashboard') }}" class="mr-5 hover:text-gray-400">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="mr-5 hover:text-gray-400">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-5 hover:text-gray-400">Login</a>
                <a href="{{ route('register') }}" class="mr-5 hover:text-gray-400">Register</a>
            @endauth
        </nav>
        <a href="{{ route('listings.create') }}" class="inline-flex items-center bg-indigo-500 text-white border-0 py-1 px-3 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Post Job
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</header>

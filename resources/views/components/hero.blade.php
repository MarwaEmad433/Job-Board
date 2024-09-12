<section class="text-gray-600 body-font border-b border-gray-100 relative">
    <div class="container mx-auto flex flex-col px-5 pt-16 pb-8 justify-center items-center relative">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 w-full h-full">
            <img src="https://images.pexels.com/photos/5716004/pexels-photo-5716004.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Background Image" class="w-full h-full object-cover opacity-50">
        </div>
        
        <!-- Content -->
        <div class="w-full md:w-2/3 flex flex-col items-center text-center z-10 relative">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-black">Top Jobs in the Industry</h1>
            <p class="mb-8 leading-relaxed text-black">Are you looking to advance your career or explore new opportunities? We've compiled a comprehensive list of job openings from various companies and locations, giving you the best options to choose from.</p>
            
            <!-- Search Form -->
            <form class="flex w-full justify-center items-end" action="{{ route('listings.index') }}" method="get">
                <div class="relative mr-4 w-full lg:w-1/2 text-left">
                    <input type="text" id="s" name="s" value="{{ request()->get('s') }}" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
            </form>
            
            <!-- Aligning Paragraph -->
            <p class="text-sm mt-2 text-black mb-8 w-full lg:w-1/2 text-left">Fullstack PHP, Vue, Node, React Native</p>
        </div>
    </div>
</section>

<x-app-layout>
    <x-hero></x-hero>
    <section class="container px-5 py-12 mx-auto">
        <!-- Tags Section -->
        <div class="mb-12">
            <div class="flex justify-center flex-wrap">
                @foreach($tags as $tag)
                    <a href="{{ route('listings.index', ['tag' => $tag->slug]) }}"
                       class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-gray-700 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-gray-700 text-white' : 'bg-white text-gray-700' }}"
                    >{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>

        <!-- Jobs Heading -->
        <div class="mb-12">
            <h2 class="text-2xl font-medium text-blue-600 title-font px-4">All Jobs ({{ $listings->total() }})</h2>
        </div>

        <!-- Jobs Listing -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($listings as $listing)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden p-4 flex flex-col justify-between h-full transform transition-transform duration-300 hover:scale-105 hover:shadow-xl border border-gray-200">
                    <a href="{{ route('listings.show', $listing->slug) }}" class="block flex flex-col flex-grow">
                        <div class="flex-1">
                            <div class="mb-1">
                                <!-- Company Name -->
                                <span class="text-blue-600 font-semibold text-xs">Company:</span>
                                <span class="company-name text-gray-900 text-xs">{{ $listing->company }}</span>
                            </div>
                            <div class="mb-1">
                                <!-- Position -->
                                <span class="text-blue-600 font-semibold text-xs">Position:</span>
                                <span class="position-title text-gray-900 text-xs">{{ $listing->title }}</span>
                            </div>
                            <div class="mb-1">
                                <!-- Location -->
                                <span class="text-blue-600 font-semibold text-xs">Location:</span>
                                <span class="location text-gray-900 text-xs">{{ $listing->location }}</span>
                            </div>
                            <!-- Tags -->
                            <p class="mt-2 text-gray-600 text-xs">{{ $listing->tags->pluck('name')->join(', ') }}</p>
                        </div>
                    </a>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('listings.show', $listing->slug) }}" class="text-white bg-gray-700 hover:bg-gray-800 inline-flex items-center py-1 px-3 rounded-md text-xs">
                            View Details
                        </a>
                        <a href="{{ route('listings.apply', $listing->slug) }}" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center py-1 px-3 rounded-md text-xs">
                            Apply Now
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l7-7-7-7m0 14H3m12-2h-9a2 2 0 01-2-2V7a2 2 0 012-2h12"></path>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $listings->links() }}
        </div>
    </section>
</x-app-layout>

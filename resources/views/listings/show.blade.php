<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <!-- Sticky card -->
                <div class="lg:w-1/3 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <div class="sticky top-0 bg-white shadow-lg rounded-lg border border-gray-200 p-6">
                        <p class="text-2xl font-bold text-blue-700 mb-2">{{ $listing->title }}</p>
                        <p class="text-lg text-gray-800 mb-4">{{ $listing->company }} &mdash; {{ $listing->location }}</p>
                        <a
                            href="{{ route('listings.apply', $listing->slug) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 inline-flex items-center py-3 px-6 rounded-md"
                        >
                            Apply Now
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l7-7-7-7m0 14H3m12-2h-9a2 2 0 01-2-2V7a2 2 0 012-2h12"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Job details -->
                <div class="lg:w-2/3 w-full lg:pl-10 lg:py-6">
                    <h2 class="text-2xl font-semibold text-blue-800 mb-4 border-b-2 border-blue-200 pb-2">Job Description</h2>
                    <p class="leading-relaxed text-lg mb-6">
                        As a Marketing Manager at Padberg, Littel and Hartmann, you will play a crucial role in driving the company's marketing strategies and initiatives. Your primary responsibilities will include:
                    </p>
                    <ul class="list-disc list-inside mb-6">
                        <li><strong class="text-blue-600">Strategy Development:</strong> Design and implement comprehensive marketing strategies that align with the company's goals and objectives.</li>
                        <li><strong class="text-blue-600">Campaign Management:</strong> Oversee the creation, execution, and optimization of marketing campaigns across various channels, including digital, print, and social media.</li>
                        <li><strong class="text-blue-600">Market Analysis:</strong> Conduct thorough market research to identify trends, opportunities, and competitive landscape to inform marketing decisions.</li>
                        <li><strong class="text-blue-600">Team Leadership:</strong> Lead and mentor a team of marketing professionals, providing guidance and support to ensure high performance and effective collaboration.</li>
                        <li><strong class="text-blue-600">Budget Management:</strong> Manage the marketing budget efficiently, ensuring optimal allocation of resources and maximizing ROI.</li>
                        <li><strong class="text-blue-600">Reporting & Analytics:</strong> Monitor and analyze the performance of marketing campaigns, providing regular reports and insights to senior management.</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-blue-800 mb-4 border-b-2 border-blue-200 pb-2">Qualifications</h3>
                    <ul class="list-disc list-inside mb-6">
                        <li>Bachelor’s degree in Marketing, Business Administration, or related field. Master’s degree is a plus.</li>
                        <li>Proven experience in a marketing management role, with a track record of successful campaign execution.</li>
                        <li>Strong understanding of marketing principles, digital marketing tools, and analytics.</li>
                        <li>Excellent leadership, communication, and organizational skills.</li>
                        <li>Ability to work under pressure and manage multiple projects simultaneously.</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-blue-800 mb-4 border-b-2 border-blue-200 pb-2">Benefits</h3>
                    <ul class="list-disc list-inside mb-6">
                        <li>Competitive salary and performance bonuses</li>
                        <li>Health, dental, and vision insurance</li>
                        <li>401(k) with company match</li>
                        <li>Professional development opportunities</li>
                        <li>Flexible working hours and remote work options</li>
                    </ul>

                    <p class="text-lg text-gray-800">Join Padberg, Littel and Hartmann and be a part of a dynamic team that is dedicated to innovation and excellence in marketing!</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

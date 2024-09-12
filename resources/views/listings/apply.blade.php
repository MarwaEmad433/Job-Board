<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                    <h2 class="text-2xl font-medium text-gray-900 title-font">Apply for {{ $listing->title }}</h2>
                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-200 text-red-800">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form
                        action="{{ route('applications.store', $listing->id) }}"
                        method="post"
                        class="bg-gray-100 p-4"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" value="Full Name" />
                            <x-input
                                id="name"
                                class="block mt-1 w-full"
                                type="text"
                                name="name"
                                required />
                        </div>
                        <div class="mb-4">
                            <x-label for="email" value="Email Address" />
                            <x-input
                                id="email"
                                class="block mt-1 w-full"
                                type="email"
                                name="email"
                                required />
                        </div>
                        <div class="mb-4">
                            <x-label for="phone" value="Phone Number" />
                            <x-input
                                id="phone"
                                class="block mt-1 w-full"
                                type="text"
                                name="phone"
                                required />
                        </div>
                        <div class="mb-4">
                            <x-label for="resume" value="Upload Resume" />
                            <x-input
                                id="resume"
                                class="block mt-1 w-full"
                                type="file"
                                name="resume" />
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

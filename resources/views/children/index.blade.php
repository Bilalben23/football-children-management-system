<x-app-layout title="les enfants">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-8 text-2xl md:text-3xl font-extrabold text-center text-[#1A2130] dark:text-[#E88D67]">
                        {{ $children->count() }} {{ __('Enfants nés en') }}
                        <span
                            class="inline-block px-3 py-1 text-xl font-bold text-white bg-[#1A2130] rounded-md md:text-2xl">
                            {{ $categoryYear }}
                        </span>
                    </h1>

                    <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
                        @forelse($children as $child)
                            <a href="{{ route('child-categories.children.show', $child->id) }}"
                                class="relative flex items-center p-6 space-x-6 transition bg-[#1A2130] border-2 border-transparent rounded-lg shadow-lg hover:opacity-95 hover:border-[#E88D67] hover:shadow-2xl">
                                {{-- Child image --}}
                                <div
                                    class="top-1 left-1 px-1 border-2 border-black absolute text-sm font-semibold bg-gray-800 rounded-md shadow-lg">
                                    <p>{{ $categoryYear }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    @if ($child->image_url)
                                        <img src="{{ asset('storage/' . $child->image_url) }}"
                                            alt="{{ $child->full_name }}"
                                            class="rounded-full w-[100px] h-[100px] shadow-lg border-2 border-gray-300 dark:border-gray-700">
                                    @else
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvVzu0fxErlbjy3Hondhcruo5whW10rTjkD_PxSRlw5NSEHDg9Hyn4ohOc42nX_S1dz2E&usqp=CAU"
                                            alt="{{ $child->full_name }}"
                                            class="rounded-full w-[100px] h-[100px] shadow-lg border-2 border-gray-300 dark:border-gray-700">
                                    @endif
                                </div>

                                {{-- Child details --}}
                                <div class="flex-grow">
                                    <p class="mb-2 text-xl font-bold text-[#E88D67]">{{ $child->full_name }}</p>
                                    <p class="flex items-center mb-1 text-sm text-gray-400">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm8 2v12H6V4h8zM5 8h10v2H5V8zm0 4h10v2H5v-2z" />
                                        </svg>
                                        {{ date('j-M-Y', strtotime($child->birth_date)) }}
                                    </p>
                                    <p class="flex items-center text-gray-200">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V7h2v2z" />
                                        </svg>
                                        {{ $child->child_cin }}
                                    </p>
                                </div>
                            </a>
                        @empty
                            <div class="flex flex-col items-center justify-center py-12 mx-auto col-span-full">
                                <p class="mb-4 text-lg text-center text-gray-500">
                                    {{ __('Aucun enfant à afficher pour le moment.') }}
                                </p>
                                <a href="{{ route('child-categories.children.create') }}"
                                    class="px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                    {{ __('Créer un nouvel enfant') }}
                                </a>
                            </div>
                        @endforelse
                    </div>

                    {{-- Create new child button --}}
                    <div class="flex items-center justify-center mt-6 col-span-full">
                        <a href="{{ route('child-categories.children.create') }}"
                            class="inline-block px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                            {{ __('Créer un nouvel enfant') }}
                        </a>
                    </div>

                    {{-- Pagination --}}
                    @if ($children->hasPages())
                        <div class="mt-8">
                            {{ $children->appends(['category' => request()->query('category')])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

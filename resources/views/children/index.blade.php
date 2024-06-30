<x-app-layout title="Children">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-8 text-3xl font-extrabold text-center text-[#1A2130] dark:text-[#E88D67]">Les Enfants
                    </h1>

                    @forelse ($children->groupBy('birth_year') as $birthYear => $childrenByYear)
                        <h2 class="text-xl font-semibold text-[#E88D67] mb-4">{{ $birthYear }}</h2>

                        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($childrenByYear as $child)
                                <a href="{{ route('children.show', $child->id) }}"
                                    class="block overflow-hidden transition transform bg-white rounded-lg shadow-md dark:bg-gray-900 hover:scale-105">
                                    <div class="relative">
                                        <img src="{{ $child->image_url ? asset('storage/' . $child->image_url) : 'https://via.placeholder.com/150' }}"
                                            alt="{{ $child->full_name }}"
                                            class="object-cover w-full h-64 rounded-lg sm:h-48 md:h-56 lg:h-64">
                                        <div
                                            class="absolute inset-0 transition bg-black rounded-lg opacity-0 hover:opacity-60">
                                        </div>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <p class="text-lg font-semibold text-white">{{ $child->full_name }}</p>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <p class="flex items-center mb-2 text-sm text-gray-600 dark:text-gray-300">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-300"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm8 2v12H6V4h8zM5 8h10v2H5V8zm0 4h10v2H5v-2z" />
                                            </svg>
                                            {{ date('j M Y', strtotime($child->birth_date)) }}
                                        </p>
                                        <p class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-300"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V7h2v2z" />
                                            </svg>
                                            {{ $child->child_cin }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center py-12 col-span-full">
                            <p class="mb-4 text-lg text-center text-gray-500">
                                {{ __('Aucun enfant à afficher pour le moment.') }}
                            </p>
                            <a href="{{ route('children.create') }}"
                                class="px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                {{ __('Créer un nouvel enfant') }}
                            </a>
                        </div>
                    @endforelse

                    {{-- @if ($children->hasPages())
                        <div class="mt-8">
                            {{ $children->links() }}
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout title="Children">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-8 text-2xl md:text-3xl font-extrabold text-center text-[#1A2130] dark:text-[#E88D67]">
                        <span class="block">{{ __('Les catégories') }}</span>
                        <span class="block text-sm md:text-base text-gray-600 dark:text-gray-400 font-medium">
                            {{ __("La liste des catégories d'enfants existe") }}
                        </span>
                    </h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($years as $year)
                            <a href="{{ route('children.index') }}?category={{ $year }}"
                                class="block relative group bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden hover:shadow-xl hover:opacity-90 transition duration-300 ease-in-out border-2 border-gray-600 hover:border-white">
                                <img src="https://img.lovepik.com/background/20211021/large/lovepik-silhouette-particles-of-creative-football-match-background-image_400182238.jpg"
                                    alt="{{ $year }}"
                                    class="w-full h-48 md:h-56 lg:h-52 object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                <div
                                    class="absolute inset-0 bg-black opacity-50 group-hover:opacity-60 transition-opacity duration-300">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <p class="text-xl font-black text-white tracking-wide">
                                        {{ $year }}
                                    </p>
                                </div>
                            </a>
                        @empty
                            <div class="flex flex-col items-center justify-center py-12 col-span-full">
                                <p class="mb-4 text-lg text-center text-gray-500">
                                    {{ __('Aucune catégorie à afficher.') }}
                                </p>
                                <a href="{{ route('children.create') }}"
                                    class="inline-block px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                    {{ __('Créer un nouvel enfant') }}
                                </a>
                            </div>
                        @endforelse

                        <!-- Placeholder for creating a new child -->
                        <div class="flex items-center justify-center">
                            <a href="{{ route('children.create') }}"
                                class="inline-block px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                {{ __('Créer un nouvel enfant') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

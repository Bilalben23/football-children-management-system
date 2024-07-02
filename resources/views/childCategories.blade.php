<x-app-layout title="Children">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-8 text-2xl md:text-3xl font-extrabold text-center text-[#1A2130] dark:text-[#E88D67]">
                        <span class="block">{{ __('Les catégories') }}</span>
                        <span class="block text-sm font-medium text-gray-600 md:text-base dark:text-gray-400">
                            {{ __("La liste des catégories d'enfants existe") }}
                        </span>
                    </h1>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @forelse ($years as $year)
                            <div>
                                <a href="{{ route('child-categories.children.index') }}?category={{ $year }}"
                                    class="relative block overflow-hidden transition duration-300 ease-in-out bg-white border-2 border-gray-600 rounded-lg shadow-md group dark:bg-gray-900 hover:shadow-xl hover:opacity-90 hover:border-white">
                                    <img src="https://img.lovepik.com/background/20211021/large/lovepik-silhouette-particles-of-creative-football-match-background-image_400182238.jpg"
                                        alt="{{ $year }}"
                                        class="object-cover w-full h-48 transition-opacity duration-300 md:h-56 lg:h-52 opacity-80 group-hover:opacity-100">
                                    <div
                                        class="absolute inset-0 transition-opacity duration-300 bg-black opacity-50 group-hover:opacity-60">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                        <p class="text-xl font-black tracking-wide text-white ">
                                            {{ $year }}
                                        </p>
                                    </div>
                                </a>

                                <a href="#"
                                    class="block px-2 py-1 mt-2 text-center transition bg-blue-500 rounded-lg shadow-lg hover:opacity-90 focus:ring-2 ring-white">
                                    <i class="mr-2 fas fa-download"></i>{{ __('Télécharger la liste') }}
                                </a>


                            </div>
                        @empty
                            <div class="flex flex-col items-center justify-center py-12 col-span-full">
                                <p class="mb-4 text-lg text-center text-gray-500">
                                    {{ __('Aucune catégorie à afficher.') }}
                                </p>
                                <a href="{{ route('child-categories.children.create') }}"
                                    class="inline-block px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                    {{ __('Créer un nouvel enfant') }}
                                </a>
                            </div>
                        @endforelse

                        <!-- Placeholder for creating a new child -->
                        @if ($years->isNotEmpty())
                            <div class="flex items-center justify-center col-span-full">
                                <a href="{{ route('child-categories.children.create') }}"
                                    class="inline-block px-4 py-2 text-blue-600 transition bg-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200">
                                    {{ __('Créer un nouvel enfant') }}
                                </a>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

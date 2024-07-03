<x-app-layout title="Dashboard">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-bold mb-8">{{ __('Gestion des Enfants') }}</h2>

                    <!-- Statistics Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Total Categories -->
                        <div class="bg-yellow-600 dark:bg-yellow-700 p-6 rounded-lg shadow-md text-white min-w-fit">
                            <h3 class="text-lg font-semibold mb-2 text-nowrap">{{ __('Total des catégories') }}</h3>
                            <p class="text-3xl">{{ $totalCategories }}</p>
                        </div>

                        <!-- Total Children -->
                        <div class="bg-blue-600 dark:bg-blue-700 p-6 rounded-lg shadow-md text-white min-w-fit">
                            <h3 class="text-lg font-semibold mb-2 text-nowrap">{{ __('Total des Enfants') }}</h3>
                            <p class="text-3xl">{{ $totalChildren }}</p>
                        </div>

                        <!-- New Registrations -->
                        <div class="bg-green-600 dark:bg-green-700 p-6 rounded-lg shadow-md text-white min-w-fit">
                            <h3 class="text-lg font-semibold mb-2 text-nowrap">{{ __('Nouvelles Inscriptions') }}</h3>
                            <p class="text-3xl">{{ $newRegistrations }}</p>
                        </div>
                    </div>

                    <!-- Children by Year -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                            {{ __("Catégories d'enfants") }}
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-4 py-3 bg-gray-200 dark:bg-gray-700 border-b-2 border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('Année') }}
                                        </th>
                                        <th
                                            class="px-4 py-3 bg-gray-200 dark:bg-gray-700 border-b-2 border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __("Nombre d'enfants") }}
                                        </th>
                                        <th
                                            class="px-4 py-3 bg-gray-200 dark:bg-gray-700 border-b-2 border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($childrenByYear as $yearData)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                            <td
                                                class="px-4 py-3 border-b border-gray-300 dark:border-gray-600 font-semibold">
                                                {{ $yearData->year }}
                                            </td>
                                            <td
                                                class="px-4 py-3 border-b border-gray-300 dark:border-gray-600 font-semibold">
                                                {{ $yearData->count }}
                                            </td>
                                            <td class="px-4 py-3 border-b border-gray-300 dark:border-gray-600">
                                                <a href="{{ route('child-categories.childrenList.pdf', $yearData->year) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg hover:bg-blue-700 transition">
                                                    <i class="fas fa-download mr-2"></i> {{ __('Télécharger') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recent Activities Section -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                            {{ __('Activités Récentes') }}
                        </h3>
                        <ul class="divide-y divide-gray-300 dark:divide-gray-600">
                            <!-- Recent Registration -->
                            <li class="flex items-start py-4">
                                <span
                                    class="rounded-full bg-blue-500 dark:bg-blue-600 text-white flex items-center justify-center h-10 w-10">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <div class="ml-4">
                                    <p class="text-gray-900 dark:text-gray-100">
                                        {{ __('Nouvel enfant inscrit :') }}
                                        <a href="{{ route('child-categories.children.show', $recentlyRegisteredChild->id) }}"
                                            class="underline">{{ $recentlyRegisteredChild->first_name }}
                                            {{ $recentlyRegisteredChild->last_name }}</a>
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __(':date', ['date' => $recentlyRegisteredChild->created_at->diffForHumans()]) }}
                                    </p>
                                </div>
                            </li>

                            <!-- Recent Update -->
                            <li class="flex items-start py-4">
                                <span
                                    class="rounded-full bg-green-500 dark:bg-green-600 text-white flex items-center justify-center h-10 w-10">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <div class="ml-4">
                                    <p class="text-gray-900 dark:text-gray-100">
                                        {{ __('Profil mis à jour pour l\'enfant :') }}
                                        <a href="{{ route('child-categories.children.show', $recentlyUpdatedChild->id) }}"
                                            class="underline">{{ $recentlyUpdatedChild->first_name }}
                                            {{ $recentlyUpdatedChild->last_name }}</a>
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ __(':date', ['date' => $recentlyUpdatedChild->updated_at->diffForHumans()]) }}
                                    </p>
                                </div>
                            </li>
                        </ul>

                    </div>

                    <!-- Call to Action Section -->
                    <div class="flex justify-end">
                        <a href="{{ route('child-categories.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm uppercase rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-list-alt mr-2"></i> {{ __('Voir toutes les catégories') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

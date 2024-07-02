<x-app-layout title="Créer un enfant">
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-2xl font-bold text-center">{{ __('Créer un enfant') }}</h1>
                    <form action="{{ route('child-categories.children.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="first_name"
                                    class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ __('Prénom') }}</label>
                                <div class="relative">
                                    <input type="text" id="first_name" name="first_name" required
                                        placeholder="{{ __('Entrez le prénom...') }}" value="{{ old('first_name') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    @error('first_name')
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @enderror
                                </div>
                                @error('first_name')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ __('Nom de famille') }}</label>
                                <div class="relative">
                                    <input type="text" id="last_name" name="last_name" required
                                        placeholder="{{ __('Entrez le nom de famille...') }}"
                                        value="{{ old('last_name') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    @error('last_name')
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @enderror
                                </div>
                                @error('last_name')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="birth_date"
                                    class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ __('Date de naissance') }}</label>
                                <div class="relative">
                                    <input type="date" id="birth_date" name="birth_date"
                                        placeholder="{{ __('Entrez la date de naissance...') }}"
                                        value="{{ old('birth_date') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    @error('birth_date')
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @enderror
                                </div>
                                @error('birth_date')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="parent_phone"
                                    class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ __('Numéro de téléphone des parents') }}</label>
                                <div class="relative">
                                    <input type="tel" id="parent_phone" name="parent_phone"
                                        placeholder="{{ __('Entrez le téléphone des parents...') }}"
                                        value="{{ old('parent_phone') }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    @error('parent_phone')
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @enderror
                                </div>
                                @error('parent_phone')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="image"
                                    class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ __('Photo de l\'enfant') }}</label>
                                <div class="relative">
                                    <input type="file" id="image" name="image"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                    @error('image')
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @enderror
                                </div>
                                @error('image')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end mt-6">
                            <a href="{{ route('child-categories.children.index') }}"
                                class="px-4 py-2 text-white bg-red-500 rounded-md shadow-lg hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:outline-none">{{ __('Annuler') }}</a>
                            <button type="submit"
                                class="px-4 py-2 ml-4 text-white bg-blue-500 rounded-md shadow-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ __('Créer') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

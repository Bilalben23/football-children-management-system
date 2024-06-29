<x-app-layout title="Child Information">
    <div class="px-4 py-8 bg-gray-100 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-900">
                <div class="p-6 md:p-8">
                    <h1 class="mb-6 text-2xl font-bold text-center text-white md:text-3xl">
                        {{ __("Informations sur l'enfant") }}</h1>
                    <div class="flex flex-col items-center md:flex-row md:items-start md:space-x-8">
                        <div class="w-1/2 mb-6 md:mb-0">
                            @if ($child->image_url)
                                <a href="{{ asset('storage/' . $child->image_url) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $child->image_url) }}" alt="{{ $child->full_name }}"
                                        class="object-cover w-40 h-40 border-4 border-gray-200 rounded-full shadow-lg md:w-52 md:h-52 dark:border-gray-700">
                                </a>
                            @else
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvVzu0fxErlbjy3Hondhcruo5whW10rTjkD_PxSRlw5NSEHDg9Hyn4ohOc42nX_S1dz2E&usqp=CAU"
                                    alt="{{ $child->full_name }}"
                                    class="object-cover w-40 h-40 border-4 border-gray-200 rounded-full shadow-lg md:w-52 md:h-52 dark:border-gray-700">
                            @endif
                        </div>
                        <div class="flex flex-col items-center w-full md:items-start">
                            <div class="mb-6 text-center md:text-left">
                                <p class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $child->first_name }}
                                    {{ $child->last_name }}</p>
                                <p class="mt-1 ml-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ date('j-M-Y', strtotime($child->birth_date)) }}</p>
                                <p class="ml-1 text-sm text-gray-600 dark:text-gray-40">{{ __('CIN:') }}
                                    {{ $child->child_cin }}</p>
                            </div>
                            <div class="flex items-center mb-6 space-x-4">
                                <a href="{{ route('children.edit', $child) }}"
                                    class="flex items-center px-4 py-2 text-white transition bg-blue-600 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="mr-2 fas fa-pen-square"></i>
                                    <span>{{ __('Modifier') }}</span>
                                </a>
                                <form action="{{ route('children.destroy', $child) }}" method="POST"
                                    onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cet enfant ?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center px-4 py-2 text-white transition bg-red-600 rounded-md shadow-md hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <i class="mr-2 fas fa-trash-alt"></i>
                                        <span>{{ __('Supprimer') }}</span>
                                    </button>
                                </form>
                            </div>
                            <hr class="w-full mb-6 border-gray-300 dark:border-gray-600">
                            @if ($child->parent_phone)
                                <a href="tel:{{ $child->parent_phone }}"
                                    class="flex items-center space-x-3 text-gray-800 dark:text-gray-300">
                                    <span
                                        class="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full shadow dark:bg-gray-700">
                                        <i class="text-lg text-yellow-500 fas fa-phone-volume"></i>
                                    </span>
                                    <span class="font-semibold hover:underline">{{ $child->parent_phone }}</span>
                                </a>
                            @endif
                            <div class="w-full mt-6">
                                <form action="{{ route('childNotes.store') }}" method="POST">
                                    @csrf
                                    <label for="notes"
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Ajouter une note à cet enfant') }}:</label>
                                    <textarea id="notes" name="notes" rows="4" placeholder="Ajouter une note à cet enfant ..."
                                        class="w-full p-2 text-gray-800 bg-gray-200 rounded-md dark:bg-gray-700 dark:text-white"></textarea>
                                    <button type="submit"
                                        class="px-4 py-2 mt-4 text-white transition bg-green-600 rounded-md shadow-md hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        <i class="mr-2 fas fa-plus"></i> {{ __('Soumettre') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

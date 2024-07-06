<x-app-layout title="Informations sur l'enfant">
    <div class="px-4 py-8 bg-gray-100 sm:px-6 lg:px-8 dark:bg-gray-800">
        <div class="mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-900">
                <div class="p-6 md:p-8 relative">
                    @php
                        $isNew = $child->created_at->diffInDays(now()) <= 7;
                        $isEdited = $child->updated_at > $child->created_at;
                    @endphp

                    <div
                        class="flex justify-between flex-row mt-2 text-gray-600 dark:text-gray-400 left-2 right-2 absolute top-1 text-xs md:flex-col md:items-end gap-y-2">
                        @if ($isEdited)
                            <div
                                class="flex items-center text-xs font-semibold px-2 py-1 text-white bg-yellow-500 rounded-md">
                                <i class="fas fa-pencil-alt mr-1"></i>
                                <span>{{ __('Modifié') }}</span>
                            </div>
                        @endif
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-1"></i>
                            <span>{{ __('Rejoint ') }}</span>
                            <span class="ml-1 font-semibold">{{ $child->created_at->diffForHumans() }}</span>
                        </div>
                    </div>


                    <h1 class="mt-8 mb-10 md:mt-6 text-2xl font-bold text-center text-white md:text-3xl">
                        {{ __("Informations sur l'enfant") }}</h1>

                    <div class="flex flex-col md:flex-row md:items-start md:space-x-8">
                        <div class="w-full md:w-1/2 mb-6 md:mb-0 relative">
                            {{-- Badge for creation or editing --}}

                            <div class="w-fit mx-auto relative">
                                @if ($isNew)
                                    <div
                                        class="absolute top-3 left-1 flex items-center space-x-1 px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-md">
                                        <i class="fas fa-star"></i>
                                        <span>{{ __('Nouveau') }}</span>
                                    </div>
                                @endif
                                {{-- Child image --}}
                                @if ($child->image_url)
                                    <a href="{{ asset('storage/' . $child->image_url) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $child->image_url) }}"
                                            alt="{{ $child->full_name }}"
                                            class="object-cover w-40 h-40 border-4 border-gray-200 rounded-full shadow-lg md:w-52 md:h-52 dark:border-gray-700">
                                    </a>
                                @else
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvVzu0fxErlbjy3Hondhcruo5whW10rTjkD_PxSRlw5NSEHDg9Hyn4ohOc42nX_S1dz2E&usqp=CAU"
                                        alt="{{ $child->full_name }}"
                                        class="object-cover w-40 h-40 border-4 border-gray-200 rounded-full shadow-lg md:w-52 md:h-52 dark:border-gray-700">
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full md:items-start">
                            <div class="mb-6 text-center md:text-left">
                                <p class="text-xl font-bold text-gray-800 dark:text-gray-200">{{ $child->first_name }}
                                    {{ $child->last_name }}</p>
                                <p class="mt-1 ml-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ date('j-M-Y', strtotime($child->birth_date)) }}</p>
                                <p class="ml-1 text-sm text-gray-600 dark:text-gray-400">{{ __('CIN:') }}
                                    {{ $child->child_cin }}</p>
                            </div>

                            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 items-center mb-6">
                                <a href="{{ route('child-categories.children.edit', $child) }}"
                                    class="flex items-center px-4 py-2 text-white transition bg-blue-600 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="mr-2 fas fa-pen-square"></i>
                                    <span class="text-sm">{{ __('Modifier') }}</span>
                                </a>

                                <form action="{{ route('child-categories.children.destroy', $child) }}" method="POST"
                                    onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cet enfant ?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center px-4 py-2 text-white transition bg-red-600 rounded-md shadow-md hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        <i class="mr-2 fas fa-trash-alt"></i>
                                        <span class="text-sm">{{ __('Supprimer') }}</span>
                                    </button>
                                </form>

                                <a href="{{ route('child-categories.childCard.pdf', $child->id) }}"
                                    class="flex items-center justify-center px-3 py-2 text-blue-600 transition bg-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-200 col-span-2 md:col-span-1">
                                    <i class="fas fa-file-pdf mr-1"></i>
                                    <span class="text-sm">{{ __('Télécharger') }}</span>
                                </a>

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
                                    <input type="hidden" name="child_id" value="{{ $child->id }}">
                                    <label for="notes"
                                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Ajouter une note à cet enfant') }}:</label>
                                    <div class="relative">
                                        <textarea id="notes" name="note" rows="4" placeholder="Ajouter une note à cet enfant ..."
                                            class="w-full p-2 text-gray-800 bg-gray-200 rounded-md dark:bg-gray-700 dark:text-white @error('note') border-red-500 @enderror">{{ old('note') }}</textarea>
                                        @error('note')
                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-red-500 pointer-events-none">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
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

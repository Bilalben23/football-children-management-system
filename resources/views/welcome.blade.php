<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
        <div class="flex justify-between items-center py-2 px-5">
            <div>
                <img src="https://shffaf.com/wp-content/uploads/2023/09/Federation-Royal-Moroccan-DE-Football-shffaf.com2_.png"
                    alt="logo" class="w-[80px] rounded-full">
            </div>
            @if (Route::has('login'))
                <nav class="flex
                    items-center space-x-5 justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">
                            {{ __('Dashboard') }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-3 py-1.5 bg-white rounded shadow text-black transition focus:ring-2 hover:opacity-90">
                            {{ __('Log in') }}
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-3 py-1.5 bg-blue-500 rounded shadow transition focus:ring-2 ring-white opacity-90">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
        <div x-data='{
        images: [
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
            "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
        ]
    }'
            class="flex items-center overflow-x-hidden space-x-2 mt-5 w-[90%] mx-auto p-4">
            <template x-for="(img, index) in images" :key="index">
                <div class="mb-4 shrink-0 w-1/3 odd:scale-110 even:opacity-20 even:scale-90 p-1">
                    <img :src="img" :alt="'img ' + index" class="w-full rounded-md ">
                </div>
            </template>
        </div>
    </div>



</body>

</html>

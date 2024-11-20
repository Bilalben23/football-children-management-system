<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">
    <header class="flex justify-between items-center py-2 px-5 bg-white dark:bg-gray-800 shadow-md">
        <div>
            <img src="https://media.istockphoto.com/id/1398961707/vector/football-logo-soccer-club-or-team-emblem-badge-icon-design-with-a-ball-sport-tournament.jpg?s=612x612&w=0&k=20&c=FNu0JndVvEOiVaVjMtGwkLVGntxdFGqtQ_mdLqV-gP4="
                alt="Logo" class="w-12 rounded-full">
        </div>
        @if (Route::has('login'))
            <nav class="flex items-center space-x-5">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-blue-500 hover:underline">
                        {{ __('Dashboard') }}
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded shadow transition duration-200 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ __('Log in') }}
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded shadow transition duration-200 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                            {{ __('Register') }}
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="mt-8">
        <section class="relative w-[90%] mx-auto p-4">
            <h2 class="text-xl font-bold text-center mb-4">Our Gallery</h2>
            <div x-data='{
                images: [
                    "https://www.diplomacyandcommerce.rs/wp-content/uploads/2022/12/EquipeduMaroc-2-1200x800px.jpeg",
                    "https://vcdn1-english.vnecdn.net/2024/05/29/kylian-mbappe-7250181-1280-8677-1716952064.jpg?w=680&h=0&q=100&dpr=2&fit=crop&s=hMAFBhY3g6gJOlCeYrRVUA",
                    "https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_lg_2x/f_auto/primary/ydk9vatpnihwfquy6zq3",
                    "https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_xl_2x/f_auto/primary/djnacbhtd6zvpkdiixah",
                    "https://www.nih.gov/sites/default/files/news-events/research-matters/2023/20230911-sports.jpg",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcQSkaFykM3YKbx1A2z1Jjds7KhjRqsKMLQA&s"
                ],
                currentIndex: 0,
                nextImage() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                },
                prevImage() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                }
            }'
                class="flex items-center justify-center relative">
                <template x-for="(img, index) in images" :key="index">
                    <div x-show="index === currentIndex" class="transition-opacity duration-500 w-[500px]">
                        <img :src="img" :alt="'Image ' + index"
                            class="w-full  rounded-md shadow-lg h-[400px] object-cover">
                    </div>
                </template>
                <button @click="prevImage()"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-800 w-[50px] h-[50px] transition hover:scale-">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button @click="nextImage()"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-800 w-[50px] h-[50px] transition hover:scale-">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </section>
    </main>

    <footer class="mt-10 text-center p-4">
        <p class="text-sm">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageCarousel', () => ({
                images: [],
                currentIndex: 0,
                nextImage() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                },
                prevImage() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images
                        .length;
                }
            }));
        });
    </script>
</body>

</html>

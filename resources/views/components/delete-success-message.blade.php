@if (session('delete-success-message'))
    <div class="fixed z-10 p-4 text-white transition-opacity duration-500 ease-in-out transform -translate-x-1/2 bg-red-500 shadow-lg opacity-100 rounded-xl top-5 left-1/2"
        x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="flex items-center">
            <i class="mr-2 fas fa-check-circle"></i>
            <p class="text-center">{{ session('delete-success-message') }}</p>
        </div>
    </div>
@endif

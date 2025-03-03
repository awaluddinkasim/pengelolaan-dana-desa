<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ config('app.name') }}</span>
                    <img class="h-8 w-auto" src="{{ asset('assets/images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" id="open-menu-button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    aria-label="Open main menu">
                    <span class="sr-only">Open main menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/" class="text-sm/6 font-semibold text-gray-900">Home</a>
                <a href="/publikasi" class="text-sm/6 font-semibold text-gray-900">Publikasi</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @if (Auth::check())
                    <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-gray-900">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                @endif
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden hidden" id="mobile-menu" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-75"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">{{ config('app.name') }}</span>
                        <img class="h-8 w-auto" src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                    <button type="button" id="close-menu-button" class="-m-2.5 rounded-md p-2.5 text-gray-700"
                        aria-label="Close menu">
                        <span class="sr-only">Close menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                            <a href="/publikasi"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Publikasi</a>
                        </div>
                        <div class="py-6">
                            @if (Auth::check())
                                <a href="{{ route('dashboard') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{ $slot }}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('button[aria-label="Open main menu"]');
            const closeButton = document.querySelector('button[aria-label="Close menu"]');
            const mobileMenu = document.querySelector('div[role="dialog"]');

            const showMenu = () => {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            };

            const hideMenu = () => {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            };

            if (menuButton) {
                menuButton.addEventListener('click', showMenu);
            }

            if (closeButton) {
                closeButton.addEventListener('click', hideMenu);
            }
        });
    </script>
</body>

</html>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach (config('menu') as $menu)
                @isset($menu['submenu'])
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i data-lucide="{{ $menu['icon'] }}"></i>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $menu['label'] }}</span>

                            <i data-lucide="chevron-down"></i>
                        </button>
                        <ul id="dropdown-example" class="py-2 space-y-2 @if (request()->segment(2) != $menu['active']) hidden @endif">
                            @foreach ($menu['submenu'] as $submenu)
                                <li>
                                    <a href="{{ isset($submenu['route-name']) ? route($submenu['route-name']) : '#' }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 @if (request()->segment(3) == $submenu['active']) nav-active @endif">
                                        {{ $submenu['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ isset($menu['route-name']) ? route($menu['route-name']) : '#' }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @if (request()->segment(2) == $menu['active']) nav-active @endif">
                            <i data-lucide="{{ $menu['icon'] }}"></i>
                            <span class="ms-3">{{ $menu['label'] }}</span>
                        </a>
                    </li>
                @endisset
            @endforeach
        </ul>
    </div>
</aside>

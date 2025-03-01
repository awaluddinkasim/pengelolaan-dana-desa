@props(['title' => null])

<div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    @if ($title)
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
    @endif
    <div class="mb-1 font-normal text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </div>
</div>

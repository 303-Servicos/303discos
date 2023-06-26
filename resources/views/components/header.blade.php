@props([
    'title' => ''
])

<div class="flex justify-between items-center">
    <h2 @class([
            'font-semibold',
            'text-xl',
            'text-gray-800',
            'dark:text-gray-200',
            'leading-tight',
            'my-2' => Route::currentRouteName() === 'dashboard',
        ])>
        {{ $title }}
    </h2>

    {{ $slot }}
</div>

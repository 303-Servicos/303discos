<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Dashboard') }}"/>
    </x-slot>

    <x-container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {!! __("Você está logado como <b>:role</b>", ['role' => user()->role->name]) !!}
            </div>
        </div>
        <div class="mt-4 dark:bg-gray-900 bg-gray-900">
            <img src="{{ url('images/logo.png') }}" class="mx-auto" width="500" alt="303 Discos">
        </div>
    </x-container>
</x-app-layout>

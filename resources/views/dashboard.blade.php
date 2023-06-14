<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Dashboard') }}"/>
    </x-slot>

    <x-container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in as :role", ['role' => user()->role->name]) }}
            </div>
        </div>
    </x-container>

</x-app-layout>

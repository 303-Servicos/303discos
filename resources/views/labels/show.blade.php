<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __(':label', ['label' => $label->name]) }}">
            <x-buttons.nav-link-secondary text="Voltar" href="{{ route('labels.index') }}"/>
        </x-header>
    </x-slot>

    <x-container>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if($label->logo)
                    <img src="{{ url($label->logo) }}" class="mx-auto w-96" alt="{{ $label->name }}">
                @else
                    <img src="https://via.placeholder.com/384/" class="mx-auto" alt="logo">
                @endif
                <h1 class="text-3xl font-bold mt-4">{{ $label->name }}</h1>
            </div>
        </div>
    </x-container>
</x-app-layout>

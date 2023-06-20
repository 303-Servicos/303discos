<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Criar novo label') }}">
            <x-buttons.nav-link-secondary text="Voltar" href="{{ route('labels.index') }}"/>
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('labels.store')">
            <x-form.input label="Nome" name="name" placeholder="Ex: Paulo Cavalcanti"/>
            <x-form.input label="Email" name="email" type="email" placeholder="Ex: teste@email.com.br"/>

            <x-buttons.primary>Salvar</x-buttons.primary>
        </x-form>
    </x-container>
</x-app-layout>

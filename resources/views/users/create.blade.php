<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Criar novo usuário') }}">
            <x-buttons.nav-link-secondary-button href="{{ route('users.index') }}">Voltar</x-buttons.nav-link-secondary-button>
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('users.store')">
            <x-form.input label="Nome" name="name" placeholder="Paulo Cavalcanti" />
            <x-form.input label="Email" name="email" type="email" placeholder="teste@email.com.br" />
            <x-form.input label="Senha" name="password" type="password" placeholder="********"/>
            <x-form.input label="Confirmação de senha" name="password_confirmation" type="password"  placeholder="********"/>
            <x-form.select label="Tipo de usuário" name="role_id" :options="$roles" placeholder="Selecione uma opção"/>

            <x-buttons.primary>Salvar</x-buttons.primary>
        </x-form>
    </x-container>
</x-app-layout>

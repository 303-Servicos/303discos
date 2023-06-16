<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Editar usuário') }}">
            <x-buttons.nav-link-secondary-button href="{{ route('users.index') }}">
                Voltar
            </x-buttons.nav-link-secondary-button>
        </x-header>
    </x-slot>

    <x-container>
        <x-form put :action="route('users.update', $user)">
            <x-form.input label="Nome" name="name" placeholder="Paulo Cavalcanti" :value="$user->name"/>
            <x-form.input label="Email" name="email" type="email" placeholder="teste@email.com.br" :value="$user->email"/>

            @if($user->id != user()->id)
                <x-form.select label="Tipo de usuário" name="role_id" :options="$roles" placeholder="Selecione uma opção" :value="$user->role_id"/>
            @endif

            <x-buttons.primary>Salvar</x-buttons.primary>
        </x-form>
    </x-container>
</x-app-layout>

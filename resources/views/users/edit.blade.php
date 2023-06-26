<x-app-layout>
    <x-slot name="header">
        <x-header title="{!! __('Editar :user', ['user' => $user->name]) !!}">
            <x-buttons.nav-link-secondary text="Voltar" href="{{ route('users.index') }}"/>
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('users.update', $user)" put>
            <x-form.input label="Nome" name="name" placeholder="Ex: Paulo Cavalcanti" :value="$user->name" required/>
            <x-form.input label="Email" name="email" type="email" placeholder="Ex: teste@email.com.br" :value="$user->email" required/>
            @can('update-user-role', $user)
                <x-form.select label="Tipo de usuário" name="role_id" :options="$roles" placeholder="Selecione uma opção" :value="$user->role_id" required/>
            @endcan

            <x-buttons.primary text="Salvar"/>
        </x-form>
    </x-container>
</x-app-layout>

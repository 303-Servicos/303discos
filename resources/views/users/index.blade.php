<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Usuários') }}">
            @can('create', \App\Models\User::class)
                <x-buttons.nav-link-primary text="Criar novo usuário" href="{{ route('users.create') }}"/>
            @endcan
        </x-header>
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Nome</x-table.th>
                    <x-table.th>E-mail</x-table.th>
                    <x-table.th>Tipo de usuário</x-table.th>
                    <x-table.th>Status</x-table.th>
                    <x-table.th/>
                </tr>
            </x-table.thead>
            <tbody>
            @foreach($users as $user)
                <x-table.tr>
                    <x-table.td>{{ $user->id }}</x-table.td>
                    <x-table.first-td>{{ $user->name }}</x-table.first-td>
                    <x-table.td>{{ $user->email }}</x-table.td>
                    <x-table.td>{{ $user->role->name }}</x-table.td>
                    <x-table.td>
                        @if($user->is_active)
                            <x-badges.green text="Ativo"/>
                        @else
                            <x-badges.red text="Inativo"/>
                        @endif
                    </x-table.td>
                    <x-table.action-td>
                        @can('update', $user)
                            <x-nav-link.blue text="Editar" :href="route('users.edit', $user)"/>
                        @else
                            <x-nav-link.blue-disabled text="Editar"/>
                        @endcan

                        @if($user->is_active)
                            @can('delete', $user)
                                <x-form :action="route('users.inactivate', $user)" put>
                                    <x-buttons.nav-link-yellow text="Inativar"/>
                                </x-form>
                            @else
                                <x-nav-link.yellow-disabled text="Inativar"/>
                            @endcan
                        @else
                            @can('restore', $user)
                                <x-form :action="route('users.activate', $user)" put>
                                    <x-buttons.nav-link-green text="Ativar"/>
                                </x-form>
                            @else
                                <x-nav-link.green-disabled text="Ativar"/>
                            @endcan
                        @endif

                        @can('forceDelete', $user)
                            <x-form delete :action="route('users.destroy', $user)">
                                <x-buttons.nav-link-red text="Excluir"/>
                            </x-form>
                        @else
                            <x-nav-link.red-disabled text="Excluir"/>
                        @endcan
                    </x-table.action-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
        {{ $users->links() }}
    </x-container>
</x-app-layout>

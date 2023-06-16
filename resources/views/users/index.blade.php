<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Usuários') }}">
            @can('create', \App\Models\User::class)
                <x-buttons.nav-link-primary-button href="{{ route('users.create') }}">
                    Criar novo usuário
                </x-buttons.nav-link-primary-button>
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
                    <x-table.td>{{ $user->is_active ? 'Ativo' : 'Inativo' }}</x-table.td>
                    <x-table.action-td>
                        @can('update', user())
                            <a href="{{ route('users.edit', $user) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Editar
                            </a>
                        @endcan

                        @if($user->is_active)
                            @can('inactivate-user', $user)
                                <a href="{{ route('users.edit', $user) }}" class="font-medium text-yellow-500 dark:text-yellow-400 hover:underline">
                                    Inativar
                                </a>
                            @else
                                <x-buttons.primary disabled class="font-medium text-yellow-500/25 dark:text-yellow-500/25">
                                    Inativar
                                </x-buttons.primary>
                            @endcan
                        @else
                            @can('activate-user', $user)
                                <a href="{{ route('users.edit', $user) }}" class="font-medium text-green-500 dark:text-green-500 hover:underline">
                                    Ativar
                                </a>
                            @else
                                <x-buttons.primary disabled class="font-medium text-green-500/25 dark:text-green-500/25">
                                    Ativar
                                </x-buttons.primary>
                            @endcan
                        @endif

                        @can('delete', $user)
                            <x-form delete :action="route('users.destroy', $user)">
                                <x-buttons.primary class="font-medium text-red-500 dark:text-red-500 hover:underline">
                                    Excluir
                                </x-buttons.primary>
                            </x-form>
                        @else
                            <x-buttons.primary disabled class="font-medium text-red-500/25 dark:text-red-500/25">
                                Excluir
                            </x-buttons.primary>
                        @endcan
                    </x-table.action-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
    </x-container>
</x-app-layout>

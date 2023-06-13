<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Usuários') }}"/>
        @can('update', user())
            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">Criar</button>
        @endcan
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>Nome</x-table.th>
                    <x-table.th>E-mail</x-table.th>
                    <x-table.th>Tipo de usuário</x-table.th>
                    <x-table.th/>
                </tr>
            </x-table.thead>
            <tbody>
            @foreach($users as $user)
                <x-table.tr>
                    <x-table.first-td>{{ $user->name }}</x-table.first-td>
                    <x-table.td>{{ $user->email }}</x-table.td>
                    <x-table.td>{{ $user->role->name }}</x-table.td>
                    <x-table.last-td>
                        @can('update', user())
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Editar
                            </a>
                        @endcan
                    </x-table.last-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
    </x-container>
</x-app-layout>

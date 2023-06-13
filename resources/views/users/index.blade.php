<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>
                        Nome
                    </x-table.th>
                    <x-table.th>
                        E-mail
                    </x-table.th>
                    <x-table.th>
                        Tipo de usuário
                    </x-table.th>
                    <x-table.th/>
                </tr>
            </x-table.thead>
            <tbody>
            @foreach($users as $user)
                <x-table.tr>
                    <x-table.first-td>
                        {{ $user->name }}
                    </x-table.first-td>
                    <x-table.td>
                        {{ $user->email }}
                    </x-table.td>
                    <x-table.td>
                        {{ $user->role->name }}
                    </x-table.td>
                    <x-table.last-td>
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </x-table.last-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
    </x-container>
</x-app-layout>

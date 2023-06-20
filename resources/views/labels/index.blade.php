<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Labels') }}">
            @can('create', \App\Models\Label::class)
                <x-buttons.nav-link-primary href="{{ route('labels.create') }}">
                    Criar novo label
                </x-buttons.nav-link-primary>
            @endcan
        </x-header>
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>Logo</x-table.th>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Nome</x-table.th>
                    <x-table.th>Slug</x-table.th>
                    <x-table.th>Discogs</x-table.th>
                    <x-table.th/>
                </tr>
            </x-table.thead>
            <tbody>
            @foreach($labels as $label)
                <x-table.tr>
                    <x-table.td>{{ $label->logo }}</x-table.td>
                    <x-table.first-td>{{ $label->id }}</x-table.first-td>
                    <x-table.td>{{ $label->name }}</x-table.td>
                    <x-table.td>{{ $label->slug }}</x-table.td>
                    <x-table.td>{{ $label->discogs }}</x-table.td>
                    <x-table.action-td>
                        @can('update', $label)
                            <x-nav-link.blue text="Editar" :href="route('labels.edit', $label)"/>
                        @else
                            <x-nav-link.blue-disabled text="Editar"/>
                        @endcan

                        @if($label->is_active)
                            @can('delete', $label)
                                <x-form :action="route('labels.inactivate', $label)" put>
                                    <x-buttons.nav-link-yellow text="Inativar"/>
                                </x-form>
                            @else
                                <x-nav-link.yellow-disabled text="Inativar"/>
                            @endcan
                        @else
                            @can('restore', $label)
                                <x-form :action="route('labels.activate', $label)" put>
                                    <x-buttons.nav-link-green text="Ativar"/>
                                </x-form>
                            @else
                                <x-nav-link.green-disabled text="Ativar"/>
                            @endcan
                        @endif

                        @can('forceDelete', $label)
                            <x-form delete :action="route('labels.destroy', $label)">
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
        {{ $labels->links() }}
    </x-container>
</x-app-layout>

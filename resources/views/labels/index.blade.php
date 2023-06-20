<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Labels') }}">
            @can('create', \App\Models\Label::class)
                <x-buttons.nav-link-primary text="Criar novo label" href="{{ route('labels.create') }}"/>
            @endcan
        </x-header>
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>ID</x-table.th>
                    <x-table.th>Logo</x-table.th>
                    <x-table.th>Nome</x-table.th>
                    <x-table.th>Slug</x-table.th>
                    <x-table.th>Discogs</x-table.th>
                    <x-table.th/>
                </tr>
            </x-table.thead>
            <tbody>
            @foreach($labels as $label)
                <x-table.tr>
                    <x-table.first-td>{{ $label->id }}</x-table.first-td>
                    <x-table.td>{{ $label->logo }}</x-table.td>
                    <x-table.td>{{ $label->name }}</x-table.td>
                    <x-table.td>{{ $label->slug }}</x-table.td>
                    <x-table.td><x-nav-link.blue text="Discogs" :href="$label->discogs" target="_blank"/></x-table.td>
                    <x-table.action-td>

                    </x-table.action-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
        {{ $labels->links() }}
    </x-container>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Selos') }}">
            @can('create', \App\Models\Label::class)
                <x-buttons.nav-link-primary text="Criar novo selo" href="{{ route('labels.create') }}"/>
            @endcan
        </x-header>
    </x-slot>

    <x-container>
        <x-table>
            <x-table.thead>
                <tr>
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
                    <x-table.td>
                        @if($label->logo)
                            <a href="{{ url($label->logo) }}" target="_blank">
                                <img src="{{ url($label->logo) }}" class="mx-auto" width="50" alt="logo">
                            </a>
                        @else
                            <a href="https://via.placeholder.com/70/" target="_blank">
                                <img src="https://via.placeholder.com/70/" class="mx-auto" alt="logo">
                            </a>
                        @endif
                    </x-table.td>
                    <x-table.td>{{ $label->name }}</x-table.td>
                    <x-table.td>{{ $label->slug }}</x-table.td>
                    <x-table.td>
                        @if($label->discogs)
                            <x-nav-link.blue text="Discogs" :href="$label->discogs" target="_blank"/>
                        @endif
                    </x-table.td>
                    <x-table.action-td>

                    </x-table.action-td>
                </x-table.tr>
            @endforeach
            </tbody>
        </x-table>
        {{ $labels->links() }}
    </x-container>
</x-app-layout>

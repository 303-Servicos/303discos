<x-app-layout>
    <x-slot name="header">
        <x-header title="{{ __('Editar :label', ['label' => $label->name]) }}">
            <x-buttons.nav-link-secondary text="Voltar" href="{{ route('labels.index') }}"/>
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('labels.update', $label)" put>
            <x-form.input label="Nome" name="name" placeholder="Ex: Southside Records" :value="$label->name" required/>
            <x-form.input label="Discogs" name="discogs" placeholder="Ex: https://www.discogs.com/release/26043718-Various-Southside-Records-002" :value="$label->discogs"/>
            <x-form.input-file label="Logo" name="logo" helper="Máximo 2MB. Formatos: PNG, JPG, JPEG (Mín. 300x300px)."/>

            <x-buttons.primary text="Salvar"/>
        </x-form>
    </x-container>
</x-app-layout>

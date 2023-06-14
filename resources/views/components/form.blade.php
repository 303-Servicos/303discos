@props([
    'action',
    'put' => null,
    'delete' => null,
])

<form method="POST" action="{{ $action }}" {{ $attributes }}>
    @csrf

    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>

@props([
    'action',
    'put' => null,
    'delete' => null,
])

<form method="POST" action="{{ $action }}" {{ $attributes }} enctype="multipart/form-data">
    @csrf

    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>

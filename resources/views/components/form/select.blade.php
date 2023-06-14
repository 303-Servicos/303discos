@props([
    'label',
    'name',
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'options' => [],
])

<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                   focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                   dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                   ">
        @if($placeholder)
            <option selected disabled>{{ $placeholder }}</option>
        @endif
        @foreach($options as $key => $option)
            <option value="{{ $option->id }}" @selected(old($name) == $option->id)>{{ $option->name }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="text-red-400">{{ $message }}</span>
    @enderror
</div>

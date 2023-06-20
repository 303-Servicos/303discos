@props([
    'label',
    'name',
    'helper' => '',
    'required' => null,
])
<div class="mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">
        {{ $label }}
    </label>
    <input id="{{ $name }}"
           name="{{ $name }}"
           type="file"
           aria-describedby="{{ $name }}_help"
           {{ $required ? 'required' : '' }}
           {{ $attributes }}
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                  cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none
                  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="{{ $name }}_help">
        {{ $helper }}
    </p>
    @error($name)
    <span class="text-red-400">{{ $message }}</span>
    @enderror
</div>

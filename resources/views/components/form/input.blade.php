@props([
    'label',
    'name',
    'type' => 'text',
    'value' => old($name),
])

<div>
    <label for="{{ $name }}" class="block font-medium mb-1">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        {{ $attributes->merge(['class' => 'border border-gray-300 rounded px-3 py-2 w-full outline-indigo-500']) }}>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

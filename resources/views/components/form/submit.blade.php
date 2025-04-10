@props([
    'label' => 'Simpan'
])

<button type="submit"
    {{ $attributes->merge(['class' => 'bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded']) }}>
    {{ $label }}
</button>

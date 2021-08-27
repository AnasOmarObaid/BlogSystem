@props(['type', 'name'])
<div class="mb-6">
    <x-forms.lable name="{{ $name }}" />
    <input type="{{ $type }}" name="{{ $name }}"
        class="border border-gray-400 p-2 w-full @error($name) is-invalid @enderror"
        {{ $attributes}} />
    <x-errors.error input="{{ $name }}" />
</div>

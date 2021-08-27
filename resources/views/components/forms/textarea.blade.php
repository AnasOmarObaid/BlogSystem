@props(['name'])
<div class="mb-6">
    <x-forms.lable name="{{ $name }}" />
    <textarea name="{{ $name }}" style="width: 100%;height: 100px;padding: 4px;font-size: small;"
        class="border border-gray-400 @error($name) is-invalid @enderror">{{ $slot ?? '' }}</textarea>
    <x-errors.error input="{{ $name }}" />
</div>

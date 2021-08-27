@props(['name', 'categories', 'category_id'=> false])
<div class="mb-6">
    <x-forms.lable name="{{$name}}" />
    <select name="{{$name}}" style="width: 100%;background-color: whitesmoke;padding: 6px;cursor: pointer;">
        @foreach ($categories as $category)
            <option value="{{$category->id}}" {{ old('category_id', $category_id) == $category->id ? 'selected' : '' }} >{{$category->name}}</option>
        @endforeach
    </select>
    <x-errors.error input="{{ $name }}" />
</div>
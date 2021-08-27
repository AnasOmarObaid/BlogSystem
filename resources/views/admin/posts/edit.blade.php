<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-forms.panel>
                <h1 class="text-center font-bold text-xl">Edit POST</h1>
                <form action="@route('admin.posts.update', [$post])" method="post" class="mt-10"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    {{-- title --}}
                    <x-forms.input type="text" name="title" :value="@old('title', $post->title)" />

                    {{-- thumbnail --}}
                    <x-forms.input type="file" name="thumbnail" :value="@old('thumbnail', $post->thumbnail)" />
                        
                    <div style="display: flex;justify-content: center;margin-bottom: 2rem;">
                        <img src="{{ asset('/storage//' . $post->thumbnail) }}" style="max-width: 50%"
                            alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    {{-- textarea --}} <x-forms.textarea name="excerpt"> @old('excerpt', $post->excerpt)
                    </x-forms.textarea>

                    {{-- body --}}
                    <x-forms.textarea name="body"> @old('body', $post->body) </x-forms.textarea>

                    {{-- category --}}
                    <div class="mb-6">
                        <x-forms.lable name="categories" />
                        <select name="category_id"
                            style="width: 100%;background-color: whitesmoke;padding: 6px;cursor: pointer;">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-errors.error input="category_id" />
                    </div>

                    {{-- btn for submit --}}
                    <x-forms.submit value="Edit" />
                </form>
            </x-forms.panel>
        </main>
    </section>
</x-layout>

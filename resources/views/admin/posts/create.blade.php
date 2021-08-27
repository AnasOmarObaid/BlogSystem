<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-forms.panel>
                <h1 class="text-center font-bold text-xl">CREATE POST</h1>
                <form action="@route('admin.posts.store')" method="post" class="mt-10" enctype="multipart/form-data">
                    @csrf
                    {{-- title --}}
                    <x-forms.input type="text" name="title" :value="@old('title')"/>

                    {{-- thumbnail --}}
                    <x-forms.input type="file" name="thumbnail" :value="@old('thumbnail')"/>

                    {{-- textarea --}}
                    <x-forms.textarea name="excerpt"> @old('excerpt') </x-forms.textarea>

                    {{-- body --}}
                    <x-forms.textarea name="body"> @old('body') </x-forms.textarea>

                    {{-- category --}}
                    <x-forms.select_category name="category_id" :categories="$categories"/>

                    {{-- btn for submit --}}
                    <x-forms.submit value="PUBLISH" />
                </form>
            </x-forms.panel>
        </main>
    </section>
</x-layout>

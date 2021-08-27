<x-layout>
    <section class="px-6 py-8">
        <h4 class="mb-4 text-bold mt-3">Posts</h4>
        <x-forms.panel>
            {{-- start table --}}
            @include('admin.posts._post-table_data')
            {{-- end table --}}
            </x-form.panel>
    </section>
    {{ $posts->links() }}
</x-layout>

<x-forms.panel>
    <form method="POST" action="@route('comment.store', [$post])">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                class="rounded-full">

            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" style="box-shadow: none"
                placeholder="Quick, thing of something to say!"></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <button type="submit"
                style="background-color: #3b82f6;color: #fff;padding: 5px 20px;font-size: 14px;font-weight: bold;">comment..</button>
        </div>
    </form>
</x-forms.panel>

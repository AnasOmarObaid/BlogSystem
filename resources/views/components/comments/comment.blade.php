@props(['comment'])
<article class="flex rounded-xl space-x-4">
    <x-forms.panel class="bg-gray-50" style="width: 100%">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->user->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p>
                {{ $comment->comment }}
            </p>
        </div>
    </x-forms.panel>
</article>

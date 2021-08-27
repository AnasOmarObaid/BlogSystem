@props(['post'])
<a href="{{route('post.index', ['author' => $post->author->username])}}">
    <div class="ml-3">
        <h5 class="font-bold">{{ $post->author->username }}</h5>
        <h6>Mascot at Laracasts</h6>
    </div>
</a>
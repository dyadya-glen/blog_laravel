<div class="tags  widget-tags">
    <h6>Тэги</h6>
    <hr>
    @forelse(\App\Models\Tag::all() as $tag)
        <a href="/post/tag/{{ $tag->name }}" class="tags__link">{{ $tag->name }}</a>
    @empty
    @endforelse
</div>
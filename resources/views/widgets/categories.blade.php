<div class="widget-categories  push-down-30">
    <h6>РАЗДЕЛЫ</h6>
    <ul>
        @forelse($categories as $category)
        <li>
            <a href="/post/category/{{ $category->name }}">{{ $category->name }} &nbsp;
                <span class="widget-categories__text">({{ $category->posts()->count() }})</span>
            </a>
        </li>
        @empty
        @endforelse
    </ul>
</div>

<div class="sidebar-module">
    <h4>Categorías</h4>

    <ol class="list-unstyled">
        @foreach($categories as $category)
            @if($category->articles->count())
                <li>
                    <a href="{{ route('search.category', $category) }}"> {{ $category->name }} </a>
                    <span class="badge">{{ $category->articles->count() }}</span>
                </li>
            @endif
        @endforeach
    </ol>
</div>

<div class="sidebar-module">
    <h4>Tags</h4>

    <ol class="list-unstyled">
        @foreach($tags as $tag)
            @if($tag->articles->count())
                <li>
                    <a href="{{ route('search.tag', $tag) }}"> {{ $tag->name }} </a>
                </li>
            @endif
        @endforeach
    </ol>
</div>

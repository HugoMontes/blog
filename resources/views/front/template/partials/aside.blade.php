<div class="sidebar-module">
    <h4>Categorías</h4>

    <ol class="list-unstyled">
        @foreach($categories as $category)
            <li>{{ $category->name }}  <span class="badge">{{ $category->articles->count() }}</span></li>
        @endforeach
    </ol>
</div>

<div class="sidebar-module">
    <h4>Tags</h4>

    <ol class="list-unstyled">
        @foreach($tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ol>
</div>

<nav class="nav">
    <ul class="nav__list container">
        @foreach($categories as $category)
            <li class="nav__item">
                <a href="all-lots.html">{{ $category->title }}</a>
            </li>
        @endforeach
    </ul>
</nav>
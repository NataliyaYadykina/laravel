<ul>
    @foreach ($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
            @if ($menu_item->children()->count())
                <x-main-menu :items="$menu_item->children"></x-main-menu>
            @endif
        </li>
    @endforeach
</ul>

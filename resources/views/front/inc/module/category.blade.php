<div class="aside-widget">
    <div class="section-title">
        <h2>Kategoriler</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{route('category',$category->slug)}}" class="cat-{{$category->color}}">
                       <?= (Request::segment(2)==$category->slug) ? "<mark>$category->name</mark>" :$category->name ?>
                        <span>{{$category->articleCount()}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

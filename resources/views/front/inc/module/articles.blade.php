{{--@if (url()->current() == route('home'))--}}
@if (Request::segment(1)=='')
    <div class="col-md-12">
        <div class="section-title">
            <h2>Son Yazılar</h2>
        </div>
    </div>
    @foreach($articles as $article)
        <div class="col-md-6">
            <div class="post">
                <a class="post-img"
                   href="{{route('detail',['category' => $article->getCategory->slug, 'slug' => $article->slug])}}">
                    <img src="uploads/makale/{{$article->image}}" alt="">
                </a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-{{$article->getCategory->color}}"
                           href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
                        <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                        <span class="post-hit text-info"> <i class="fa fa-plus"></i> {{$article->hit}}</span>
                    </div>
                    <h3 class="post-title">
                        <a href="{{route('detail',['category' => $article->getCategory->slug, 'slug' => $article->slug])}}">{{str_limit($article->title,40)}}</a>
                    </h3>
                </div>
            </div>
        </div>
    @endforeach
    {{$articles->links()}}
@elseif(Request::segment(1)=='kategori')
    @if(count($articles)>0)
        @foreach($articles as $article)
            <div class="col-md-12">
                <div class="post post-row">
                    <a class="post-img"
                       href="{{ route('detail', ['category' => $article->getCategory->slug, 'slug' => $article->slug]) }}">
                        <img src="{{asset('uploads/makale/'.$article->image)}}" alt="">
                    </a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-{{$article->getCategory->color}}"
                               href="#">{{$article->getCategory->name}}</a>
                            <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                        </div>
                        <h3 class="post-title">
                            <a href="{{ route('detail', ['category' => $article->getCategory->slug, 'slug' => $article->slug]) }}">
                                {{$article->title}}
                            </a>
                        </h3>
                        <p>{{str_limit($article->content,40)}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{$articles->links()}}
    @else
        <div class="section-title">
            <h2>Bu Kategoriye ait bir yazi bulunmamaktadir</h2>
        </div>
    @endif
@endif

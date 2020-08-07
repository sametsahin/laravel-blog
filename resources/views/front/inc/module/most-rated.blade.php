<div class="aside-widget">
    <div class="section-title">
        <h2>En Çok Okunanlar</h2>
    </div>
    @if(isset($most_rated))
        @foreach($most_rated as $article)
            <div class="post post-widget">
                <a class="post-img" href="{{ route('detail', [$article->getCategory->slug,$article->slug]) }}">
                    <img src="{{asset('uploads/makale/'.$article->image)}}" alt="{{$article->title}}"
                         title="{{$article->title}}">
                </a>
                <div class="post-body">
                    <h3 class="post-title">
                        <a href="{{ route('detail', [$article->getCategory->slug,$article->slug]) }}"
                           title="{{$article->title}}">
                            {{str_limit($article->title,15)}}
                        </a>
                    </h3>
                    <div class="post-meta">
                        <a class="post-category cat-{{$article->getCategory->color}}"
                           href="{{route('category',$article->getCategory->slug)}}">

                            {{$article->getCategory->name}}
                        </a>
                        <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h2>En cok okunan kategori getirilemedi</h2>
    @endif
</div>

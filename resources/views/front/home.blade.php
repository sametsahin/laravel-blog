@extends('front.inc.template')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @foreach($top_articles as $article)
                    <div class="col-md-4">
                        <div class="post post-thumb">
                            <a class="post-img"
                               href="{{route('detail',['category' => $article->getCategory->slug, 'slug' => $article->slug])}}">
                                <img src="uploads/makale/{{$article->image}}" alt="">
                            </a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-{{$article->getCategory->color}}"
                                       href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
                                    <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                                </div>
                                <h3 class="post-title">
                                    <a href="{{route('detail',['category' => $article->getCategory->slug, 'slug' => $article->slug])}}">
                                        {{$article->title}}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-9">
                    @include('Front.inc.module.articles')
                </div>
                <div class="col-md-3">
                    @include('Front.inc.module.category')
                    @include('Front.inc.module.most-rated')
                </div>
            </div>
        </div>
    </div>
@endsection


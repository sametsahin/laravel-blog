@extends('front.inc.template')
@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{route('home')}}">Anasayfa</a></li>
                        <li>{{$category->name}}</li>
                    </ul>
                    <h1>{{$category->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-row">
                                <a href="#">
                                    <img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @include('Front.inc.module.articles')
                        {{--@if(count($articles)>0)
                            @foreach($articles as $article)
                                <div class="col-md-12">
                                    <div class="post post-row">
                                        <a class="post-img"
                                           href="{{ route('detail', [$article->getCategory->slug,$article->slug]) }}">
                                            <img src="{{$article->image}}" alt="">
                                        </a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-{{$article->getCategory->color}}"
                                                   href="#">{{$article->getCategory->name}}</a>
                                                <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="{{ route('detail', [$article->getCategory->slug,$article->slug]) }}">
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
                        @endif--}}
                    </div>
                </div>

                <div class="col-md-3">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    @include('Front.inc.module.category')
                     @include('Front.inc.module.most-rated')
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection


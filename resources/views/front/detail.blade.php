@extends('front.inc.template')
@section('content')
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url({{asset('uploads/makale/'.$article->image)}});"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="category.html">{{$article->getCategory->name}}</a>
                        <span class="post-date">{{$article->created_at->diffForHumans()}}</span>
                    </div>
                    <h1>{{$article->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Post content -->
                <div class="col-md-9">
                    <div class="section-row sticky-container">
                        <div class="main-post">
                            <p>{!! $article->description !!}</p>
                        </div>
                    </div>

                    <!-- ad -->
                    <div class="section-row text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{asset('front')}}/img/ad-2.jpg" alt="">
                        </a>
                    </div>
                    <!-- ad -->

                </div>
                <div class="col-md-3">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{asset('front')}}/img/ad-1.jpg" alt="">
                        </a>
                    </div>
                    @include('Front.inc.module.most-rated')
                    @include('Front.inc.module.category')
                </div>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection


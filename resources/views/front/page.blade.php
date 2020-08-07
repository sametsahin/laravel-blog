@extends('front.inc.template')
@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{route('home')}}">Anasayfa</a></li>
                        <li>{{$page->title}}</li>
                    </ul>
                    <h1>{{$page->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-row">
                        <figure class="figure-img">
                            <img class="img-responsive" src="{{$page->image}}" alt="">
                        </figure>
                        <p>{!!$page->content!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

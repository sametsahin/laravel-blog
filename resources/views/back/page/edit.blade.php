@extends('back.inc.template')
@section('title',$page->title . ' kaydini duzenliyorsunuz')
@section('content')
    <div class="bd-example">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('admin.sayfa.update',$page->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Sayfa Adı</label>
                <input name="title" type="text" class="form-control" value="{{$page->title}}">
            </div>
            <div class="form-group">
                <label>Sayfa Sıra</label>
                <input name="order" type="text" class="form-control" value="{{$page->order}}">
            </div>
            <div class="form-group">
                <label>Sayfa Slug</label>
                <input name="slug" type="text" class="form-control" value="{{$page->slug}}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{asset('uploads/sayfa/'.$page->image)}}"
                             width="75" class="rounded" alt="">
                    </div>
                    <div class="col-md-11">
                        <label>Sayfa Resmi</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Sayfa Icerigi</label>
                <textarea id="editor" class="form-control" name="description"
                          rows="4">{!! $page->description !!}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Guncelle</button>
            </div>
        </form>
    </div>
@endsection

@extends('back.inc.template')
@section('title',$category->name . ' kaydini duzenliyorsunuz')
@section('content')
    <div class="bd-example">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('admin.kategori.update',$category->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Kategori Adı</label>
                <input name="name" type="text" class="form-control" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label>Kategori Renk</label>
                <input name="color" type="text" class="form-control" value="{{$category->color}}">
            </div>
            <div class="form-group">
                <label>Kategori Slug</label>
                <input name="slug" type="text" class="form-control" value="{{$category->slug}}">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{asset('uploads/kategori/'.$category->image)}}"
                             width="75" class="rounded" alt="">
                    </div>
                    <div class="col-md-11">
                        <label>Kategori Resmi</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Guncelle</button>
            </div>
        </form>
    </div>
@endsection

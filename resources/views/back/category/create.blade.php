@extends('back.inc.template')
@section('content')
    <div class="bd-example">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('admin.kategori.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kategori Adı</label>
                <input name="name" type="text" class="form-control" placeholder="kategori Adını Giriniz">
            </div>
            <div class="form-group">
                <label>Renk</label>
                <input name="color" type="text" class="form-control" placeholder="Renk Numarası Giriniz">
            </div>
            <div class="form-group">
                <label>Kategori Fotografı</label>
                <input name="image" type="file" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
            </div>
        </form>
    </div>
@endsection

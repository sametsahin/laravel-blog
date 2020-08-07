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
        <form method="post" action="{{route('admin.sayfa.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Sayfa Adı</label>
                <input name="title" type="text" class="form-control" placeholder="Sayfa Adını Giriniz">
            </div>
            <div class="form-group">
                <label>Sıra</label>
                <input name="order" type="text" class="form-control" placeholder="Sıra Giriniz">
            </div>
            <div class="form-group">
                <label>Sayfa Fotografı</label>
                <input name="image" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label>Sayfa Icerigi</label>
                <textarea id="editor" class="form-control" name="description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editor').summernote(
                {
                    'height': 200
                }
            );
        });
    </script>
@endsection


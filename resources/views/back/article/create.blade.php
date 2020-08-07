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
        <form method="post" action="{{route('admin.makale.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Makale Basligi</label>
                        <input name="title" type="text" class="form-control" placeholder="Makale Basligi Giriniz">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option value="">Secim Yapiniz</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Makale Fotografı</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Üstte Göster</label>
                    <input class="switch" type="checkbox"
                           data-id="" data-toggle="toggle" name="is_top"
                           data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger">
                </div>
            </div>

            <div class="form-group">
                <label>Makale Icerigi</label>
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
    <link href="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.js"></script>
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

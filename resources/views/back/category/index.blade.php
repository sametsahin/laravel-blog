@extends('back.inc.template')
@section('title','Tum Kategoriler')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$categories->count()}}</strong> kategori bulundu
                <a href="{{route('admin.category.trashed')}}" class="btn btn-warning btn-sm float-right"><i
                        class="fa fa-trash"></i> Silinen Kategoriler</a>
            </h6>
        </div>
    </div>
    @if(count($categories)>0)
        <table class="table table-hover table-striped table-sm text-center">
            <thead>
            <tr>
                <th scope="col" style="width:10%">Resim</th>
                <th scope="col" style="width:30%">Kategori Adı</th>
                <th scope="col" style="width:10%">Makale Sayısı</th>
                <th scope="col" style="width:10%">Olusturulma</th>
                <th scope="col" style="width:10%">Durum</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td><img width="75" src="{{asset('uploads/kategori/'.$category->image)}}" alt=""></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->articleCount()}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>
                        <input {{($category->status ==1) ?'checked':null}} class="switch" type="checkbox"
                               data-id="{{$category->id}}" data-toggle="toggle"
                               data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td>
                        <a href="{{route('category',$category->slug)}}"
                           target="_blank" title="Goruntule" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{route('admin.kategori.edit',$category->id)}}" title="Duzenle"
                           class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{route('admin.category.delete',$category->id)}}" title="Sil"
                           class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Herhangi bir kayit bulunmamaktadir.</div>
    @endif
@endsection
@section('css')
    <link href="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this).data("id")
                statu = $(this).prop('checked');
                $.get("{{route('admin.category.switch')}}", {id: id, statu: statu}, function (data) {
                    console.log(data);
                })
            })
        })
    </script>
@endsection

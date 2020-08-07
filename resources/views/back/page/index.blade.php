@extends('back.inc.template')
@section('title','Tum Sayfalar')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$pages->count()}}</strong> sayfa bulundu
                <a href="{{route('admin.page.trashed')}}" class="btn btn-warning btn-sm float-right"><i
                        class="fa fa-trash"></i> Silinen Sayfalar</a>
            </h6>
        </div>
    </div>
    @if(count($pages)>0)
        <table class="table table-hover table-striped table-sm text-center">
            <thead>
            <tr>
                <th style="width: 5%;">Sırala</th>
                <th scope="col" style="width:10%">Resim</th>
                <th scope="col" style="width:30%">Baslik</th>
                <th scope="col" style="width:10%">Durum</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody id="orders">
            @foreach($pages as $page)
                <tr id="page_{{$page->id}}">
                    <td><i class="fa fa-list handle" style="cursor:move;"></i></td>
                    <td><img width="75" src="{{asset('uploads/sayfa/'.$page->image)}}" alt=""></td>
                    <td>{{$page->title}}</td>
                    <td>
                        <input {{($page->status ==1) ?'checked':null}} class="switch" type="checkbox"
                               data-id="{{$page->id}}" data-toggle="toggle"
                               data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td>
                        <a href="{{route('page',$page->slug)}}"
                           target="_blank" title="Goruntule" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{route('admin.sayfa.edit',$page->id)}}" title="Duzenle"
                           class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{route('admin.page.delete',$page->id)}}" title="Sil"
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
    <script src="{{asset('back')}}/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{asset('back')}}/vendor/sortable/Sortable.min.js"></script>
    <script>
        $('#orders').sortable({
            handle: '.handle',
            update: function () {
                var orders = $('#orders').sortable('serialize');
                $.get("{{route('admin.page.orders')}}?" + orders, function (data, status) {

                })
            }
        });
    </script>
    <script src="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script>
        $(function () {
            $('.switch').change(function () {
                id = $(this).data("id")
                statu = $(this).prop('checked');
                $.get("{{route('admin.page.switch')}}", {id: id, statu: statu}, function (data) {
                    console.log(data);
                })
            })
        })
    </script>
@endsection

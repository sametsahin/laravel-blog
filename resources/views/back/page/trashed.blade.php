@extends('back.inc.template')
@section('title','Silinen Sayfalar')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$pages->count()}}</strong> sayfa bulundu
                <a href="{{route('admin.sayfa.index')}}" class="btn btn-info btn-sm float-right"><i
                        class="fa fa-pen"></i> Varsayilan Sayfalar</a>
            </h6>
        </div>
    </div>
    @if(count($pages)>0)
        <table class="table table-hover table-striped table-sm text-center">
            <thead>
            <tr>
                <th scope="col" style="width:10%">Resim</th>
                <th scope="col" style="width:30%">Sayfa Adı</th>
                <th scope="col" style="width:10%">Silinme</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pages as $page)
                <tr>
                    <td><img width="75" src="{{asset('uploads/sayfa/'.$page->image)}}" alt=""></td>
                    <td>{{$page->title}}</td>
                    <td>{{$page->deleted_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin.page.recycle',$page->id)}}" title="Kurtar"
                           class="btn btn-success btn-sm"><i class="fa fa-recycle"></i></a>
                        <a href="{{route('admin.page.hd',$page->id)}}" title="Sil"
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

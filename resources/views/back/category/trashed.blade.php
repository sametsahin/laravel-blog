@extends('back.inc.template')
@section('title','Silinen Kategoriler')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$categories->count()}}</strong> kategori bulundu
                <a href="{{route('admin.kategori.index')}}" class="btn btn-info btn-sm float-right"><i
                        class="fa fa-pen"></i> Varsayilan Kategoriler</a>
            </h6>
        </div>
    </div>
    @if(count($categories)>0)
        <table class="table table-hover table-striped table-sm text-center">
            <thead>
            <tr>
                <th scope="col" style="width:10%">Resim</th>
                <th scope="col" style="width:30%">Kategori Adı</th>
                <th scope="col" style="width:30%">Makale Sayısı</th>
                <th scope="col" style="width:10%">Silinme</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td><img width="75" src="{{asset('uploads/kategori/'.$category->image)}}" alt=""></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->articleCount()}}</td>
                    <td>{{$category->deleted_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin.category.recycle',$category->id)}}" title="Kurtar"
                           class="btn btn-success btn-sm"><i class="fa fa-recycle"></i></a>
                        <a href="{{route('admin.category.hd',$category->id)}}" title="Sil"
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

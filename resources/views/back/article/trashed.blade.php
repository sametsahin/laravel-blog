@extends('back.inc.template')
@section('title','Silinen Makaleler')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}}</strong> makale bulundu
                <a href="{{route('admin.makale.index')}}" class="btn btn-info btn-sm float-right"><i
                        class="fa fa-pen"></i> Varsayilan Makaleler</a>
            </h6>
        </div>
    </div>
    @if(count($articles)>0)
        <table class="table table-hover table-striped table-sm text-center">
            <thead>
            <tr>
                <th scope="col" style="width:10%">Resim</th>
                <th scope="col" style="width:30%">Baslik</th>
                <th scope="col" style="width:10%">Kategori</th>
                <th scope="col" style="width:10%">Goruntuleme</th>
                <th scope="col" style="width:10%">Silinme</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody>

            @foreach($articles as $article)
                <tr>
                    <td><img width="75" src="{{asset('uploads/'.$article->image)}}" alt=""></td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->getCategory->name}}</td>
                    <td>{{$article->hit}}</td>
                    <td>{{$article->deleted_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin.recycle.article',$article->id)}}" title="Kurtar"
                           class="btn btn-success btn-sm"><i class="fa fa-recycle"></i></a>
                        <a href="{{route('admin.hard.delete.article',$article->id)}}" title="Sil"
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

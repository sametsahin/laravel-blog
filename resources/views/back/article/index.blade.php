@extends('back.inc.template')
@section('title','Tum Makaleler')

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->count()}}</strong> makale bulundu
                <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm float-right"><i
                        class="fa fa-trash"></i> Silinen Makaleler</a>
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
                <th scope="col" style="width:10%">Olusturulma</th>
                <th scope="col" style="width:10%">Durum</th>
                <th scope="col" style="width:20%">Islemler</th>
            </tr>
            </thead>
            <tbody>

            @foreach($articles as $article)
                <tr>
                    <td><img width="75" src="{{asset('uploads/makale/'.$article->image)}}" alt=""></td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->getCategory->name}}</td>
                    <td>{{$article->hit}}</td>
                    <td>{{$article->created_at->diffForHumans()}}</td>
                    <td>
                        <input {{($article->status ==1) ?'checked':null}} class="switch" type="checkbox"
                               data-id="{{$article->id}}" data-toggle="toggle"
                               data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger">
                    </td>
                    <td>
                        <a href="{{route('detail',['category' => $article->getCategory->slug, 'slug' => $article->slug])}}"
                           target="_blank" title="Goruntule" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{route('admin.makale.edit',$article->id)}}" title="Duzenle"
                           class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{route('admin.delete.article',$article->id)}}" title="Sil"
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
                $.get("{{route('admin.article.switch')}}", {id: id, statu: statu}, function (data) {
                    console.log(data);
                })
            })
        })
    </script>
@endsection

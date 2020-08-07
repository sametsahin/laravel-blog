@extends('back.inc.template')
@section('css')
    <link href="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('back')}}/vendor/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script>
        $(function () {

            $('.CategoryEditBtn').click(function () {
                id = $(this).data("id")
                $.ajax({
                    type: 'GET',
                    url: '{{route('admin.category.getid')}}',
                    data: {id: id},
                    success: function (data) {
                        $('#editModal').modal();
                        console.log(data)

                        $('#category_id').val(data.id);
                        $('#category_name').val(data.name);
                        $('#category_slug').val(data.slug);

                    }
                })
            })

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
@section('title','Tum Kategoriler')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Olustur</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.category.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adi</label>
                            <input type="text" class="form-control" name="category">
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
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
                    @if(count($categories)>0)
                        <table class="table table-hover table-striped table-sm text-center">
                            <thead>
                            <tr>
                                <th scope="col" style="width:40%">Kategori Adi</th>
                                <th scope="col" style="width:5%">Makale Sayisi</th>
                                <th scope="col" style="width:35%">Durum</th>
                                <th scope="col" style="width:20%">Islemler</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->articleCount()}}</td>
                                    <td>
                                        <input {{($category->status ==1) ?'checked':null}} class="switch"
                                               type="checkbox"
                                               data-id="{{$category->id}}" data-toggle="toggle"
                                               data-on="Aktif" data-off="Pasif" data-onstyle="success"
                                               data-offstyle="danger">
                                    </td>
                                    <td>
                                        <a href=""
                                           target="_blank" title="Goruntule" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a title="Duzenle" data-id="{{$category->id}}"
                                           class="btn btn-info btn-sm CategoryEditBtn">
                                            <i class="fa fa-pen text-white"></i>
                                        </a>
                                        <a href="{{route('admin.delete.article',$category->id)}}" title="Sil"
                                           class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <div id="editModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{route('admin.category.update')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Kategori Düzenle</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Kategori Adı</label>
                                                    <input id="category_name" type="text" class="form-control"
                                                           name="category_name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori Slug</label>
                                                    <input id="category_slug" type="text" class="form-control"
                                                           name="category_slug">
                                                    <input type="hidden" name="id" id="category_id">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Kapat
                                                </button>
                                                <button type="submit" class="btn btn-success">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </tbody>
                        </table>


                        <!-- Modal -->

                    @else
                        <div class="alert alert-info">Herhangi bir kayit bulunmamaktadir.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

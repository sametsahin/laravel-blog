@extends('back.inc.template')
@section('title','Ayarlar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form action="{{route('admin.config.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Başlıgı</label>
                            <input type="text" name="title" class="form-control" value="{{$config->title}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Durum</label>
                            <select name="active" class="form-control">
                                <option {{($config->active==0)?'selected':null}} value="0">Kapalı</option>
                                <option {{($config->active==1)?'selected':null}} value="1">Açık</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Site Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{$config->instagram}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">Güncelle</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('front.inc.template')
@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{route('home')}}">Anasayfa</a></li>
                        <li>İletişim</li>
                    </ul>
                    <h1>İletişim</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="section-row">
                        <h3>İletişim Bilgilerimiz</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <ul class="list-style">
                            <li><p><strong>Email:</strong> <a href="#">Webmag@email.com</a></p></li>
                            <li><p><strong>Phone:</strong> 213-520-7376</p></li>
                            <li><p><strong>Address:</strong> 3770 Oliver Street</p></li>
                        </ul>
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="section-row">
                        <h3>İletişime Geçin</h3>
                        <form method="post" action="{{route('contact.post')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Ad Soyad</span>
                                        <input class="input" type="text" name="name" value="{{old('name')}}"
                                               placeholder="Ad Soyad">
                                    </div>
                                    <div class="form-group">
                                        <span>E-Posta</span>
                                        <input class="input" type="email" name="email" value="{{old('email')}}"
                                               placeholder="E-Posta Adresi">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Konu</span>
                                        <input class="input" type="text" name="topic" value="{{old('topic')}}"
                                               placeholder="Mesaj Konusu">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message"
                                                  placeholder="Mesaj">{{old('message')}}</textarea>
                                    </div>
                                    <button type="submit" class="primary-button">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection

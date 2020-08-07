<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog sitesi admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('back')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('back')}}/vendor/toastr/toastr.min.css" rel="stylesheet">
    <style>
        #toast-container > div {
            opacity: 1;
        }

        .toast {
            font-size: initial !important;
            border: initial !important;
            backdrop-filter: blur(0) !important;
        }

        .toast-success {
            background-color: #51A351 !important;
        }

        .toast-error {
            background-color: #BD362F !important;
        }

        .toast-info {
            background-color: #2F96B4 !important;
        }

        .toast-warning {
            background-color: #F89406 !important;
        }
    </style>
    <link href="{{asset('back')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz!</h1>
                                </div>
                                <form class="user" method="post" action="{{route('admin.login.post')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                               placeholder="E-Posta Adresiniz">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Parolanız">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Beni Hatırla</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Giriş
                                    </button>
                                </form>
                                <hr>
                                @if($errors->any())
                                    <div class="alert alert-danger">{{$errors->first()}}</div>
                                @endif
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Şifremi Unuttum</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('back')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('back')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('back')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{asset('back')}}/js/sb-admin-2.min.js"></script>
@toastr_js
@toastr_render
</body>
</html>

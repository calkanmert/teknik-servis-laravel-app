<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>{{ $page_title }}</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/admin/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="/assets/admin/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="/assets/admin/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">Yönetim Paneli</a>
        </div>
        <form id="test" action="" method="post">
            <h3 class="login-title">Giriş Yap</h3>
            <div class="form-group">
                @error('auth_error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-group-icon right @error('email') has-error @enderror">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Eposta" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right @error('password') has-error @enderror">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Şifre">
                </div>
            </div>
            @csrf
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-primary">
                    <input name="remember" type="checkbox">
                    <span class="input-span"></span>Beni Hatırla</label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Giriş Yap</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Yükleniyor</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="/assets/admin/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/admin/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="/assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="/assets/admin/js/app.js" type="text/javascript"></script>
</body>

</html>

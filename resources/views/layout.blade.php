<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-black navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand fs-3" href="#">Teknik Servis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('get_devices_index') }}">Cihaz Sorgula</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="container-fluid bg-black mt-4">
        <div class="container py-5 text-light">
            <div class="row">
                <div class="col-md-6">
                    <h5>Teknik Servis</h5>
                    <p class="text-muted" style="width: 400px;">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum ipsum atque consequuntur?
                        Cumque, error modi? Voluptatibus quasi dolorem, mollitia cumque error dicta sapiente, maiores
                        cupiditate nihil sit quia, fuga blanditiis.
                    </p>
                </div>
                <div class="col-md-3">
                    <h5>Site Hakkında</h5>
                    <ul class="nav flex-column gap-2 text-white">
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">Ana Sayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">İletişim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">Hakkımızda</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Kurumsal</h5>
                    <ul class="nav flex-column gap-2 text-white">
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">Gizlilik Sözleşmesi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">Vizyon & Misyon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 text-muted" href="#">İş Ortaklarımız</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>

</html>

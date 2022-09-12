@extends('layout')

@section('page_title', $page_title)

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div id="carousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-0">
                        <div class="carousel-item active">
                            <img height="290px" src="{{ asset('assets/app/theme-images/slider-1.png') }}"
                                class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img height="290px" src="{{ asset('assets/app/theme-images/slider-2.png') }}"
                                class="d-block w-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <a class="text-decoration-none" href="#">
                    <div class="bg-black text-light px-3 d-flex flex-column justify-content-center align-items-center"
                        style="height: 260px">
                        <h5 class="text-center">TAMİR</h5>
                        <p class="text-center">
                            Bilgisayar, notebook, akıllı saat, oyun konsulu vb. elektronik cihazların tamiri.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="text-decoration-none" href="#">
                    <div class="bg-black text-light px-3 d-flex flex-column justify-content-center align-items-center"
                        style="height: 260px">
                        <h5 class="text-center">PARÇA SATIŞI</h5>
                        <p class="text-center">
                            İhtiyaç duyduğunuz parçaların elimizde varsa satışı yoksa isteğiniz dahilinde getirtilmesi.
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="text-decoration-none" href="#">
                    <div class="bg-black text-light px-3 d-flex flex-column justify-content-center align-items-center"
                        style="height: 260px;">
                        <h5 class="text-center">VİZYONUMUZ</h5>
                        <p class="text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ex doloremque
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a class="text-decoration-none" href="#">
                    <div class="bg-black text-light px-3 d-flex flex-column justify-content-center align-items-center"
                        style="height: 260px;">
                        <h5 class="text-center">MİSYONUMUZ</h5>
                        <p class="text-center">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam molestiae mollitia.
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <ul class="list-group rounded-0">
                    <li class="list-group-item bg-black text-light">Hizmetlerimiz</li>
                    <li class="list-group-item">Arızalı Çip Değişimi</li>
                    <li class="list-group-item">Tablet, Telefon Tamiri</li>
                    <li class="list-group-item">Bilgisayar Tamiri</li>
                    <li class="list-group-item">Akıllı Saat Tamiri</li>
                    <li class="list-group-item">Bakım, Temizlik</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group rounded-0">
                    <li class="list-group-item bg-black text-light"><i class="fa-solid fa-align-justify"></i>
                        Hakkımızda</li>
                    <li class="list-group-item">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fuga, exercitationem nulla quae
                        labore magnam amet dicta laudantium, id neque perspiciatis consequatur ullam enim maxime.
                        Deleniti nihil eius sed officia!Blanditiis officia esse earum eius voluptatum quos laborum
                        molestiae vel quidem rem non exercitationem deleniti perspiciatis adipisci aliquid illum, neque
                        unde nobis magnam, asperiores amet dolorem similique! Doloremque, veritatis commodi, veritatis
                        commodi, veritatis commodi!
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

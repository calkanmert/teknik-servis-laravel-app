@extends('layout')

@section('page_title', $page_title)

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.min.css" />
@endsection

@section('content')
    <div class="container pt-5" style="margin-bottom: 400px;">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 bg-white p-3 shadow-lg">
                <form id="customer-form" action="{{ route('get_devices') }}" method="post"
                    class="row g-3 d-flex justify-content-center align-items-center">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="name" placeholder="İsim">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="surname" placeholder="Soyisim">
                    </div>
                    <div class="col-auto">
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Telefon Numarası">
                    </div>
                    @csrf
                    <div class="col-auto">
                        <button type="submit" class="btn bg-black text-white">Sorgulama Yap</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="device-list" class="row d-flex justify-content-center mt-4 d-none">
            <div class="col-md-10 bg-white p-3 shadow-lg">
                <div class="container mt-2">
                    <h4>Cihaz Seç</h4>
                    <table class="table table-striped table-bordered table-hover mt-4">
                        <thead>
                            <tr>
                                <th width="80px" class="text-center devices-table-column">Cihaz Kodu</th>
                                <th class="text-center align-middle devices-table-column">Tip</th>
                                <th class="text-center align-middle devices-table-column">Marka</th>
                                <th class="text-center align-middle devices-table-column">Model</th>
                                <th class="text-center align-middle devices-table-column">Durum</th>
                                <th class="text-center align-middle devices-table-column">Oluşturma Tarihi</th>
                                <th class="text-center align-middle devices-table-column"></th>
                            </tr>
                        </thead>
                        <tbody id="devices-table-body"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="device" class="row d-flex justify-content-center mt-4 d-none">
            <div class="col-md-10 bg-white p-3 shadow-lg">
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border border-1 text-center">
                                <div class="bg-black text-white p-3">
                                    Durum
                                </div>
                                <div class="p-3" id="status"></div>
                            </div>
                            <div class="border border-1 mt-2 text-center">
                                <div class="bg-black text-white p-3">
                                    Tip | Marka | Model
                                </div>
                                <div class="p-3" id="device_info"></div>
                            </div>
                            <div class="border border-1 mt-2 text-center">
                                <div class="bg-black text-white p-3">
                                    Yanında Teslim Edilenler
                                </div>
                                <div class="p-3" id="includes"></div>
                            </div>
                            <div class="border border-1 mt-2 text-center">
                                <div class="bg-black text-white p-3">
                                    Sorunlar
                                </div>
                                <div class="p-3" id="problems"></div>
                            </div>
                            <div class="border border-1 mt-2 text-center">
                                <div class="bg-black text-white p-3">
                                    Oluşturma Tarihi
                                </div>
                                <div class="p-3" id="created_at"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="border border-1 text-center">
                                <div class="bg-black text-white p-3">
                                    Yapılan İşlemler
                                </div>
                                <div class="p-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="100px" class="text-center log-table-column">İşlem No</th>
                                                <th class="text-center align-middle log-table-column">İşlem</th>
                                                <th class="text-center align-middle log-table-column">Tarih</th>
                                            </tr>
                                        </thead>
                                        <tbody id="device-table-body"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.2/imask.js"></script>
    <script src="{{ asset('assets/app/js/device-query.js') }}"></script>
    <script>
        let phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '000 000 0000'
            }
        );
    </script>
@endsection

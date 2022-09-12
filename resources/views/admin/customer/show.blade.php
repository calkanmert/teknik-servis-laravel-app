@extends('admin.layout')

@section('page_title', $page_title)

@section('css')
    <link href="{{ asset('assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Müşteri</div>
                    <div>
                        <a href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}"
                            class="btn btn-dark text-white">Düzenle</a>
                        <a href="{{ route('admin.customer.delete', ['id' => $customer->id]) }}"
                            class="btn btn-danger text-white warning-location">Sil</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Müşteri
                                </div>
                                <div class="p-3">
                                    {{ $customer->name }} {{ $customer->surname }}
                                </div>
                            </div>
                            <div class="border border-2 mt-3">
                                <div class="bg-ebony text-white p-3">
                                    Telefon Numarası
                                </div>
                                <div class="p-3">
                                    {{ $customer->phone }}
                                </div>
                            </div>
                            <div class="border border-2 mt-3">
                                <div class="bg-ebony text-white p-3">
                                    Eposta Adresi
                                </div>
                                <div class="p-3">
                                    @if ($customer->email)
                                        {{ $customer->email }}
                                    @else
                                        <span class="text-muted">Belirtilmedi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="border border-2 mt-3">
                                <div class="bg-ebony text-white p-3">
                                    Adres
                                </div>
                                <div class="p-3">
                                    @if ($customer->address)
                                        {{ $customer->address }}
                                    @else
                                        <span class="text-muted">Belirtilmedi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="border border-2 mt-3">
                                <div class="bg-ebony text-white p-3">
                                    Oluşturulma Tarihi / Saati
                                </div>
                                <div class="p-3">
                                    @datetime($customer->created_at)
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Cihaz Listesi
                                </div>
                                <div class="p-3">
                                    <table class="table table-striped table-bordered table-hover" id="table"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="80px" class="text-center align-middle">Cihaz Kodu</th>
                                                <th class="text-center align-middle">Cihaz Tipi</th>
                                                <th class="text-center align-middle">Marka</th>
                                                <th class="text-center align-middle">Model</th>
                                                <th class="text-center align-middle">Durum</th>
                                                <th class="text-center align-middle">Oluşturma Tarihi</th>
                                                <th class="text-center align-middle"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($devices as $device)
                                                <tr class="text-center">
                                                    <td class="align-middle">{{ $device->id }}</td>
                                                    <td class="align-middle">{{ $device->device_type_value }}</td>
                                                    <td class="align-middle">{{ $device->device_brand_value }}</td>
                                                    <td class="align-middle">{{ $device->model }}</td>
                                                    <td class="align-middle">
                                                        @if($device->status == 1)
                                                            <span class="badge bg-secondary">SIRADA<span>
                                                        @elseif($device->status == 2)
                                                            <span class="badge bg-warning">DEVAM EDİYOR<span>
                                                        @elseif($device->status == 3)
                                                            <span class="badge bg-success">TAMAMLANDI<span>
                                                        @elseif($device->status == 4)
                                                            <span class="badge bg-primary">TESLİM EDİLDİ<span>
                                                        @elseif($device->status == 5)
                                                            <span class="badge bg-danger">İPTAL EDİLDİ<span>
                                                        @elseif($device->status == 6)
                                                            <span class="badge bg-danger">İADE EDİLDİ<span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $device->created_at }}
                                                    </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.device.show', ['id' => $device->id]) }}"
                                                            class="btn btn-dark text-white ml-2">Görüntüle</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
    <script src="{{ asset('assets/admin/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#table').DataTable({
                info: false,
                ordering: false,
                searching: false,
                lengthChange: false,
                oLanguage: {
                    sUrl: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/tr.json'
                }
            });
        })
        $('.warning-location').on('click', (e) => {
            e.preventDefault();
            if (confirm('Bu işlemi yapmak istediğine emin misin?')) {
                window.location.href = e.target.getAttribute('href');
            }
        });
    </script>
@endsection

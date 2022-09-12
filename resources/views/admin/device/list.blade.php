@extends('admin.layout')

@section('page_title', $page_title)

@section('css')
    <link href="{{ asset('assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Cihaz Listesi</div>
                    <a href="{{ route('admin.device.select_customer') }}"><button class="btn btn-primary">Yeni Oluştur</button></a>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th width="80px" class="text-center">Cihaz Kodu</th>
                                <th class="text-center align-middle">Müşteri</th>
                                <th class="text-center align-middle">Tip</th>
                                <th class="text-center align-middle">Marka</th>
                                <th class="text-center align-middle">Model</th>
                                <th class="text-center align-middle">Durum</th>
                                <th class="text-center align-middle">Oluşturma Tarihi</th>
                                <th class="text-center align-middle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $device)
                                <tr class="text-center">
                                    <td>{{ $device->id }}</td>
                                    <td>{{ $device->customer_name }} {{ $device->customer_surname }}</td>
                                    <td>{{ $device->device_type_value }}</td>
                                    <td>{{ $device->device_brand_value }}</td>
                                    <td>{{ $device->model }}</td>
                                    <td class="text-center">
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
                                    <td>{{ $device->created_at }}</td>
                                    <td class="">
                                        <a href="{{ route('admin.device.show', ['id' => $device->id]) }}"
                                            class="btn bg-ebony text-white">Görüntüle</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

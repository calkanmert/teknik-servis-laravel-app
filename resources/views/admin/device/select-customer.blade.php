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
                    <div class="ibox-title">Müşteri Seç</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th width="120px" class="text-center align-middle">Müşteri Kodu</th>
                                <th class="text-center align-middle">Adı Soyadı</th>
                                <th class="text-center align-middle">Telefon Numarası</th>
                                <th class="text-center align-middle">E-posta</th>
                                <th class="text-center align-middle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $customer->id }}</td>
                                    <td class="align-middle">{{ $customer->name }} {{ $customer->surname }}</td>
                                    <td class="align-middle">{{ $customer->phone }}</td>
                                    <td class="align-middle">
                                        @if ($customer->email)
                                            {{ $customer->email }}
                                        @else
                                            <span class="text-muted">Belirtilmedi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.device.new', ['id' => $customer->id]) }}"
                                            class="btn btn-dark text-white">Müşteri Seç</a>
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
    <script>
        $(function() {
            $('#table').DataTable({
                info: false,
                ordering: false,
                lengthChange: false,
                oLanguage: {
                    sUrl: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/tr.json'
                }
            });
        })
    </script>
@endsection

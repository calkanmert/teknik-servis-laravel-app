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
                    <div class="ibox-title">Müşteri Listesi</div>
                    <a href="{{ route('admin.customer.new') }}"><button class="btn btn-primary">Yeni Oluştur</button></a>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" width="100px">Müşteri Kodu</th>
                                <th class="text-center">Adı Soyadı</th>
                                <th class="text-center">Telefon Numarası</th>
                                <th class="text-center">E-posta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="text-center">
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }} {{ $customer->surname }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        @if ($customer->email)
                                            {{ $customer->email }}
                                        @else
                                            <span class="text-muted">Belirtilmedi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.customer.show', ['id' => $customer->id]) }}"
                                            class="btn bg-ebony text-white">Görüntüle</a>
                                        <a href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}"
                                            class="btn btn-dark text-white ml-2">Düzenle</a>
                                        <a href="{{ route('admin.customer.delete', ['id' => $customer->id]) }}"
                                            class="btn btn-danger text-white warning-location ml-2">Sil</a>
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
    </script>
    <script>
        $('.warning-location').on('click', (e) => {
            e.preventDefault();
            if (confirm('Bu işlemi yapmak istediğine emin misin?')) {
                window.location.href = e.target.getAttribute('href');
            }
        });
    </script>
@endsection

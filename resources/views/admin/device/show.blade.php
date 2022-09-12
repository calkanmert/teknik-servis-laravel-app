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
                    <div class="ibox-title">Cihaz</div>
                    <div>
                        <a href="{{ route('admin.device.delete', ['id' => $device->id]) }}"
                            class="btn btn-danger text-white warning-location">Sil</a>
                    </div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Cihaz Durumu
                                </div>
                                <div class="p-3">
                                    <form action="{{ route('admin.device.change_device_status', ['id' => $device->id]) }}"
                                        method="post">
                                        <div class="d-flex">
                                            <select class="form-control" name="device_status">
                                                <option value="1" {{ $device->status == 1 ? 'selected' : '' }}>Sırada
                                                </option>
                                                <option value="2" {{ $device->status == 2 ? 'selected' : '' }}>Devam
                                                    Ediyor</option>
                                                <option value="3" {{ $device->status == 3 ? 'selected' : '' }}>
                                                    Tamamlandı</option>
                                                <option value="4" {{ $device->status == 4 ? 'selected' : '' }}>Teslim
                                                    Edildi</option>
                                                <option value="5" {{ $device->status == 5 ? 'selected' : '' }}>İptal
                                                    Edildi</option>
                                                <option value="6" {{ $device->status == 6 ? 'selected' : '' }}>İade
                                                    Edildi</option>
                                            </select>
                                            @csrf
                                            <button class="btn btn-dark ml-2" type="submit">Değiştir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Müşteri
                                </div>
                                <div class="p-3">
                                    <a href="{{ route('admin.customer.show', ['id' => $device->customer_id]) }}">{{ $device->customer_name }}
                                        {{ $device->customer_surname }}</a>
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Tip | Marka | Model
                                </div>
                                <div class="p-3">
                                    {{ $device->device_type_value }} | {{ $device->device_brand_value }} |
                                    {{ $device->model }}
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Yanında Teslim Edilenler
                                </div>
                                <div class="p-3">
                                    @if ($device->includes)
                                        {{ $device->includes }}
                                    @else
                                        <span class="text-muted">Belirtilmedi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Sorunlar
                                </div>
                                <div class="p-3">
                                    {{ $device->problems }}
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Müşteri Notu
                                </div>
                                <div class="p-3">
                                    @if ($device->customer_note)
                                        {{ $device->customer_note }}
                                    @else
                                        <span class="text-muted">Belirtilmedi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Teslim Alan Çalışanın Notu
                                </div>
                                <div class="p-3">
                                    @if ($device->employee_note)
                                        {{ $device->employee_note }}
                                    @else
                                        <span class="text-muted">Belirtilmedi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="border border-2 mt-2">
                                <div class="bg-ebony text-white p-3">
                                    Oluşturma Tarihi
                                </div>
                                <div class="p-3">
                                    {{ $device->created_at }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Yapılan İşlemler
                                </div>
                                <div class="p-3">
                                    <form action="{{ route('admin.device.new_log_post', ['id' => $device->id]) }}"
                                        method="post">
                                        <div class="form-group d-flex w-full justify-content-center">
                                            <input style="width: 87%" class="form-control" name="action" id="ex-email"
                                                type="text" placeholder="Yapılan İşlem">
                                            @csrf
                                            <button class="btn btn-dark ml-2" type="submit">Ekle</button>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-bordered table-hover" id="table"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="70px" class="text-center">İşlem No</th>
                                                <th class="text-center align-middle">İşlem</th>
                                                <th class="text-center align-middle">Personel</th>
                                                <th class="text-center align-middle">Tarih</th>
                                            </tr>
                                        </thead>
                                        @foreach ($device_logs as $log)
                                            <tbody>
                                                <tr class="text-center">
                                                    <td class="align-middle">{{ $log->id }}</td>
                                                    <td class="align-middle">{{ $log->action }}</td>
                                                    <td class="align-middle">{{ $log->user_name }}
                                                        {{ $log->user_surname }}</td>
                                                    <td class="align-middle">{{ $log->created_at }}</td>
                                                </tr>
                                            </tbody>
                                        @endforeach
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

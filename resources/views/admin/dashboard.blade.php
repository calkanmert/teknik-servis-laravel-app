@extends('admin.layout')

@section('page_title', $page_title)

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-ebony color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $customer_count }}</h2>
                    <div class="m-b-5">MÜŞTERİ</div><i class="ti-user widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-primary color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $device_count }}</h2>
                    <div class="m-b-5">CİHAZ</div><i class="ti-mobile widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $device_delivery_count }}</h2>
                    <div class="m-b-5">TESLİM EDİLECEK CİHAZ</div><i class="ti-time widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $giving_back }}</h2>
                    <div class="m-b-5">İADE EDİLECEK CİHAZ</div><i class="ti-close widget-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection

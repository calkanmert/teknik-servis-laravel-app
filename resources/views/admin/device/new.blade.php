@extends('admin.layout')

@section('page_title', $page_title)

@section('content')
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Yeni Cihaz</div>
                    <a href="{{ route('admin.device.select_customer') }}" class="btn btn-dark text-white">Başka Müşteri
                        Seç</a>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Seçilen Müşteri
                                </div>
                                <div class="p-3">
                                    {{ $customer->name }} {{ $customer->surname }} | {{ $customer->phone }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="border border-2">
                                <div class="bg-ebony text-white p-3">
                                    Oluştur
                                </div>
                                <div class="p-3">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-sm-6 form-group @error('device_type') has-error @enderror">
                                                <label>Cihaz Tipi</label>
                                                <select class="form-control" name="device_type">
                                                    <option value="0">Seçin</option>
                                                    @foreach ($device_types as $type)
                                                        @if (old('device_type') == $type->id)
                                                            <option value="{{ $type->id }}" selected>
                                                                {{ $type->value }} </option>
                                                        @else
                                                            <option value="{{ $type->id }}">{{ $type->value }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('device_type')
                                                    <label id="name-error"
                                                        class="help-block error">{{ $errors->first('device_type') }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 form-group @error('device_brand') has-error @enderror">
                                                <label>Cihaz Markası</label>
                                                <select class="form-control" name="device_brand">
                                                    <option value="0">Seçin</option>
                                                    @foreach ($device_brands as $brand)
                                                        @if (old('device_brand') == $brand->id)
                                                            <option value="{{ $brand->id }}" selected>
                                                                {{ $brand->value }}</option>
                                                        @else
                                                            <option value="{{ $brand->id }}">{{ $brand->value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('device_brand')
                                                    <label id="name-error"
                                                        class="help-block error">{{ $errors->first('device_brand') }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group @error('model') has-error @enderror">
                                            <label>Model</label>
                                            <input class="form-control" type="text" name="model"
                                                value="{{ old('model') }}">
                                            @error('model')
                                                <label id="name-error"
                                                    class="help-block error">{{ $errors->first('model') }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('includes') has-error @enderror">
                                            <label>Yanında Teslim Edilenler <small
                                                    class="text-muted">(Opsiyonel)</small></label>
                                            <input class="form-control" type="text" name="includes"
                                                value="{{ old('includes') }}">
                                            @error('includes')
                                                <label id="name-error"
                                                    class="help-block error">{{ $errors->first('includes') }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('problems') has-error @enderror">
                                            <label>Sorunlar </label>
                                            <textarea class="form-control" name="problems" id="" rows="3">{{ old('problems') }}</textarea>
                                            @error('problems')
                                                <label id="name-error"
                                                    class="help-block error">{{ $errors->first('problems') }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('customer_note') has-error @enderror">
                                            <label>Müşteri Notu <small class="text-muted">(Opsiyonel)</small></label>
                                            <textarea class="form-control" name="customer_note" id="" rows="3">{{ old('customer_note') }}</textarea>
                                            @error('customer_note')
                                                <label id="name-error"
                                                    class="help-block error">{{ $errors->first('customer_note') }}</label>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('employee_note') has-error @enderror">
                                            <label>Teslim Alan Çalışanın Notu <small
                                                    class="text-muted">(Opsiyonel)</small></label>
                                            <textarea class="form-control" name="employee_note" id="" rows="3">{{ old('employee_note') }}</textarea>
                                            @error('employee_note')
                                                <label id="name-error"
                                                    class="help-block error">{{ $errors->first('employee_note') }}</label>
                                            @enderror
                                        </div>
                                        @csrf
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Oluştur</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

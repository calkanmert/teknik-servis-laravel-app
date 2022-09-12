@extends('admin.layout')

@section('page_title', $page_title)

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Yeni Müşteri</div>
                </div>
                <div class="ibox-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-6 form-group @error('name') has-error @enderror">
                                <label>Adı</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <label id="name-error" class="help-block error">{{ $errors->first('name') }}</label>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group @error('surname') has-error @enderror">
                                <label>Soyadı</label>
                                <input class="form-control" type="text" name="surname" value="{{ old('surname') }}">
                                @error('surname')
                                    <label id="name-error" class="help-block error">{{ $errors->first('surname') }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('phone') has-error @enderror">
                            <label>Telefon Numarası</label>
                            <input class="form-control" id="phone" type="text" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <label id="name-error" class="help-block error">{{ $errors->first('phone') }}</label>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>E-Posta Adresi <small class="text-muted">(Opsiyonel)</small></label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <label id="name-error" class="help-block error">{{ $errors->first('email') }}</label>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-error @enderror">
                            <label>Adres <small class="text-muted">(Opsiyonel)</small></label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                            @error('address')
                                <label id="name-error" class="help-block error">{{ $errors->first('address') }}</label>
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
@endsection

@section('js')
    <script src="{{ asset('assets/admin/vendors/jquery.maskedinput/dist/jquery.maskedinput.min.js') }}"
        type="text/javascript"></script>
    <script type="text/javascript">
        $('#phone').mask('999 999 9999');
    </script>
@endsection

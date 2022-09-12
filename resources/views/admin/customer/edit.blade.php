@extends('admin.layout')

@section('page_title', $page_title)

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Müşteri Düzenle</div>
                </div>
                <div class="ibox-body">
                    @if (Session::has('status'))
                        <div class="alert {{ Session::get('status')['class'] }} alert-dismissable fade show">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            {{ Session::get('status')['message'] }}
                        </div>
                    @endif
                    <form action="{{ route('admin.customer.edit_post', ['id' => $customer->id]) }}" method="post">
                        <div class="row">
                            <div class="col-sm-6 form-group @error('name') has-error @enderror">
                                <label>Adı</label>
                                <input class="form-control" type="text" name="name" value="{{ $customer->name }}">
                                @error('name')
                                    <label id="name-error" class="help-block error">{{ $errors->first('name') }}</label>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group @error('surname') has-error @enderror">
                                <label>Soyadı</label>
                                <input class="form-control" type="text" name="surname" value="{{ $customer->surname }}">
                                @error('surname')
                                    <label id="name-error" class="help-block error">{{ $errors->first('surname') }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('phone') has-error @enderror">
                            <label>Telefon Numarası</label>
                            <input class="form-control" id="phone" type="text" name="phone"
                                value="{{ $customer->phone }}">
                            @error('phone')
                                <label id="name-error" class="help-block error">{{ $errors->first('phone') }}</label>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label>E-Posta Adresi <small class="text-muted">(Opsiyonel)</small></label>
                            <input class="form-control" type="email" name="email" value="{{ $customer->email }}">
                            @error('email')
                                <label id="name-error" class="help-block error">{{ $errors->first('email') }}</label>
                            @enderror
                        </div>
                        <div class="form-group @error('address') has-error @enderror">
                            <label>Adres <small class="text-muted">(Opsiyonel)</small></label>
                            <input class="form-control" type="text" name="address" value="{{ $customer->address }}">
                            @error('address')
                                <label id="name-error" class="help-block error">{{ $errors->first('address') }}</label>
                            @enderror
                        </div>
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Düzenle</button>
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

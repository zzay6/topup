@extends('layouts.app')
@section('title','Daftar - TopupYuk')
@section('config')
<style type="text/css">
    .btn-show-input, .btn-hide-input {
        position: absolute;
        right: 10px;
        font-size: 17px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="text-primary mb-3 d-flex m-auto justify-content-center" style="align-items: center;">
                        <i class="fas fa-user-plus"></i>
                        <span style="font-size: 0.8em" class="ml-2">Daftar</span>
                    </h4>
                    <hr>
                    <form method="POST" action="{{ route('register') }}" class="mt-4">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama pengguna') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata sandi') }}</label>

                            <div class="col-md-6">
                                <div class="input-group" style="align-items: center;">
                                    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-sm" name="password" required autocomplete="new-password">
                                    <i class="btn-show-input far fa-eye text-primary p-2"></i>
                                    <i class="btn-hide-input far fa-eye-slash text-primary p-2"></i>
                                
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary btn-submit">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <span class="text-secondary">Sudah punya akun?</span>
                            <a href="{{ url('login') }}">Masuk disini!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-hide-input').hide();
    $('.btn-show-input').click(function(){
        $('#password').attr('type','text');
        $(this).hide();
        $('.btn-hide-input').show()
    });

    $('.btn-hide-input').click(function(){
        $('#password').attr('type','password');
        $(this).hide();
        $('.btn-show-input').show()
    });

    $('.btn-submit').click(function(){

        $.ajax({
            url: $('form').attr('action'),
            type: $('form').attr('method'),
            dataType: 'json',
            data: {
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'email' : $('#email').val(),
                'name' : $('#name').val(),
                'password' : $('#password').val()
            },
            success : function(result){
                if(result.status == 'failed'){

                    swal({
                        title: 'Pendaftaran gagal',
                        text: result.message,
                        icon: 'warning',
                        button: false,
                        timer: 3000
                    });

                } else {

                    swal({
                        title: 'Hai, pengguna baru',
                        text: result.message,
                        icon: 'success',
                        button: false,
                        timer: 3000
                    }).then((value) => {
                        window.location.href = 'login';
                    });

                }
            }
        });

    });
</script>
@endsection

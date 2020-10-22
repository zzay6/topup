@extends('layouts.app')
@section('title','Kata sandi baru - TopupYuk')
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

                    <form method="POST" action="{{ url('password/reset') }}/{{ $token }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konformasi Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary btn-submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-submit').click(function(){
        $(this).html('Mengirim...');
        $.ajax({
            url: $('form').attr('action'),
            type: $('form').attr('method'),
            dataType: 'json',
            data: {
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'password' : $('#password').val()
            },
            success : function(result){
                if(result.status == 'success'){

                    swal({
                        title: result.message,
                        text: result.message,
                        icon: 'success',
                        button: false,
                        timer: 2000
                    }).then((value) => {
                        window.location.href = '{{ url("login") }}';
                    });

                }
            }
        });

    });
</script>
@endsection

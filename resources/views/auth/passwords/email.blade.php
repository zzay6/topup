@extends('layouts.app')
@section('title','Lupa kata sandi - TopupYuk')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-7">
            <div class="message">
                
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="text-primary mb-3 d-flex m-auto justify-content-center" style="align-items: center;">
                        <i class="fas fa-user"></i>
                        <span style="font-size: 0.8em" class="ml-2">Ganti kata sandi</span>
                    </h4>
                    <hr>
                    <form method="POST" action="{{ route('login') }}" class="mt-4" id="form">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary btn-submit text-white">
                                    {{ __('Kirim link') }}
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
    $('.btn-submit').on('click', function(){
        $(this).html('Mengirim...');
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-warning');
        $.ajax({
            url:'{{ url("password/remember") }}',
            type:'post',
            dataType:'json',
            cache:false,
            data:{
                'email' : $('#email').val(),
                '_token' : $('meta[name="csrf-token"]').attr('content')
            },
            success : function(result){
                
                if(result.status == 'success'){

                    $('.message').html(`
                        <div class="alert alert-success">`+ result.message +`</div>
                    `);
                    $('.btn-submit').html('Link dikirim');
                    $('.btn-submit').removeClass('btn-warning');
                    $('.btn-submit').addClass('btn-success');

                } else {                


                    $('.btn-submit').html('Kirim link');
                    $('.btn-submit').removeClass('btn-warning');
                    $('.btn-submit').addClass('btn-primary');

                    $('.message').html(`
                        <div class="alert alert-danger">`+ result.message +`</div>
                    `);

                }
            }
        });
    });
</script>
@endsection
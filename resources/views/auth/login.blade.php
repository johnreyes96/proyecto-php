@extends('layouts.app')

@section('content')
<div class="limiter">
        <div class="container-login100" style="background-image: url('images/img-01.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login100-form-avatar">
                        <img src="images/avatar-02.png" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        SOVEHI
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Usuario es requerido">
                        <input class="input100 @error('usuario') is-invalid @enderror" type="text" name="usuario" placeholder="Usuario">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    @error('usuario')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                          {{ $message }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        @enderror
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Contraseña es requerida">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">
                            Iniciar sesión
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

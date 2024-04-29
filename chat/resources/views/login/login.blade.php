@extends('login.layouts.master')

@section('content')
    <div class="container-sm d-flex align-items-center justify-content-center flex-wrap max-height">
        <div class="bg-white login-contanier d-flex justify-content-center flex-wrap">
            <div class="form-title bg-info d-flex align-items-center justify-content-center">
                <h1>Iniciar Sesion</h1>
            </div>
            <form style="display:inline-block" action="{{ secure_url('login') }}">
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <i class="fa fa-user fa-4x"></i>
                </div>
                <div class="mb-4">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <input class="form-control mt-2" required type="text" id="name" name="name" placeholder="nombre">
                </div>
                <div class="mb-4">
                    @error('pass')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <input class="form-control mt-2" required type="password" id="pass" name="pass"
                        placeholder="contraseña">
                </div>
                <div>
                    @if (session('noUser'))
                        <span class="mb-4 m-1 text-danger">
                            {{ session('noUser') }}
                        </span>
                    @endif
                    <input class="form-control mt-3" type="submit" value="Inicar Sesion">
                </div>
                <div class="mt-4 mb-4 text-center">
                    <a class="fs-s" href="{{ secure_url('register') }}">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('title')
    Register Page
@endsection

@section('auth-type')
    register-page
@endsection

@section('contents')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>BarBarPet Clinic</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrasi akun</p>

                <form action="{{route('auth.register')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" value="{{ old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input value="{{ old('email')}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input value="{{ old('password')}}" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input value="{{ old('password_confirmation')}}" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ketik ulang password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{route('auth.login')}}" class="text-center">Sudah memiliki akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection


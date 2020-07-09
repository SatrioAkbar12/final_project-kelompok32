@extends('layouts.auth_master')

@section('head_title', 'Register User')

@section('konten')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
            </div>

            <form method="POST" action="{{ route('register') }}" class="user">
              @csrf

              <div class="form-group row">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

              <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Alamat Email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-sm-6">
                  <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password" required autocomplete="new-password">
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Buat Akun') }}
              </button>
              <hr>

            </form>

            <hr>
            {{-- <div class="text-center">
              <a class="small" href="forgot-password.html">Lupa Password?</a>
            </div> --}}
            <div class="text-center">
              <a class="small" href="/login">Sudah memiliki akun? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

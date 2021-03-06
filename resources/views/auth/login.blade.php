@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center align-items-center h-100vh">
    <div class="col-lg-6">
      <div class="login-card p-5 bg-white">
        <div class="login-card-header pb-3">{{ __('Inicia sesion en tu cuenta') }}</div>

        <div class="login-card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div> --}}
              <label for="username" class="col-md-12 col-form-label font-weight-bold">Usuario</label>

              <div class="col-md-12">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                  name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-12 col-form-label font-weight-bold">Contraseña</label>

              <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
              {{ __('Remember Me') }}
            </label>
        </div>
      </div>
    </div> --}}

    <div class="form-group row mb-0 mt-2">
      <div class="col-md-12">
        <button type="submit" class="btn">
          Ingresar
        </button>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        @endif
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
@endsection

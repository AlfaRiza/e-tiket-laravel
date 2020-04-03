@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mt-3">
                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"  name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                        <input id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus placeholder="{{ __('Username') }}">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('Email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="{{ __('Phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" autocomplete="new-password" placeholder="Repeat Password">
                  </div>
                </div>
                <hr>
                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Role') }}</label>
                        <div class="form-group row ml-5">
                            <div class="col-md-4 offset-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="peserta" value="3" checked>
                                    <label class="form-check-label text-md-right" for="peserta">
                                    {{ __('Peserta') }}
                                    </label>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="penyelenggara" value="2">
                                    <label class="form-check-label text-md-right" for="penyelenggara">
                                        {{ __('Penyelenggara') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                </button>
              </form>
              <hr>
              <div class="text-center">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                </a>
            @endif
              </div>
              <div class="text-center">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

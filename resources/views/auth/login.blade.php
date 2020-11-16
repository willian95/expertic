@extends('layouts.auth')
@section('content')
<div class="login_admin" id="dev-login">
   <div class="row">
      <div class="login100-more mask col-md-6"
         style="background-image: url('assets/images/Experclass-logo-V3-2.png');">
         {{--<p>Experclass</p>--}}
      </div>
      <form method="POST" action="{{ route('login') }}" class="login100-form col-md-6">
         @csrf
         <div class="wrap-input100 @error('email') invalid-feedback-border @enderror">
            <input class="input100" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
         </div>
         @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
         <div class="wrap-input100 @error('password') invalid-feedback-border @enderror">
            <input class="input100" id="password" type="password" class="form-control" name="password" autocomplete="current-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
         </div>
         @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
         <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Entrar
            </button>
         </div>
      </form>
   </div>
</div>
@endsection


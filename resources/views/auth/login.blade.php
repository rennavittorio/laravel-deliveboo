@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="login-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="login-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="login-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-sub-login">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
/////////////////////////////////////////
//////////login form controls///////////
////////////////////////////////////////
let loginMail = '';
let loginMailCheck = false;

let loginPsw = '';
let loginPswCheck = false;

//submit btn, initialized as disabled
let btnSubLogin = '';
btnSubLogin = document.getElementById('btn-sub-login');
if(btnSubLogin !== null){
    btnSubLogin.disabled = true;
}

//check mail
document.getElementById("login-email").addEventListener("blur", ()=>{
    loginMail = document.getElementById('login-email');
    if(loginMail.value.length === 0){
        loginMail.className = ('form-control border border-danger');
        loginMailCheck = false;
        btnSubLogin = document.getElementById('btn-sub-login');
        btnSubLogin.disabled = true;
    } else {
        loginMail.className = ('form-control border border-success');
        loginMailCheck = true;
        if(loginMailCheck && loginPswCheck){
            btnSubLogin = document.getElementById('btn-sub-login');
            btnSubLogin.disabled = false;
        }
    }
})

//check psw && pswConf inputs
document.getElementById("login-password").addEventListener("blur", ()=>{
    loginPsw = document.getElementById('login-password');
    console.log(loginPsw.value.length)
    if(loginPsw.value.length === 0){
        loginPsw.className = ('form-control border border-danger');
        loginPswCheck = false;
        btnSubLogin = document.getElementById('btn-sub-login');
        btnSubLogin.disabled = true;
    }

    if(loginPsw.value.length >= 1 && loginPsw.value.length < 8){
        loginPsw.className = ('form-control border border-warning');
        loginPswCheck = false;
        btnSubLogin = document.getElementById('btn-sub-login');
        btnSubLogin.disabled = true;
    } 

    if(loginPsw.value.length >= 8){
        loginPsw.className = ('form-control border border-success');
        loginPswCheck = true;
        btnSubLogin = document.getElementById('btn-sub-login');
        btnSubLogin.disabled = false;
    }
})
</script>
@endsection

@extends('layouts.fullLayoutMaster')
{{-- page title --}}

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
@section('title','Mot de passe oublié')
@else
@section('title','Forgot Password')
@endif

{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- forgot password start -->

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

<!-- FRENCH VERSION -->
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-9 col-10  px-0">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-forgot password -->
        <div class="col-md-6 col-12 px-0" style="background: white;">
          <div class="card disable-rounded-right mb-0 p-2"  style="background: url({{asset('images/logo/logo200x200.png')}}) top left no-repeat; background-size: 20%">
            <div class="card-header pb-1">
              <div class="card-title">
                <h5 class="text-center mb-2">Mot de passe oublié?</h5>
              </div>
            </div>
            <div class="form-group d-flex justify-content-between align-items-center mb-2">
              <div class="text-left">
                <div class="ml-3 ml-md-2 mr-1">
                  <a href="{{asset('login')}}"  class="card-link btn btn-outline-primary text-nowrap">Connexion</a>
                </div>
              </div>
              <div class="mr-3">
                <a href="{{asset('register')}}" class="card-link btn btn-outline-primary text-nowrap">Inscription</a>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="text-muted text-center mb-2">
                  <small>Entrez l'adresse e-mail que vous avez utilisé pour lors de l'inscription
                    et nous allons vous envoyer un lien de renitialisation </small>
                </div>
                {{-- form --}}
                <form class="mb-2" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group mb-2">
                    <label class="text-bold-600" for="email">Adresse E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Adresse E-mail">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>Nous ne pouvons pas trouver un utilisateur avec cette adresse e-mail.</strong>
                      </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary glow position-relative w-100">ENVOYER LE LIEN
                    <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                  </button>
                </form>

                <div class="text-center mb-2">
                  <a href="{{asset('login')}}">
                    <small class="text-muted">Je me souviens de mon mot de passe</small>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center">
          <img class="img-fluid" src="{{asset('images/pages/forgot-password.png')}}" alt="branding logo" width="300">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FRENCH VERSION -->

@else



<!-- ENGLISH VERSION -->
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-9 col-10  px-0">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-forgot password -->
        <div class="col-md-6 col-12 px-0"  style="background: white;">
          <div class="card disable-rounded-right mb-0 p-2"  style="background: url({{asset('images/logo/logo200x200.png')}}) top left no-repeat; background-size: 20%">
            <div class="card-header pb-1">
              <div class="card-title">
                <h5 class="text-center mb-2">Forgot Password?</h5>
              </div>
            </div>
            <div class="form-group d-flex justify-content-between align-items-center mb-2">
              <div class="text-left">
                <div class="ml-3 ml-md-2 mr-1">
                  <a href="{{asset('login')}}"  class="card-link btn btn-outline-primary text-nowrap">Sign in</a>
                </div>
              </div>
              <div class="mr-3">
                <a href="{{asset('register')}}" class="card-link btn btn-outline-primary text-nowrap">Sign up</a>
              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="text-muted text-center mb-2">
                  <small>Enter the email number you used when you joined and we will send you temporary password link</small>
                </div>
                {{-- form --}}
                <form class="mb-2" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group mb-2">
                    <label class="text-bold-600" for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary glow position-relative w-100">SEND PASSWORD LINK
                    <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                  </button>
                </form>

                <div class="text-center mb-2">
                  <a href="{{asset('login')}}">
                    <small class="text-muted">I remembered my password</small>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center">
          <img class="img-fluid" src="{{asset('images/pages/forgot-password.png')}}" alt="branding logo" width="300">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ENGLISH VERSION -->

@endif

<!-- forgot password ends -->
@endsection

@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','Register Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- register section starts -->
<section class="row flexbox-container">
  <div class="col-xl-8 col-10">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- register section left -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Inscription</h4>
              </div>
            </div>
            <div class="text-center">
              <p> <small> S'il vous plait entrez vos données pour créer un compte</small>
              </p>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  {{-- Familyname of the user--}}
                  <div class="form-group mb-50">
                    <label class="text-bold-600" for="name">Nom</label>
                    <input id="familyname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de famille">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  {{-- Givenname of the user--}}
                  <div class="form-group mb-50">
                    <label class="text-bold-600" for="name">Prenoms</label>
                    <input id="givenname" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Prenoms">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group mb-50">
                    <label class="text-bold-600" for="email">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group mb-2">
                    <label class="text-bold-600" for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group mb-2">
                    <label class="text-bold-600" for="password-confirm">Confirm mot de passe</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                  </div>
                  <button type="submit" class="btn btn-primary glow position-relative w-100">CREER UN COMPTE<i
                    id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                </form>
                <hr>
                <div class="text-center"><small class="mr-25">Vous avez dejà un compte?</small>
                  <a href="{{asset('login')}}"><small>Connectez-vous</small> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- image section right -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
            <img class="img-fluid" src="{{asset('images/pages/register.png')}}" alt="branding logo">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- register section endss -->
@endsection

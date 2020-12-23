@extends('layouts.fullLayoutMaster')

{{-- page title --}}

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
@section('title','Inscription')
@else 
@section('title','Register')
@endif

{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

    <!-- FRENCH VERSION -->

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
                      <div class="form-row">
                      {{-- Familyname of the user--}}
                        <div class="form-group col-md-6 mb-50">
                          <label class="text-bold-600" for="name">Nom</label>
                          <input id="name" type="text" class="form-control @error('familyname') is-invalid @enderror" name="familyname" value="{{ old('familyname') }}" required autocomplete="name" autofocus placeholder="Nom de famille">
                          @error('familyname')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        {{-- Givenname of the user--}}
                        <div class="form-group col-md-6 mb-50">
                          <label class="text-bold-600" for="name">Prenoms</label>
                          <input id="name" type="text" class="form-control @error('givenname') is-invalid @enderror" name="givenname" value="{{ old('givenname') }}" required autocomplete="name" autofocus placeholder="Prenoms">
                          @error('givenname')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      {{-- gender of the user--}}
                      <div class="form-group mb-50">
                        <label class="text-bold-600" for="gender">Sexe</label>
                        <div class="form-group">
                          <select id="gender" class="form-control"  name="gender">
                            <option value="0"> MASCULIN </option>
                            <option value="1"> FEMININ </option>
                          </select>
                        </div>
                        @error('gender')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      {{-- password of the user--}}
                      <div class="form-group mb-50">
                        <label class="text-bold-600" for="email">Adresse e-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse e-mail">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group mb-2">
                        <label class="text-bold-600" for="password">Mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      {{-- confirm password of the user--}}
                      <div class="form-group mb-2">
                        <label class="text-bold-600" for="password-confirm">Confirmer mot de passe</label>
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

    <!-- FRENCH VERSION -->

  @else

    <!-- ENGLISH VERSION -->

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
                    <h4 class="text-center mb-2">Sign Up</h4>
                  </div>
                </div>
                <div class="text-center">
                  <p> <small>Please enter your details to sign up and be part of our great community</small>
                  </p>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="form-row">
                        {{-- Familyname of the user--}}
                        <div class="form-group col-md-6 mb-50">
                          <label class="text-bold-600" for="name">FIRST NAME</label>
                          <input id="name" type="text" class="form-control @error('familyname') is-invalid @enderror" name="familyname" value="{{ old('familyname') }}" required autocomplete="name" autofocus placeholder="First name">
                          @error('familyname')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        {{-- Givenname of the user--}}
                        <div class="form-group col-md-6 mb-50">
                          <label class="text-bold-600" for="name">LAST NAME</label>
                          <input id="name" type="text" class="form-control @error('givenname') is-invalid @enderror" name="givenname" value="{{ old('givenname') }}" required autocomplete="name" autofocus placeholder="Last name">
                          @error('givenname')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      {{-- gender of the user--}}
                      <div class="form-group mb-50">
                        <label class="text-bold-600" for="gender">Gender</label>
                        <div class="form-group">
                          <select id="gender" class="form-control"  name="gender">
                            <option value="0"> MALE </option>
                            <option value="1"> FEMALE </option>
                          </select>
                        </div>
                        @error('gender')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      {{-- password of the user--}}
                      <div class="form-group mb-50">
                        <label class="text-bold-600" for="email">Email address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group mb-2">
                        <label class="text-bold-600" for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      {{-- confirm password of the user--}}
                      <div class="form-group mb-2">
                        <label class="text-bold-600" for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                      </div>
                      <button type="submit" class="btn btn-primary glow position-relative w-100">SIGN UP<i
                        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                    </form>
                    <hr>
                    <div class="text-center"><small class="mr-25">Already have an account?</small>
                      <a href="{{asset('login')}}"><small>Sign in</small> </a>
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

    <!-- ENGLISH VERSION -->

  @endif

@endsection

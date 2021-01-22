@extends('layouts.fullLayoutMaster')
{{-- page title --}}

@section('title','Forgot Password')
@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
@section('title','Restauration de mot de passe')
@else
@section('title','Restore password')
@endif

@section('content')

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

    <!-- FRENCH VERSION -->

    <!-- reset password start -->
    <section class="row flexbox-container">
      <div class="col-xl-7 col-10">
        <div class="card bg-authentication mb-0">
          <div class="row m-0">
            <!-- left section-login -->
            <div class="col-md-6 col-12 px-0">
              <div class="card disable-rounded-right d-flex justify-content-center mb-0 p-2 h-100">
                <div class="card-header pb-1">
                  <div class="card-title">
                    <h4 class="text-center mb-2">Réinitialisez votre mot de passe</h4>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  <form method="POST" class="mb-2" action="{{ route('password.update') }}">
                    @csrf

                  <input type="hidden" name="token" value="{{ $token }}">

                      <div class="form-group">
                          <label class="text-bold-600" for="exampleInputPassword1">Adresse e-mail</label>
                          <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>Ce lien de réinitialisation n'est pas plus valide</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="text-bold-600" for="exampleInputPassword1">Nouveau de passe</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                              placeholder="Entrez un Nouveau de passe" required autocomplete="new-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group mb-2">
                          <label class="text-bold-600" for="exampleInputPassword2">Confimer Nouveau de passe</label>
                          <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                              placeholder="Confirm votre Nouveau de passe" required autocomplete="new-password"></div>
                      <button type="submit" class="btn btn-primary glow position-relative w-100">Réinitialiser<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- right section image -->
            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
              <img class="img-fluid" src="{{asset('images/pages/reset-password.png')}}" alt="branding logo">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- reset password ends -->

    <!-- FRENCH VERSION -->

@else

    <!-- ENGLISH VERSION -->

    <!-- reset password start -->
    <section class="row flexbox-container">
      <div class="col-xl-7 col-10">
        <div class="card bg-authentication mb-0">
          <div class="row m-0">
            <!-- left section-login -->
            <div class="col-md-6 col-12 px-0">
              <div class="card disable-rounded-right d-flex justify-content-center mb-0 p-2 h-100">
                <div class="card-header pb-1">
                  <div class="card-title">
                    <h4 class="text-center mb-2">Reset your Password</h4>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  <form method="POST" class="mb-2" action="{{ route('password.update') }}">
                    @csrf

                  <input type="hidden" name="token" value="{{ $token }}">

                      <div class="form-group">
                          <label class="text-bold-600" for="exampleInputPassword1">E-mail address</label>
                          <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="text-bold-600" for="exampleInputPassword1">New Password</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                              placeholder="Enter a new password" required autocomplete="new-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                      <div class="form-group mb-2">
                          <label class="text-bold-600" for="exampleInputPassword2">Confirm New
                              Password</label>
                          <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                              placeholder="Confirm your new password" required autocomplete="new-password"></div>
                      <button type="submit" class="btn btn-primary glow position-relative w-100">Reset my
                          password<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- right section image -->
            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
              <img class="img-fluid" src="{{asset('images/pages/reset-password.png')}}" alt="branding logo">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- reset password ends -->

    <!-- ENGLISH VERSION -->

@endif

@endsection

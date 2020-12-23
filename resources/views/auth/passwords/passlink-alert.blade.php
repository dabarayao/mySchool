@extends('layouts.fullLayoutMaster')
{{-- page title --}}

@section('title','Forgot Password')
@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')
@section('title','Mail de restauration')
@else 
@section('title','Reset email')
@endif

@section('content')

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

  {{-- FRENCH VERSION --}}
  @if (session('reset'))
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ __('Vérifiez votre adresse E-mail') }}</div>

            <div class="card-body">

                <div class="alert alert-success" role="alert">
                  {{ __('Un lien de réinitialisation de votre mot de passe a été envoyé à votre adresse e-mail.') }}
                </div>


              {{ __('Avant de continuer utiliser le lien que avez réçu sur votre adresse E-mail pour réinitialiser votre mot de passe') }}
              {{ __('Si vous n\'avez pas reçu de mail') }},

                <a href="{{route('password.request')}}">{{ __('click ici pour renvoyer le lien') }}</a>.

            </div>
          </div>
        </div>
      </div>
    </div>

  @else

    @php

    header('Location: /login');
    exit;
    @endphp

  @endif
  {{-- FRENCH VERSION --}}

@else

  {{-- ENGLISH VERSION --}}
  @if (session('reset'))
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Check your E-mail address') }}</div>

          <div class="card-body">

              <div class="alert alert-success" role="alert">
                {{ __('A reset link has been to your email address') }}
              </div>


            {{ __('Before start, use the link you received on your email address to reset your password') }}
            {{ __('If you have not received an email') }},

              <a href="{{route('password.request')}}">{{ __('click here to resend link') }}</a>.

          </div>
        </div>
      </div>
    </div>
  </div>

  @else

  @php

  header('Location: /login');
  exit;
  @endphp

  @endif
  {{-- ENGLISH VERSION --}}
@endif





@endsection

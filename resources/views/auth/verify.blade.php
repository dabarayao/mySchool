@extends('layouts.fullLayoutMaster')

@section('content')

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

{{-- FRENCH VERSION --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Vérifiez votre adresse E-mail') }}</div>

        <div class="card-body">
          @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('Un lien de vérification a été envoyé à votre adresse e-mail.') }}
            </div>
          @endif

          {{ __('Avant de continuer vérifier le lien que avez réçu sur votre adresse E-mail') }}
          {{ __('Si vous n\'avez pas reçu de mail') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click ici pour renvoyer le lien') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- FRENCH VERSION --}}

@else

{{-- ENGLISH VERSION --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Check your E-mail address') }}</div>

        <div class="card-body">
          @if (session('resent'))
            <div class="alert alert-success" role="alert">
              {{ __('A verification link has been sent to your email address.') }}
            </div>
          @endif

          {{ __('Before start, check the link you received on your Email address') }}
          {{ __('Si vous n\'avez pas reçu de mail') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend link') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ENGLISH VERSION --}}

@endif

@endsection

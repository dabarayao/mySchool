@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Error 404')

@section('content')
<!-- error 404 -->

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

{{-- FRENCH VERSION--}}
<section class="row flexbox-container">
  <div class="col-xl-6 col-md-7 col-9">
    <div class="card bg-transparent shadow-none">
      <div class="card-content">
        <div class="card-body text-center bg-transparent miscellaneous">
          <h1 class="error-title">Page Non disponible :(</h1>
          <p class="pb-3 text-uppercase text-bold-700">
           Nous ne pouvons pas trouvé la page que vous recherchez</p>
      <img class="img-fluid" src="{{asset('images/pages/404.png')}}" alt="404 error">
          <a href="{{asset('/')}}" class="btn btn-primary round glow mt-3">Retourner a l'accueil</a>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- FRENCH VERSION--}}

@else

{{-- ENGLISH VERSION--}}
<section class="row flexbox-container">
  <div class="col-xl-6 col-md-7 col-9">
    <div class="card bg-transparent shadow-none">
      <div class="card-content">
        <div class="card-body text-center bg-transparent miscellaneous">
          <h1 class="error-title">Page Not Found :(</h1>
          <p class="pb-3 text-uppercase text-bold-700">
            we couldn't find the page you are looking for</p>
      <img class="img-fluid" src="{{asset('images/pages/404.png')}}" alt="404 error">
          <a href="{{asset('/')}}" class="btn btn-primary round glow mt-3">BACK TO HOME</a>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- ENGLISH VERSION--}}

@endif

<!-- error 404 end -->
@endsection

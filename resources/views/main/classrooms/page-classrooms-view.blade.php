@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Afficher une classe')

  @endif

@else



  @section('title','Display a class')



@endif




{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

            <!-- header breadcrumbs -->
            <div class="content-header row">
              <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                  <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Classes</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Afficher une classe
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12 col-12">
          <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$classroom->label}}
                      @if($current->root == true)
                          @foreach ($school as $schools)

                            @if($schools->id == $classroom->school_id) => <span class="text-primary"> {{$schools->name}} </span>@endif
                          @endforeach
                      @endif
                    </h5>
                    <ul class="list-unstyled">
                      <li><i class="cursor-pointer bx bx-pen mb-1 mr-50"></i><span class="text-primary">Nombre d'étudiants:</span> 0</li>
                      <li><i class="cursor-pointer bx bx-chalkboard mb-1 mr-50"></i><span class="text-primary">Nombre de professeurs:</span> 0</li>
                      <li><i class="cursor-pointer bx bx-exit mb-1 mr-50"></i><span class="text-primary">Classe d'examen:</span> @if($classroom->isexam == true) OUI @else NON @endif</li>
                    </ul>
                    <div class="row">

                      <div class="col-12">
                        <div><span class="text-primary">Sigle:</span> {{$classroom->description}}</div>
                        <p><span class="text-primary">Description:</span> {{$classroom->description}}</p>
                      </div>
                    </div>
                    <a href="{{route('classroom-edit', $classroom->id)}}" class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                      <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Modifier</span>
                    </a>
                  </div>
                </div>
        </div>
      </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
  @endif

@else

        <!-- header breadcrumbs -->
            <div class="content-header row">
              <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                  <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Classroom</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Display a class
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12 col-12">
          <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$classroom->label}}
                      @if($current->root == true)
                          @foreach ($school as $schools)

                            @if($schools->id == $classroom->school_id) => <span class="text-primary"> {{$schools->name}} </span>@endif
                          @endforeach
                      @endif
                    </h5>
                    <ul class="list-unstyled">
                      <li><i class="cursor-pointer bx bx-pen mb-1 mr-50"></i><span class="text-primary">Number of students:</span> 0</li>
                      <li><i class="cursor-pointer bx bx-chalkboard mb-1 mr-50"></i><span class="text-primary">Number of teachers:</span> 0</li>
                      <li><i class="cursor-pointer bx bx-exit mb-1 mr-50"></i><span class="text-primary">Exam class:</span> @if($classroom->isexam == true) YES @else NO @endif</li>
                    </ul>
                    <div class="row">

                      <div class="col-12">
                        <div><span class="text-primary">Code:</span> {{$classroom->description}}</div>
                        <p><span class="text-primary">Description:</span> {{$classroom->description}}</p>
                      </div>
                    </div>
                    <a href="{{route('classroom-edit', $classroom->id)}}" class="btn btn-sm d-none d-sm-block float-right btn-light-primary mb-2">
                      <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Modifier</span>
                    </a>
                  </div>
                </div>
        </div>
      </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->

@endif




@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
{{-- supermask.js cdn--}}
<script src="https://cdn.jsdelivr.net/npm/supermask-js@1.0.0/index.min.js"></script>
@endsection

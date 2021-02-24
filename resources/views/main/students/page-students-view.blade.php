@extends('layouts.contentLayoutMaster')
{{-- title --}}

@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Afficher un étudiant ou un élève')

  @endif

@else



  @section('title','Display a student or a pupils')



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
                  <h5 class="content-header-title float-left pr-1 mb-0">Accueil</h5>
                  <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                                              <li class="breadcrumb-item ">
                                      <a href="#"><i class="bx bx-home-alt"></i></a>
                                      </li>
                                    <li class="breadcrumb-item active">
                                    Afficher un étudiant ou un élève
                                      </li>
                  </div>
                </div>
              </div>
            </div>
          </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-md-9">
            <!-- user profile nav tabs profile start -->
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">

                            @if($student->photo == NULL && $student->gender == false)
                              <img src="{{asset('images/mockup/man.jpg')}}" class="rounded" alt="group image" height="120" width="120">

                            @elseif($student->photo == NULL && $student->gender == true)
                              <img src="{{asset('images/mockup/woman.jpg')}}" class="rounded" alt="group image" height="120" width="120">
                            @else
                              <img src="{{asset($student->photo)}}" class="rounded" alt="group image" height="120" width="120">

                            @endif

                          </div>
                          <div class="col-12 col-sm-9">
                            <div class="row">
                              <div class="col-12 text-center text-sm-left">
                                <h4 class="media-heading mb-0">Prénoms: {{$student->givenname}}<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h4>
                                <h6 class="text-muted align-top">Nom: {{$student->familyname}}</h6>
                              </div>
                              <div class="col-12 text-center text-sm-left">

                                <div>
                                  <div class="badge badge-light-primary badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="with 7% growth @valintini_007  is on top 5k"><i class="cursor-pointer bx bx-check-shield"></i>
                                  </div>
                                  <div class="badge badge-light-warning badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="last 55% growth @valintini_007  is on weedday"><i class="cursor-pointer bx bx-badge-check"></i>
                                  </div>
                                  <div class="badge badge-light-success badge-round mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="got premium profile here"><i class="cursor-pointer bx bx-award"></i>
                                  </div>
                                </div>
                                <a role="button" href="{{route('student-edit', $student->id)}}" class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                  <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Modifier</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h5 class="card-title">Details basique</h5>
                    <ul class="list-unstyled">
                      <li><i class="cursor-pointer bx bx-barcode-reader mb-1 mr-50"></i>Numéro matricule: {{$student->reg_number}}</li>
                      <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>Adresse: {{$student->address}}</li>
                      <li><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>({{$student->dialcode}}) {{$student->phone}} </li>
                      <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>Date de naissance: {{date('d-m-Y', strtotime($student->birthdate))}}</li>
                      <li><i class="cursor-pointer bx bx-globe mb-1 mr-50"></i>pays: {{$countries}}</li>
                      <li><i class="cursor-pointer bx bxs-location-plus mb-1 mr-50"></i>Lieu de naissance: {{$student->birthcity}}</li>
                    </ul>
                    <div class="row">
                      <div class="col-6">
                        <h6><small class="text-muted">Est orienté?</small></h6>
                        <p>@if($student->is_oriented == true) Oui @else Non @endif</p>
                      </div>
                      <div class="col-6">
                        <h6><small class="text-muted">Est handicapé?</small></h6>
                        <p>@if($student->is_handicap == true) Oui @else Non @endif</p>
                      </div>

                      @if($student->is_oriented == true)
                        <div class="col-6">
                          <h6><small class="text-muted">PRISE EN CHARGE ORIENTATION </small></h6>
                          <p>{{$student->oriented_percent}} %</p>
                        </div>
                      @endif

                      @if($student->is_handicap == true)
                        <div class="col-6">
                          <h6><small class="text-muted">Libellé handicap</small></h6>
                          <p>{{$student->label_handicap}}</p>
                        </div>
                      @endif

                      @if($student->is_handicap == true)
                      <div class="col-12">
                        <h6><small class="text-muted">Description handicap</small></h6>
                        <p>{{$student->desc_handicap}}</p>
                      </div>
                      @endif
                    </div>
                    <br/>
                    <h5 class="card-title">Parents</h5>
                    <div class="row">
                      <div class="col-6">
                        <h5><small class="text-muted text-bold-600">Mère</small></h5>
                        <p> Nom: </p>
                        <p> Prénoms: </p>
                        <p> Téléphone: </p>
                      </div>
                      <div class="col-6">
                        <h5><small class="text-muted text-bold-700">Père</small></h5>
                        <p> Nom: </p>
                        <p> Prénoms: </p>
                        <p> Téléphone: </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <!-- user profile nav tabs profile ends -->
        </div>
        <div class="col-md-3">

            <!-- user profile right side content birthday card start -->
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="d-inline-flex">
                    <div class="avatar mr-50">
                      <img src="http://localhost/myschool/public/images/portrait/small/avatar-s-20.jpg" alt="avtar images" height="32" width="32">
                    </div>
                    <h6 class="mb-0 d-flex align-items-center"> Rélévé de moyenne</h6>
                  </div>
                  <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                  <div class="user-profile-birthday-image text-center p-2">
                    <img class="img-fluid" src="http://localhost/myschool/public/images/profile/pages/birthday.png" alt="image">
                  </div>
                  <div class="user-profile-birthday-footer text-center text-lg-left">
                    <p class="mb-0"><small>Leave her a message with your best wishes on her profile page!</small></p>
                    <a class="btn btn-sm btn-light-primary mt-50" href="JavaScript:void(0);">Send Wish</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- user profile right side content birthday card ends -->
            <!-- user profile right side content related groups start -->
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <h5 class="card-title mb-1">Scolarité
                    <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
                  </h5>
                  <div class="media d-flex align-items-center mb-1">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-30.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Play Guitar</small></h6><small class="text-muted">2.8k
                        members (7 joined)</small>
                    </div>
                    <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                  </div>
                  <div class="media d-flex align-items-center mb-1">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-31.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Generic memes</small></h6><small class="text-muted">9k
                        members (7 joined)</small>
                    </div>
                    <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                  </div>
                  <div class="media d-flex align-items-center">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-32.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Cricket fan club</small></h6><small class="text-muted">7.6k
                        members</small>
                    </div>
                    <i class="cursor-pointer bx bx-lock text-muted d-flex align-items-center"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- user profile right side content related groups ends -->

        </div>
      </div>
    </section>
    <!-- // Basic multiple Column Form section end -->

  @endif

@else


          <!-- header breadcrumbs -->
          <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h5 class="content-header-title float-left pr-1 mb-0">Accueil</h5>
                  <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                                              <li class="breadcrumb-item ">
                                      <a href="#"><i class="bx bx-home-alt"></i></a>
                                      </li>
                                    <li class="breadcrumb-item active">
                                    Display a student or pupil
                                      </li>
                  </div>
                </div>
              </div>
            </div>
          </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-md-9">
            <!-- user profile nav tabs profile start -->
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-12 col-sm-3 text-center mb-1 mb-sm-0">

                            @if($student->photo == NULL && $student->gender == false)
                              <img src="{{asset('images/mockup/man.jpg')}}" class="rounded" alt="group image" height="120" width="120">

                            @elseif($student->photo == NULL && $student->gender == true)
                              <img src="{{asset('images/mockup/woman.jpg')}}" class="rounded" alt="group image" height="120" width="120">
                            @else
                              <img src="{{asset($student->photo)}}" class="rounded" alt="group image" height="120" width="120">

                            @endif

                          </div>
                          <div class="col-12 col-sm-9">
                            <div class="row">
                              <div class="col-12 text-center text-sm-left">
                                <h4 class="media-heading mb-0">Givenname: {{$student->givenname}}<i class="cursor-pointer bx bxs-star text-warning ml-50 align-middle"></i></h4>
                                <h6 class="text-muted align-top">Familyname: {{$student->familyname}}</h6>
                              </div>
                              <div class="col-12 text-center text-sm-left">

                                <div>
                                  <div class="badge badge-light-primary badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="with 7% growth @valintini_007  is on top 5k"><i class="cursor-pointer bx bx-check-shield"></i>
                                  </div>
                                  <div class="badge badge-light-warning badge-round mr-1 mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="last 55% growth @valintini_007  is on weedday"><i class="cursor-pointer bx bx-badge-check"></i>
                                  </div>
                                  <div class="badge badge-light-success badge-round mb-1" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="got premium profile here"><i class="cursor-pointer bx bx-award"></i>
                                  </div>
                                </div>
                                <a role="button" href="{{route('student-edit', $student->id)}}" class="btn btn-sm d-none d-sm-block float-right btn-light-primary">
                                  <i class="cursor-pointer bx bx-edit font-small-3 mr-50"></i><span>Edit</span>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h5 class="card-title">Basic details</h5>
                    <ul class="list-unstyled">
                      <li><i class="cursor-pointer bx bx-barcode-reader mb-1 mr-50"></i>Registration number: {{$student->reg_number}}</li>
                      <li><i class="cursor-pointer bx bx-map mb-1 mr-50"></i>Address: {{$student->address}}</li>
                      <li><i class="cursor-pointer bx bx-phone-call mb-1 mr-50"></i>({{$student->dialcode}}) {{$student->phone}} </li>
                      <li><i class="cursor-pointer bx bx-time mb-1 mr-50"></i>Birthdate: {{date('d-m-Y', strtotime($student->birthdate))}}</li>
                      <li><i class="cursor-pointer bx bx-globe mb-1 mr-50"></i>Country: {{$countries}}</li>
                      <li><i class="cursor-pointer bx bxs-location-plus mb-1 mr-50"></i>Birthcity: {{$student->birthcity}}</li>
                    </ul>
                    <div class="row">
                      <div class="col-6">
                        <h6><small class="text-muted">Is oriented?</small></h6>
                        <p>@if($student->is_oriented == true) Oui @else Non @endif</p>
                      </div>
                      <div class="col-6">
                        <h6><small class="text-muted">Is handicapped?</small></h6>
                        <p>@if($student->is_handicap == true) Oui @else Non @endif</p>
                      </div>

                      @if($student->is_oriented == true)
                        <div class="col-6">
                          <h6><small class="text-muted">Orientation support </small></h6>
                          <p>{{$student->oriented_percent}} %</p>
                        </div>
                      @endif

                      @if($student->is_handicap == true)
                        <div class="col-6">
                          <h6><small class="text-muted">Label of handicap</small></h6>
                          <p>{{$student->label_handicap}}</p>
                        </div>
                      @endif

                      @if($student->is_handicap == true)
                      <div class="col-12">
                        <h6><small class="text-muted">Description of handicap</small></h6>
                        <p>{{$student->desc_handicap}}</p>
                      </div>
                      @endif
                    </div>
                    <br/>
                    <h5 class="card-title">Kins</h5>
                    <div class="row">
                      <div class="col-6">
                        <h5><small class="text-muted text-bold-600">Mother</small></h5>
                        <p> Familyname: </p>
                        <p> Givenname: </p>
                        <p> Phone: </p>
                      </div>
                      <div class="col-6">
                        <h5><small class="text-muted text-bold-700">Father</small></h5>
                        <p> Familyname: </p>
                        <p> Givenname: </p>
                        <p> Givenname: </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <!-- user profile nav tabs profile ends -->
        </div>
        <div class="col-md-3">

            <!-- user profile right side content birthday card start -->
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="d-inline-flex">
                    <div class="avatar mr-50">
                      <img src="http://localhost/myschool/public/images/portrait/small/avatar-s-20.jpg" alt="avtar images" height="32" width="32">
                    </div>
                    <h6 class="mb-0 d-flex align-items-center"> Average reading</h6>
                  </div>
                  <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                  <div class="user-profile-birthday-image text-center p-2">
                    <img class="img-fluid" src="http://localhost/myschool/public/images/profile/pages/birthday.png" alt="image">
                  </div>
                  <div class="user-profile-birthday-footer text-center text-lg-left">
                    <p class="mb-0"><small>Leave her a message with your best wishes on her profile page!</small></p>
                    <a class="btn btn-sm btn-light-primary mt-50" href="JavaScript:void(0);">Send Wish</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- user profile right side content birthday card ends -->
            <!-- user profile right side content related groups start -->
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <h5 class="card-title mb-1">School fees
                    <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
                  </h5>
                  <div class="media d-flex align-items-center mb-1">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-30.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Play Guitar</small></h6><small class="text-muted">2.8k
                        members (7 joined)</small>
                    </div>
                    <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                  </div>
                  <div class="media d-flex align-items-center mb-1">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-31.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Generic memes</small></h6><small class="text-muted">9k
                        members (7 joined)</small>
                    </div>
                    <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                  </div>
                  <div class="media d-flex align-items-center">
                    <a href="JavaScript:void(0);">
                      <img src="http://localhost/myschool/public/images/banner/banner-32.jpg" class="rounded" alt="group image" height="64" width="64">
                    </a>
                    <div class="media-body ml-1">
                      <h6 class="media-heading mb-0"><small>Cricket fan club</small></h6><small class="text-muted">7.6k
                        members</small>
                    </div>
                    <i class="cursor-pointer bx bx-lock text-muted d-flex align-items-center"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- user profile right side content related groups ends -->

        </div>
      </div>
    </section>
    <!-- // Basic multiple Column Form section end -->

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

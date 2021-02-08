@extends('layouts.contentLayoutMaster')
{{-- title --}}



@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Détails écoles')

  @endif

@else



  @section('title','School View')



@endif

{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page-styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-user-profile.css')}}">
@endsection
@section('content')

@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))
    <!-- page user profile start -->
    <section class="page-user-profile">
      <div class="row">
        <div class="col-12">
          <!-- user profile heading section start -->
          <div class="card">
            <div class="card-content">
              <div class="user-profile-images">
                <!-- user timeline image -->
                <img src="{{asset('images/profile/post-media/profile-banner.jpg')}}"
                  class="img-fluid rounded-top user-timeline-image" alt="user timeline image">
                <!-- user profile image -->
                <img src="@if($schools->photo != NULL) {{$schools->photo}} @else {{asset('images/schools/schoolphoto.jpg')}} @endif" class="user-profile-image rounded"
                  alt="user profile image" height="140" width="140">
              </div>
              <div class="user-profile-text" style="padding: 5px;">
                <h4 class="mb-0 text-bold-500 profile-text-color">{{$schools->name}}</h4>
                <small>Crée par {{$schools->funder}} le {{$schools->building_date}}</small>
              </div>
              <!-- user profile nav tabs start -->
              <div class="card-body px-0">
                <ul
                  class="nav user-profile-nav justify-content-center justify-content-md-start nav-tabs border-bottom-0 mb-0"
                  role="tablist">
                  <li class="nav-item pb-0">
                    <a class=" nav-link d-flex px-1 active" id="feed-tab" data-toggle="tab" href="#feed"
                      aria-controls="feed" role="tab" aria-selected="true"><i class="bx bx-home"></i><span
                        class="d-none d-md-block">Général</span></a>
                  </li>
                  <li class="nav-item pb-0">
                    <a class="nav-link d-flex px-1" id="friends-tab" data-toggle="tab" href="#friends"
                      aria-controls="friends" role="tab" aria-selected="false"><i class="bx bx-message-alt"></i><span
                        class="d-none d-md-block">Utilisateurs</span></a>
                  </li>
                </ul>
              </div>
              <!-- user profile nav tabs ends -->
            </div>
          </div>
          <!-- user profile heading section ends -->

          <!-- user profile content section start -->
          <div class="row">
            <!-- user profile nav tabs content start -->
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active" id="feed" aria-labelledby="feed-tab" role="tabpanel">
                  <!-- user profile nav tabs feed start -->
                  <div class="row">
                    <!-- user profile nav tabs feed left section start -->
                    <div class="col-lg-4">
                      <!-- user profile nav tabs feed left section info card start -->
                      <div class="card">
                        <div class="card-content">
                          <div class="card-body">
                            <h5 class="card-title mb-1">Info
                              <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                            </h5>
                            <ul class="list-unstyled mb-0">
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-phone mr-50 cursor-pointer"></i><a href="JavaScript:void(0);">({{$schools->dialcode}})</a> &nbsp; <span> {{$schools->phone}} </span>
                              </li>
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-globe mr-50 cursor-pointer"></i> <span>{{$countries}}</span>
                              </li>
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-door-open mr-50 cursor-pointer"></i> <span>{{$schools->nb_room}}
                                  <a href="JavaScript:void(0);">&nbsp; Salle de classe </a></span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bx-calendar mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Système annuel:&nbsp;</a>
                                    @if($schools->type_monthyear == 0) Trimestre @else Semestre @endif
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bxs-school mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Type d'école:&nbsp;</a>
                                      {{$schools->type}}
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bxs-city mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Ville:&nbsp;</a>
                                      {{$schools->area}}
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bx-area mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Adresse:&nbsp;</a>
                                      {{$schools->address}}
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bxs-calculator mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Quotient de calcul:&nbsp;</a>
                                      {{$schools->quotient}}
                                  </span>
                              </li>
                              <br>
                                <p>
                                 <a href="{{route('schools-edit', $schools->id)}}" role="button" class="btn btn-primary">Modifier Ecole</a>
                                </p>

                               <div class="btn-group-vertical" role="group" aria-label="Button group">
                                 <a href="{{route('schoolsyear-view', $schools->id)}}" role="button" class="btn btn-outline-warning">Modifier Année scolaire</a>
                                 @if($monthyear != NULL)
                                  <a href="{{route('monthyear-edit', $schools->id)}}" role="button" class="btn btn-outline-warning">Modifier @if($schools->type_monthyear == false)Trimestre @else Semestre @endif</a>
                                 @endif
                                </div>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!-- user profile nav tabs feed left section info card ends -->

                    </div>
                    <!-- user profile nav tabs feed left section ends -->

                    <!-- user profile nav tabs feed middle section start -->
                    <div class="col-lg-8">

                      <!-- user profile nav tabs feed middle section user-3 card starts -->
                      <div class="card">
                        <div class="card-content">
                          <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                              <img src="{{asset('images/portrait/small/avatar-s-14.jpg')}}" alt="avtar images"
                                width="32" height="32">
                              <span class="avatar-status-online"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                              <h6 class="mb-0 text-bold-500">Anna Mull</h6>
                              <p class="text-muted"><small>7 hours ago</small></p>
                            </div>
                            <i class='cursor-pointer bx bx-dots-vertical-rounded float-right'></i>
                          </div>
                          <div class="card-body py-0">
                            <p>To avoid winding up with a large bundle, it’s good to get ahead of the problem and use "Code
                              Splitting 🕹".</p>
                            <img src="{{asset('images/profile/post-media/2.jpg')}}" alt="user image"
                              class="img-fluid">
                          </div>
                          <div class="card-footer d-flex justify-content-between pt-1">
                            <div class="d-flex align-items-center">
                              <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                              <p class="mb-0 ml-25">77</p>
                              <!-- user profile likes avatar start -->
                              <div class="d-none d-sm-block">
                                <ul class="list-unstyled users-list m-0 d-flex align-items-center ml-1">
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Lilian Nenez" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Alberto Glotzbach" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-12.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Alberto Glotzbach" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-13.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li class="d-inline-block pl-50">
                                    <p class="text-muted mb-0 font-small-3">+10 more</p>
                                  </li>
                                </ul>
                              </div>
                              <!-- user profile likes avatar ends -->
                            </div>
                            <div class="d-flex align-items-center">
                              <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                              <span class="ml-25">12</span>
                              <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                              <span class="ml-25">12</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- user profile nav tabs feed middle section user-3 card ends -->

                    </div>
                    <!-- user profile nav tabs feed middle section ends -->
                  </div>
                  <!-- user profile nav tabs feed ends -->
                </div>
                <div class="tab-pane" id="friends" aria-labelledby="friends-tab" role="tabpanel">
                  <!-- user profile nav tabs friends start -->
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <h5>Liste des utilisateurs de l'école</h5>
                        <div class="row">
                          <div class="col-6">
                            <ul class="list-unstyled mb-0">

                              @php $i = 1; @endphp

                              @foreach ($schooluser as $schoolusers)

                                @if($i % 2 != 0)

                                  <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                      <div class="avatar mr-1">
                                        <img src="@if($schoolusers->photo == NULL && $schoolusers->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($schoolusers->photo == NULL && $schoolusers->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{$schoolusers->photo}} @endif" alt="avtar images"
                                          width="32" height="32">
                                          @if($schoolusers->state == true)
                                            <span class="avatar-status-online"></span>
                                          @else
                                            <span class="avatar-status-busy"></span>
                                          @endif
                                      </div>
                                    </a>
                                    <div class="media-body">
                                      <h6 class="media-heading mb-0"><a href="javaScript:void(0);">{{$schoolusers->familyname}} {{$schoolusers->givenname}}</a></h6>
                                      <small class="text-muted">{{$schoolusers->job}}</small>
                                    </div>
                                  </li>

                                @endif

                                @php $i++; @endphp

                              @endforeach

                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="list-unstyled mb-0">

                              @php $i = 1; @endphp

                              @foreach ($schooluser as $schoolusers)

                                @if($i % 2 == 0)

                                  <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                      <div class="avatar mr-1">
                                        <img src="@if($schoolusers->photo == NULL && $schoolusers->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($schoolusers->photo == NULL && $schoolusers->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{$schoolusers->photo}} @endif" alt="avtar images"
                                          width="32" height="32">
                                          @if($schoolusers->state == true)
                                            <span class="avatar-status-online"></span>
                                          @else
                                            <span class="avatar-status-busy"></span>
                                          @endif
                                      </div>
                                    </a>
                                    <div class="media-body">
                                      <h6 class="media-heading mb-0"><a href="javaScript:void(0);">{{$schoolusers->familyname}} {{$schoolusers->givenname}}</a></h6>
                                      <small class="text-muted">{{$schoolusers->job}}</small>
                                    </div>
                                  </li>

                                @endif

                                @php $i++; @endphp

                              @endforeach

                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- user profile nav tabs friends ends -->
                </div>
              </div>
            </div>
            <!-- user profile nav tabs content ends -->
            <!-- user profile right side content start -->
            <div class="col-lg-3">

              <!-- user profile right side content related groups start -->
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h5 class="card-title mb-1">Evènements à venir
                      <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
                    </h5>
                    <div class="media d-flex align-items-center mb-1">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-30.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
                      </a>
                      <div class="media-body ml-1">
                        <h6 class="media-heading mb-0"><small>Play Guitar</small></h6><small class="text-muted">2.8k
                          members (7 joined)</small>
                      </div>
                      <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                    </div>
                    <div class="media d-flex align-items-center mb-1">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-31.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
                      </a>
                      <div class="media-body ml-1">
                        <h6 class="media-heading mb-0"><small>Generic memes</small></h6><small class="text-muted">9k
                          members (7 joined)</small>
                      </div>
                      <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                    </div>
                    <div class="media d-flex align-items-center">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-32.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
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
            <!-- user profile right side content ends -->
          </div>
          <!-- user profile content section start -->
        </div>
      </div>
    </section>
    <!-- page user profile ends -->
  @endif

@else

    <!-- page user profile start -->
    <section class="page-user-profile">
      <div class="row">
        <div class="col-12">
          <!-- user profile heading section start -->
          <div class="card">
            <div class="card-content">
              <div class="user-profile-images">
                <!-- user timeline image -->
                <img src="{{asset('images/profile/post-media/profile-banner.jpg')}}"
                  class="img-fluid rounded-top user-timeline-image" alt="user timeline image">
                <!-- user profile image -->
                <img src="{{$schools->photo}}" class="user-profile-image rounded"
                  alt="user profile image" height="140" width="140">
              </div>
              <div class="user-profile-text" style="padding: 5px;">
                <h4 class="mb-0 text-bold-500 profile-text-color">{{$schools->name}}</h4>
                <small>created by {{$schools->funder}} at {{$schools->building_date}}</small>
              </div>
              <!-- user profile nav tabs start -->
              <div class="card-body px-0">
                <ul
                  class="nav user-profile-nav justify-content-center justify-content-md-start nav-tabs border-bottom-0 mb-0"
                  role="tablist">
                  <li class="nav-item pb-0">
                    <a class=" nav-link d-flex px-1 active" id="feed-tab" data-toggle="tab" href="#feed"
                      aria-controls="feed" role="tab" aria-selected="true"><i class="bx bx-home"></i><span
                        class="d-none d-md-block">General</span></a>
                  </li>
                  <li class="nav-item pb-0">
                    <a class="nav-link d-flex px-1" id="friends-tab" data-toggle="tab" href="#friends"
                      aria-controls="friends" role="tab" aria-selected="false"><i class="bx bx-message-alt"></i><span
                        class="d-none d-md-block">Users</span></a>
                  </li>
                </ul>
              </div>
              <!-- user profile nav tabs ends -->
            </div>
          </div>
          <!-- user profile heading section ends -->

          <!-- user profile content section start -->
          <div class="row">
            <!-- user profile nav tabs content start -->
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active" id="feed" aria-labelledby="feed-tab" role="tabpanel">
                  <!-- user profile nav tabs feed start -->
                  <div class="row">
                    <!-- user profile nav tabs feed left section start -->
                    <div class="col-lg-4">
                      <!-- user profile nav tabs feed left section info card start -->
                      <div class="card">
                        <div class="card-content">
                          <div class="card-body">
                            <h5 class="card-title mb-1">Infos
                              <i class="cursor-pointer bx bx-dots-vertical-rounded float-right"></i>
                            </h5>
                            <ul class="list-unstyled mb-0">
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-phone mr-50 cursor-pointer"></i><a href="JavaScript:void(0);">({{$schools->dialcode}})</a> &nbsp; <span> {{$schools->phone}} </span>
                              </li>
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-globe mr-50 cursor-pointer"></i> <span>{{$countries}}</span>
                              </li>
                              <li class="d-flex align-items-center mb-25">
                                <i class="bx bx-door-open mr-50 cursor-pointer"></i> <span>{{$schools->nb_room}}
                                  <a href="JavaScript:void(0);">&nbsp; Room </a></span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bx-calendar mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Annual system:&nbsp;</a>
                                    @if($schools->type_monthyear == 0) Trimestre @else Semestre @endif
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bxs-school mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">School's type:&nbsp;</a>
                                      {{$schools->type}}
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bxs-city mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Town:&nbsp;</a>
                                      {{$schools->area}}
                                  </span>
                              </li>
                              <li class="d-flex align-items-center">
                                <i class="bx bx-area mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Address:&nbsp;</a>
                                      {{$schools->address}}
                                  </span>
                              </li>

                              <li class="d-flex align-items-center">
                                <i class="bx bxs-calculator mr-50 cursor-pointer"></i> <span><a
                                    href="JavaScript:void(0);">Math quotient:&nbsp;</a>
                                      {{$schools->quotient}}
                                  </span>
                              </li>
                              <br>
                                 <div class="btn-group-vertical" role="group" aria-label="Button group">
                                  <a href="{{route('schoolsyear-view', $schools->id)}}" role="button" class="btn btn-outline-warning">Edit school year</a>
                                  @if($monthyear != NULL)
                                    <a href="{{route('monthyear-edit', $schools->id)}}" role="button" class="btn btn-outline-warning">Edit @if($schools->type_monthyear == false)Trimester @else Semester @endif</a>
                                  @endif
                                </div>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!-- user profile nav tabs feed left section info card ends -->

                    </div>
                    <!-- user profile nav tabs feed left section ends -->

                    <!-- user profile nav tabs feed middle section start -->
                    <div class="col-lg-8">

                      <!-- user profile nav tabs feed middle section user-3 card starts -->
                      <div class="card">
                        <div class="card-content">
                          <div class="card-header user-profile-header">
                            <div class="avatar mr-50 align-top">
                              <img src="{{asset('images/portrait/small/avatar-s-14.jpg')}}" alt="avtar images"
                                width="32" height="32">
                              <span class="avatar-status-online"></span>
                            </div>
                            <div class="d-inline-block mt-25">
                              <h6 class="mb-0 text-bold-500">Anna Mull</h6>
                              <p class="text-muted"><small>7 hours ago</small></p>
                            </div>
                            <i class='cursor-pointer bx bx-dots-vertical-rounded float-right'></i>
                          </div>
                          <div class="card-body py-0">
                            <p>To avoid winding up with a large bundle, it’s good to get ahead of the problem and use "Code
                              Splitting 🕹".</p>
                            <img src="{{asset('images/profile/post-media/2.jpg')}}" alt="user image"
                              class="img-fluid">
                          </div>
                          <div class="card-footer d-flex justify-content-between pt-1">
                            <div class="d-flex align-items-center">
                              <i class="cursor-pointer bx bx-heart user-profile-like font-medium-4"></i>
                              <p class="mb-0 ml-25">77</p>
                              <!-- user profile likes avatar start -->
                              <div class="d-none d-sm-block">
                                <ul class="list-unstyled users-list m-0 d-flex align-items-center ml-1">
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Lilian Nenez" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Alberto Glotzbach" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-12.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                    title="Alberto Glotzbach" class="avatar pull-up">
                                    <img src="{{asset('images/portrait/small/avatar-s-13.jpg')}}" alt="Avatar"
                                      height="30" width="30">
                                  </li>
                                  <li class="d-inline-block pl-50">
                                    <p class="text-muted mb-0 font-small-3">+10 more</p>
                                  </li>
                                </ul>
                              </div>
                              <!-- user profile likes avatar ends -->
                            </div>
                            <div class="d-flex align-items-center">
                              <i class="cursor-pointer bx bx-comment-dots font-medium-4"></i>
                              <span class="ml-25">12</span>
                              <i class="cursor-pointer bx bx-share-alt font-medium-4 ml-1"></i>
                              <span class="ml-25">12</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- user profile nav tabs feed middle section user-3 card ends -->

                    </div>
                    <!-- user profile nav tabs feed middle section ends -->
                  </div>
                  <!-- user profile nav tabs feed ends -->
                </div>
                <div class="tab-pane" id="friends" aria-labelledby="friends-tab" role="tabpanel">
                  <!-- user profile nav tabs friends start -->
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <h5>List of all school's users</h5>
                        <div class="row">
                          <div class="col-6">
                            <ul class="list-unstyled mb-0">

                              @php $i = 1; @endphp

                              @foreach ($schooluser as $schoolusers)

                                @if($i % 2 != 0)

                                  <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                      <div class="avatar mr-1">
                                        <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avtar images"
                                          width="32" height="32">
                                          @if($schoolusers->state == true)
                                            <span class="avatar-status-online"></span>
                                          @else
                                            <span class="avatar-status-busy"></span>
                                          @endif
                                      </div>
                                    </a>
                                    <div class="media-body">
                                      <h6 class="media-heading mb-0"><a href="javaScript:void(0);">{{$schoolusers->familyname}} {{$schoolusers->givenname}}</a></h6>
                                      <small class="text-muted">{{$schoolusers->job}}</small>
                                    </div>
                                  </li>

                                @endif

                                @php $i++; @endphp

                              @endforeach

                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="list-unstyled mb-0">

                              @php $i = 1; @endphp

                              @foreach ($schooluser as $schoolusers)

                                @if($i % 2 == 0)

                                  <li class="media my-50">
                                    <a href="JavaScript:void(0);">
                                      <div class="avatar mr-1">
                                        <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avtar images"
                                          width="32" height="32">
                                          @if($schoolusers->state == true)
                                            <span class="avatar-status-online"></span>
                                          @else
                                            <span class="avatar-status-busy"></span>
                                          @endif
                                      </div>
                                    </a>
                                    <div class="media-body">
                                      <h6 class="media-heading mb-0"><a href="javaScript:void(0);">{{$schoolusers->familyname}} {{$schoolusers->givenname}}</a></h6>
                                      <small class="text-muted">{{$schoolusers->job}}</small>
                                    </div>
                                  </li>

                                @endif

                                @php $i++; @endphp

                              @endforeach

                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- user profile nav tabs friends ends -->
                </div>
              </div>
            </div>
            <!-- user profile nav tabs content ends -->
            <!-- user profile right side content start -->
            <div class="col-lg-3">

              <!-- user profile right side content related groups start -->
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h5 class="card-title mb-1">Featured Events
                      <i class="cursor-pointer bx bx-dots-vertical-rounded align-top float-right"></i>
                    </h5>
                    <div class="media d-flex align-items-center mb-1">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-30.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
                      </a>
                      <div class="media-body ml-1">
                        <h6 class="media-heading mb-0"><small>Play Guitar</small></h6><small class="text-muted">2.8k
                          members (7 joined)</small>
                      </div>
                      <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                    </div>
                    <div class="media d-flex align-items-center mb-1">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-31.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
                      </a>
                      <div class="media-body ml-1">
                        <h6 class="media-heading mb-0"><small>Generic memes</small></h6><small class="text-muted">9k
                          members (7 joined)</small>
                      </div>
                      <i class="cursor-pointer bx bx-plus-circle text-primary d-flex align-items-center "></i>
                    </div>
                    <div class="media d-flex align-items-center">
                      <a href="JavaScript:void(0);">
                        <img src="{{asset('images/banner/banner-32.jpg')}}" class="rounded" alt="group image"
                          height="64" width="64" />
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
            <!-- user profile right side content ends -->
          </div>
          <!-- user profile content section start -->
        </div>
      </div>
    </section>
    <!-- page user profile ends -->

@endif


@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-user-profile.js')}}"></script>
@endsection

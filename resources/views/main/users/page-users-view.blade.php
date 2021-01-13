@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users View')
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection
@section('content')

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

  {{-- FRENCH VERSION --}}

  <!-- users view start -->
  <section class="users-view">
    <!-- users view media object start -->
    <div class="row">
      <div class="col-12 col-sm-7">
        <div class="media mb-2">
          <a class="mr-1" href="#">
            <img src="@if($user->photo == NULL && $user->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($user->photo == NULL && $user->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{$user->photo}} @endif" alt="users view avatar"
              class="users-avatar-shadow rounded-circle" height="64" width="64">
          </a>
          <div class="media-body pt-25">
            <h4 class="media-heading"><span>{{$user->familyname}} </span><span
                class="text-muted font-medium-1"> @</span><span
                >{{$user->givenname}} </span></h4>

            @if($writeby != NULL)
              <span>Crée le :</span>
              <span>{{date('d-M-Y', strtotime($user->created_at))}} </span>
              <span>Par <span class="text-primary text-bold-700 text-uppercase">{{$writeby->familyname}} {{$writeby->givenname}}</span> </span> <br>
            @endif
            @if($editby != NULL)
              <span>modifié le :</span>
              <span>{{date('d-M-Y', strtotime($user->updated_at))}} </span>
              <span>Par <span class="text-primary text-bold-700 text-uppercase">{{$editby->familyname}} {{$editby->givenname}}</span> </span>
            @endif
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
        <a href="{{route('users-edit-form', $user->id)}}" class="btn btn-sm btn-primary">Modifier</a>
      </div>
    </div>

      {{--
      <!-- users view media object ends -->
      <!-- users view card data start -->
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-4">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Registered:</td>
                      <td>01/01/2019</td>
                    </tr>
                    <tr>
                      <td>Latest Activity:</td>
                      <td class="users-view-latest-activity">30/04/2019</td>
                    </tr>
                    <tr>
                      <td>Verified:</td>
                      <td class="users-view-verified">Yes</td>
                    </tr>
                    <tr>
                      <td>Role:</td>
                      <td class="users-view-role">Staff</td>
                    </tr>
                    <tr>
                      <td>Status:</td>
                      <td><span class="badge badge-light-success users-view-status">Active</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12 col-md-8">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>Module Permission</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Create</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <td>Articles</td>
                        <td>No</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <td>Staff</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- users view card data ends -->
      <!-- users view card details start -->
    --}}

    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Posts: <span class="font-large-1 align-middle">125</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Following: <span class="font-large-1 align-middle">256</span></h6>
            </div>
          </div>
          <div class="col-12">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td>Nom:</td>
                  <td>{{$user->familyname}}</td>
                </tr>
                <tr>
                  <td>Prénoms:</td>
                  <td>{{$user->givenname}}</td>
                </tr>
                <tr>
                  <td>E-mail:</td>
                  <td>{{$user->email}}</td>
                </tr>
                <tr>
                  <td>Sexe :</td>
                  <td>@if ($user->gender == false) Masculin @else Féminin @endif</td>
                </tr>

              </tbody>
            </table>
            <h5><i class="bx bx-info-circle"></i>Info Personel</h5>
            <table class="table table-borderless mb-0">
              <tbody>
                <tr>
                  <td>Date de naissance:</td>
                  <td><span data-toggle="tooltip" data-placement="right" title="{{$age}} ans">{{$user->birthdate}}<span></td>
                </tr>
                <tr>
                  <td>Pays:</td>
                  <td>{{$country}}</td>
                </tr>
                <tr>
                  <td>Adresse:</td>
                  <td>{{$user->address}}</td>
                </tr>
                <tr>
                  <td>Contact:</td>
                  <td>({{$user->dialcode}})   {{$user->phone}}</td>
                </tr>
                <tr>
                  <td>Profession:</td>
                  <td>{{$user->job}}</td>
                </tr>
              </tbody>
            </table>

            <h5><i class="bx bx-plus"></i> Extra</h5>
            <table class="table table-borderless mb-0">
              <tbody>
                <tr>
                  <td>Etat:</td>
                  <td>
                    @if ($user->state == true)
                    <span class="badge badge-pill badge-glow badge-success">Connecté</span>
                    @else
                    <span class="badge badge-pill badge-glow badge-danger">Déconnecté</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Statut:</td>
                  @if ($superuser->root == true)
                  <td>
                    @if ($user->status == true)
                    <span class="badge badge-pill badge-glow badge-success">Actif</span>
                    @else
                    <span class="badge badge-pill badge-glow badge-danger">Inactif</span>
                    @endif
                  </td>
                  @endif
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- users view card details ends -->

  </section>
  <!-- users view ends -->

  {{-- FRENCH VERSION --}}

@else

  {{-- ENGLISH VERSION --}}

  <!-- users view start -->
  <section class="users-view">
    <!-- users view media object start -->
    <div class="row">
      <div class="col-12 col-sm-7">
        <div class="media mb-2">
          <a class="mr-1" href="#">
            <img src="{{$user->photo}}" alt="users view avatar"
              class="users-avatar-shadow rounded-circle" height="64" width="64">
          </a>
          <div class="media-body pt-25">
            <h4 class="media-heading"><span>{{$user->familyname}} </span><span
                class="text-muted font-medium-1"> @</span><span
                >{{$user->givenname}} </span></h4>
            <span>Starting at : {{date('Y-M-d', strtotime($user->created_at))}} </span>
            <span>by <span class="text-primary text-bold-700 text-uppercase">{{$writeby->familyname}} {{$writeby->givenname}}</span></span>
             <br>
            <span>Edit at :</span>
            <span>{{date('d-M-Y', strtotime($user->updated_at))}} </span>
            <span>by <span class="text-primary text-bold-700 text-uppercase">{{$editby->familyname}} {{$editby->givenname}}</span> </span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">

        <a href="{{route('users-edit-form', $user->id)}}" class="btn btn-sm btn-primary">Edit</a>
      </div>
    </div>

      {{--
      <!-- users view media object ends -->
      <!-- users view card data start -->
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-4">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Registered:</td>
                      <td>01/01/2019</td>
                    </tr>
                    <tr>
                      <td>Latest Activity:</td>
                      <td class="users-view-latest-activity">30/04/2019</td>
                    </tr>
                    <tr>
                      <td>Verified:</td>
                      <td class="users-view-verified">Yes</td>
                    </tr>
                    <tr>
                      <td>Role:</td>
                      <td class="users-view-role">Staff</td>
                    </tr>
                    <tr>
                      <td>Status:</td>
                      <td><span class="badge badge-light-success users-view-status">Active</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12 col-md-8">
                <div class="table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th>Module Permission</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Create</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <td>Articles</td>
                        <td>No</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <td>Staff</td>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- users view card data ends -->
      <!-- users view card details start -->
    --}}

    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Posts: <span class="font-large-1 align-middle">125</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Following: <span class="font-large-1 align-middle">256</span></h6>
            </div>
          </div>
          <div class="col-12">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td>Familyname:</td>
                  <td>{{$user->familyname}}</td>
                </tr>
                <tr>
                  <td>Givenname:</td>
                  <td>{{$user->givenname}}</td>
                </tr>
                <tr>
                  <td>E-mail:</td>
                  <td>{{$user->email}}</td>
                </tr>
                <tr>
                  <td>Gender :</td>
                  <td>@if ($user->gender == false) Masculin @else Féminin @endif</td>
                </tr>

              </tbody>
            </table>
            <h5><i class="bx bx-info-circle"></i> Personal Info</h5>
            <table class="table table-borderless mb-0">
              <tbody>
                <tr>
                  <td>Birthdate:</td>
                  <td><span data-toggle="tooltip" data-placement="right" title="{{$age}} ans">{{$user->birthdate}}<span></td>
                </tr>
                <tr>
                  <td>Country:</td>
                  <td>{{ $country }}</td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td>{{$user->address}}</td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td>({{$user->dialcode}})   {{$user->phone}}</td>
                </tr>
                <tr>
                  <td>Job:</td>
                  <td>{{$user->job}}</td>
                </tr>
              </tbody>
            </table>

            <h5><i class="bx bx-plus"></i> Extra</h5>
            <table class="table table-borderless mb-0">
              <tbody>
                <tr>
                  <td>State:</td>
                  <td>
                    @if ($user->state == true)
                    <span class="badge badge-pill badge-glow badge-success">Logged in</span>
                    @else
                    <span class="badge badge-pill badge-glow badge-danger">Logged out</span>
                    @endif
                  </td>
                </tr>
                <tr>

                  @if ($superuser->root == true)
                  <td>Statut:</td>
                  <td>
                    @if ($user->status == true)
                    <span class="badge badge-pill badge-glow badge-success">Active</span>
                    @else
                    <span class="badge badge-pill badge-glow badge-danger">Inactive</span>
                    @endif
                  </td>
                  @endif
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- users view card details ends -->

  </section>
  <!-- users view ends -->

  {{-- ENGLISH VERSION --}}

@endif

@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>
@endsection

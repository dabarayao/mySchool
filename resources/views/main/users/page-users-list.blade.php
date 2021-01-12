@extends('layouts.contentLayoutMaster')
{{-- page title --}}
  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

    @section('title','Listes des utilisateurs')

  @else

    @section('title','Users List')

  @endif

{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">

@endsection
@section('content')
<!-- users list start -->
<section class="users-list-wrapper">

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

      {{-- FRENCH VERSION --}}


      <!-- header breadcrumbs start -->
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h5 class="content-header-title float-left pr-1 mb-0">Utilisateurs</h5>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                                          <li class="breadcrumb-item ">
                                  <a href="#"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                <li class="breadcrumb-item active">
                                Listes des utilisateurs
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header breadcrumbs end -->





      <p>
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="#user_add_modal"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></a>
      </p>

      <!-- Zero configuration table -->
      <section id="basic-datatable">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Zero configuration</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <p class="card-text">DataTables has most features enabled by default, so all you need to do to
                                  use it with your own tables is to call the construction function: $().DataTable();.</p>
                              <div class="table-responsive">
                                  <table class="table zero-configuration">
                                      <thead>
                                          <tr>
                                              <th>photo</th>
                                              <th>nom</th>
                                              <th>prénoms</th>
                                              <th>email</th>
                                              <th>etat</th>
                                              {{-- Special display for root users --}}
                                              @if($superuser->root == true)

                                              <th>status</th>

                                              @endif

                                              <th>actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($user as $users)
                                                {{-- Special display for root users --}}
                                                @if($superuser->root == false && $users->root == true)

                                                    @php

                                                    continue;

                                                    @endphp

                                                @endif
                                          <tr>
                                            <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                  @if($users->photo == NULL && $users->gender == false)
                                                    <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                  @elseif($users->photo == NULL && $users->gender == true)
                                                    <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                  @else
                                                    <img src="{{$users->photo}}" alt="avtar img holder">

                                                  @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($users->email_verified_at != NULL)
                                                <span class="text-primary">{{$users->familyname}}</span>
                                                @else
                                                <span class="text-danger" id="not-verified" data-toggle="tooltip" data-placement="bottom" title="l'utilsateur n'a pas encore vérifié son email">{{$users->familyname}}</span>
                                                @endif
                                            </td>
                                            <td>{{$users->givenname}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>
                                                @if ($users->state == true)
                                                <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Connecté"><i class="fa fa-toggle-on fa-2x"></i></span>
                                                @else
                                                <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Deconnecté"><i class="fa fa-toggle-off fa-2x"></i></span>
                                                @endif
                                            </td>
                                            {{-- Special display for root users --}}
                                            @if($superuser->status == true)

                                            <td>
                                                @if ($users->status == true)
                                                  <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Actif"><i class="fa fa-check fa-2x"></i></span>
                                                @else
                                                  <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Inactif"><i class="fa fa-close fa-2x"></i></span>
                                                @endif
                                            </td>

                                            @endif

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('users-edit-form', $users->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="bottom" title="modifier" class="bx bx-edit"></i></a>
                                                    <a href="{{route('users-view', $users->id)}}" role="button" class="text-primary" title="voir"><i class='bx bx-show-alt'></i></a>
                                                    <a href="#" role="button" class="text-danger" title="supprimer"><i class="bx bx-trash"></i></a>
                                                </div>
                                            </td>
                                          </tr>
                                        @endforeach



                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Photo</th>
                                              <th>Nom</th>
                                              <th>Prénoms</th>
                                              <th>Email</th>
                                              <th>Etat</th>
                                              {{-- Special display for root users --}}
                                              @if($superuser->root == true)

                                              <th>Status</th>

                                              @endif

                                              <th>Actions</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--/ Zero configuration table -->

      <!-- all modal start -->

          <!--user add modal -->
              <div class="modal modal-primary fade text-left w-100" id="user_add_modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <form class="form" id="user-add-form" method="POST" action="{{route('users-add-from')}}" enctype="multipart/form-data" @submit="confCheck">
                  @csrf

                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel16"><i class="bx bx-add-to-queue"></i> Ajouter un utilsateur</h4>
                        <button type="button" class="close bg-danger" style="color: white;" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">

                        @include('main.users.users-add-form')

                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-light-secondary" >
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Réinitialiser</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" >
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Envoyer</span>
                        </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>

      <!-- all modal end -->


      {{-- FRENCH VERSION --}}
  @else
      {{-- ENGLISH VERSION --}}

      <!-- header breadcrumbs -->
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h5 class="content-header-title float-left pr-1 mb-0">Users</h5>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                                          <li class="breadcrumb-item ">
                                  <a href="#"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                <li class="breadcrumb-item active">
                                List of users
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>





      <p>
        <a role="button" class="btn round btn-outline-primary"  data-toggle="modal" data-target="#user_add_modal"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Add a new </span></a>
      </p>



      <!-- Zero configuration table -->
      <section id="basic-datatable">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Zero configuration</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <p class="card-text">DataTables has most features enabled by default, so all you need to do to
                                  use it with your own tables is to call the construction function: $().DataTable();.</p>
                              <div class="table-responsive">
                                  <table class="table zero-configuration">
                                      <thead>
                                          <tr>
                                              <th>picture</th>
                                              <th>familyname</th>
                                              <th>givenname</th>
                                              <th>email</th>
                                              <th>state</th>
                                              {{-- Special display for root users --}}
                                              @if($superuser->root == true)

                                              <th>status</th>

                                              @endif

                                              <th>actions</th>
                                          </tr>
                                      </thead>
                                          <tbody>
                                            @foreach ($user as $users)
                                            {{-- Special display for root users --}}
                                            @if($superuser->root == false && $users->root == true)

                                                @php

                                                continue;

                                                @endphp

                                            @endif


                                              <tr>
                                              <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                  @if($users->photo == NULL && $users->gender == false)
                                                    <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                  @elseif($users->photo == NULL && $users->gender == true)
                                                    <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                  @else
                                                    <img src="{{$users->photo}}" alt="avtar img holder">

                                                  @endif

                                                </div>
                                              </td>
                                              <td>
                                                @if($users->email_verified_at != NULL)
                                                  <span class="text-primary">{{$users->familyname}}</span>
                                                @else
                                                  <span class="text-danger" id="not-verified" data-toggle="tooltip" data-placement="bottom" title="the user has not yet verified his email">{{$users->familyname}}</span>
                                                @endif
                                              </a>
                                              </td>
                                              <td>{{$users->givenname}}</td>
                                              <td>{{$users->email}}</td>
                                              <td>
                                                  @if ($users->state == true)
                                                    <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Logged in"><i class="fa fa-toggle-on fa-2x"></i></span>
                                                  @else
                                                    <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Logged out"><i class="fa fa-toggle-off fa-2x"></i></span>
                                                  @endif
                                              </td>
                                                {{-- Special display for root users --}}
                                                @if($superuser->root == true)

                                                <td>
                                                  @if ($users->root == true)
                                                    <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Active"><i class="fa fa-check fa-2x"></i></span>
                                                  @else
                                                    <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Inactive"><i class="fa fa-close fa-2x"></i></span>
                                                  @endif
                                                </td>

                                                @endif



                                              <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{asset('page-users-edit')}}" role="button" class="text-secondary" title="edit"><i class="bx bx-edit"></i></a>
                                                    <a href="{{asset('page-users-edit')}}" role="button" class="text-primary" title="show"><i class='bx bx-show-alt'></i></a>
                                                    <a href="{{asset('page-users-edit')}}" role="button" class="text-danger" title="delete"><i class="bx bx-trash"></i></a>
                                                </div>
                                              </td>
                                              </tr>
                                            @endforeach



                                          </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Picture</th>
                                              <th>Familyname</th>
                                              <th>Givenname</th>
                                              <th>Email</th>
                                              <th>State</th>
                                              {{-- Special display for root users --}}
                                              @if($superuser->root == true)

                                              <th>Status</th>

                                              @endif

                                              <th>Actions</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--/ Zero configuration table -->

      <!-- all modal start -->

          <!--user add modal -->
              <div class="modal modal-primary fade text-left w-100" id="user_add_modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <form class="form" id="user-add-form" method="POST" action="{{route('users-add-from')}}" enctype="multipart/form-data" @submit="confCheck">
                  @csrf

                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel16"><i class="bx bx-add-to-queue"></i> Ajouter un utilsateur</h4>
                        <button type="button" class="close bg-danger" style="color: white;" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">

                        @include('main.users.users-add-form')

                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-light-secondary" >
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Réinitialiser</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" >
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Envoyer</span>
                        </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>

      <!-- all modal end -->

      {{-- ENGLISH VERSION --}}
  @endif
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>
<script src="{{asset('js/scripts/datatables/datatable.js')}}"></script>




{{-- supermask.js cdn--}}
<script src="https://cdn.jsdelivr.net/npm/supermask-js@1.0.0/index.min.js"></script>


@endsection

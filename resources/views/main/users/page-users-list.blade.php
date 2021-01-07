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
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="##user_add_modal"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></a>
      </p>

      <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <!-- datatable start -->
              <div class="table-responsive">
                <div id="users-list-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <table id="users-list-datatable" class="table">
                  <thead>
                    <tr>
                        <th>photo</th>
                        <th>nom</th>
                        <th>prénoms</th>
                        <th>email</th>
                        <th>création</th>
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
                        <td>300</td>
                        <td>
                            @if($users->email_verified_at != NULL)
                            <span class="text-primary">{{$users->familyname}}</span>
                            @else
                            <span class="text-danger" id="not-verified" data-toggle="tooltip" data-placement="bottom" title="l'utilsateur n'a pas encore vérifié son email">{{$users->familyname}}</span>
                            @endif
                        </td>
                        <td>{{$users->givenname}}</td>
                        <td>{{$users->email}}</td>
                        <td>@php echo date('d-m-Y', strtotime($users->created_at)); @endphp</td>
                        <td>
                            @if ($users->state == true)
                            <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Connecté"><i class="fa fa-toggle-on fa-2x"></i></span>
                            @else
                            <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Deconnecté"><i class="fa fa-toggle-off fa-2x"></i></span>
                            @endif
                        </td>
                        {{-- Special display for root users --}}
                        @if($superuser->root == true)

                        <td>
                            @if ($users->root == true)
                              <span class="badge badge-pill badge-glow badge-success" data-toggle="tooltip" data-placement="bottom" title="Actif"><i class="fa fa-check fa-2x"></i></span>
                            @else
                              <span class="badge badge-pill badge-glow badge-danger" data-toggle="tooltip" data-placement="bottom" title="Inactif"><i class="fa fa-close fa-2x"></i></span>
                            @endif
                        </td>

                        @endif

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{asset('page-users-edit')}}" role="button" class="text-secondary" title="modifier"><i class="bx bx-edit"></i></a>
                                <a href="{{asset('page-users-edit')}}" role="button" class="text-primary" title="voir"><i class='bx bx-show-alt'></i></a>
                                <a href="{{asset('page-users-edit')}}" role="button" class="text-danger" title="supprimer"><i class="bx bx-trash"></i></a>
                            </div>
                        </td>
                      </tr>
                    @endforeach



                  </tbody>
                </table>
              </div>
              <!-- datatable ends -->
            </div>
        </div>
      </div>

      <!-- all modal start -->

          <!--user add modal -->
              <div class="modal modal-primary fade text-left w-100" id="#user_add_modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <form class="form" id="user-add-form" method="POST" action="">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Ajouter un utilsateur</h4>
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
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
                        <button type="b" class="btn btn-primary ml-1" >
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
                                users
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>





      <p>
        <a role="button" class="btn round btn-outline-primary"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Add a new </span></a>
      </p>

      <div class="users-list-table">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <!-- datatable start -->
              <div class="table-responsive">
                <table id="users-list-datatable" class="table">
                  <thead>
                    <tr>
                        <th>picture</th>
                        <th>familyname</th>
                        <th>givenname</th>
                        <th>email</th>
                        <th>registration</th>
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
                      <td>300</td>
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
                      <td>@php echo date('Y-m-d', strtotime($users->created_at)); @endphp </td>
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
                </table>
              </div>
              <!-- datatable ends -->
            </div>
          </div>
        </div>
      </div>

      {{-- ENGLISH VERSION --}}
  @endif
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>
<script>

  // users add
  $("#password-icon").on("keyup", function () {
    
        alert("bonjour");
    });
</script>
@endsection

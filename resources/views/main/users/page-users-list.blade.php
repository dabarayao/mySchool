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


      <!-- header breadcrumbs -->
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





      <p>
        <a role="button" class="btn round btn-outline-primary"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></a>
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
                        <th>photo</th>
                        <th>nom</th>
                        <th>prénoms</th>
                        <th>email</th>
                        {{--<th>role</th>--}}
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
                      <td><span class="text-primary">{{$users->familyname}}</span>
                      </td>
                      <td>{{$users->givenname}}</td>
                      <td>{{$users->email}}</td>
                      {{--<td>none</td>--}}
                      <td>
                        @if ($users->state == true)
                          <span class="badge badge-pill badge-glow badge-success">Connecté</span>
                        @else
                          <span class="badge badge-pill badge-glow badge-danger">Déconnecté</span>
                        @endif
                      </td>
                      {{-- Special display for root users --}}
                      @if($superuser->root == true)

                      <td>
                        @if ($users->root == true)
                          <span class="badge badge-pill badge-glow badge-success">Active</span>
                        @else
                          <span class="badge badge-pill badge-glow badge-danger">Inactive</span>
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
      </div>

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
                        {{--<th>role</th>--}}
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
                      <td><a href="{{asset('page-users-view')}}">{{$users->familyname}}</a>
                      </td>
                      <td>{{$users->givenname}}</td>
                      <td>{{$users->email}}</td>
                      {{--<td>none</td>--}}
                      <td>
                        @if ($users->state == true)
                          <span class="badge badge-pill badge-glow badge-success">Logged in</span>
                        @else
                          <span class="badge badge-pill badge-glow badge-danger">Logged out</span>
                        @endif
                      </td>

                      {{-- Special display for root users --}}
                      @if($superuser->root == true)

                      <td>
                        @if ($users->root == true)
                          <span class="badge badge-pill badge-glow badge-success">Active</span>
                        @else
                          <span class="badge badge-pill badge-glow badge-danger">Close</span>
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
@endsection

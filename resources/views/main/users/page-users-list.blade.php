@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users List')
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
        <button type="button" class="btn btn-primary"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></button>
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
                        <th>role</th>
                        <th>etat</th>
                        <th>status</th>
                        <th>actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $users)
                      <tr>
                      <td>300</td>
                      <td><a href="{{asset('page-users-view')}}">{{$users->familyname}}</a>
                      </td>
                      <td>{{$users->givenname}}</td>
                      <td>{{$users->email}}</td>
                      <td>none</td>
                      <td>
                        @if ($users->state == true)
                          <span class="badge badge-success">Connecté</span>
                        @else
                          <span class="badge badge-danger">Déconnecté</span>
                        @endif
                      </td>
                      <td>
                        @if ($users->root == true)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif
                      </td>
                      <td><a href="{{asset('page-users-edit')}}"><i
                                  class="bx bx-edit-alt"></i></a></td>
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
  @else

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
        <button type="button" class="btn btn-primary"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></button>
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
                        <th>role</th>
                        <th>state</th>
                        <th>status</th>
                        <th>edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $users)
                      <tr>
                      <td>300</td>
                      <td><a href="{{asset('page-users-view')}}">{{$users->familyname}}</a>
                      </td>
                      <td>{{$users->givenname}}</td>
                      <td>{{$users->email}}</td>
                      <td>none</td>
                      <td>
                        @if ($users->state == true)
                          <span class="badge badge-success">Logged in</span>
                        @else
                          <span class="badge badge-danger">Logged out</span>
                        @endif
                      </td>
                      <td>
                        @if ($users->root == true)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Close</span>
                        @endif
                      </td>
                      <td><a href="{{asset('page-users-edit')}}"><i
                                  class="bx bx-edit-alt"></i></a></td>
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

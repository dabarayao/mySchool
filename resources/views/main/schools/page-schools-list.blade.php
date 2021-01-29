@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page-styles --}}

@section('content')

<!-- header breadcrumbs start -->
<div class="content-header row">
  <div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h5 class="content-header-title float-left pr-1 mb-0">Accueil</h5>
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item ">
                            <a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                          <li class="breadcrumb-item active">
                            List of schools
                          </li>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- header breadcrumbs end -->





<p>
  <a href="{{route('schools-add')}}"role="button" class="btn round btn-outline-primary"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter une école </span></a>
</p>

<!-- Scroll - horizontal and vertical table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List of schools</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table nowrap zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Town</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th>Funder</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($schools as $sc)

                                    <tr>
                                        <td>{{$sc->name}}</td>
                                        <td>{{$sc->country}}</td>
                                        <td>{{$sc->area}}</td>
                                        <td>{{$sc->address}}</td>
                                        <td>{{$sc->type}}</td>
                                        <td>{{$sc->funder}}</td>
                                        <td>
                                          <a href="{{route('schools-view', $sc->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                          <a href="{{route('schools-update', $sc->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                          <a href="#" role="button" class="text-danger" onclick="return confirm('Are you sure you want to delete this user?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>

                                        </td>
                                    </tr>

                                  @endforeach

                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th>Name</th>
                                      <th>Country</th>
                                      <th>Town</th>
                                      <th>Address</th>
                                      <th>type</th>
                                      <th>funder</th>
                                      <th>Actions</th>
                                  </tr>
                              </tfoots>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Scroll - horizontal and vertical table -->
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
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/datatables/datatable.js')}}"></script>
@endsection

@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Liste des classes')

  @endif

@else



  @section('title','List of classrooms')



@endif

{{-- vendor style --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page-styles --}}

@section('content')


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

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
                                    Listes des classes
                                      </li>
                  </ol></div>
                </div>
              </div>
            </div>
    </div>

    <p>
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="#primaryClasses"><i class="bx bx-add-to-queue bx-flashing"></i><span> Ajouter une classe </span></a>
    </p>


    @if($current->root == true)

      <!-- Row grouping -->
      <section id="row-grouping">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Listes des classes</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <div class="table-responsive">
                                  <table class="table row-grouping">
                                      <thead>
                                          <tr>
                                              <th>Libellé</th>
                                              <th>Sigle</th>
                                              <th>Ecole</th>
                                              <th>Description</th>
                                              <th>Classe d'examen</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($classroomAll as $classrooms)
                                          <tr>
                                              <td>{{$classrooms->label}}</td>
                                              <td>{{$classrooms->code}}</td>
                                              <td>
                                                @foreach ($school as $schools)
                                                  @if($schools->id == $classrooms->school_id)
                                                  <span class="font-weight-bold"> {{$schools->name}} </span>
                                                  @endif
                                                @endforeach
                                              </td>
                                              <td>{{$classrooms->description}}</td>
                                              <td>@if($classrooms->isexam == false) NON @else OUI @endif</td>
                                              <td>

                                                <div class="btn-group" role="group" aria-label="button group">
                                                  <a href="{{route('classroom-view', $classrooms->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                  <a href="{{route('classroom-edit', $classrooms->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                  <a href="{{route('classroom-delete', $classrooms->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                </div>

                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Libellé</th>
                                              <th>Sigle</th>
                                              <th>Ecole</th>
                                              <th>Description</th>
                                              <th>Classe d'examen</th>
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
      <!-- Row grouping -->

    @else

      <!-- Column selectors with Export Options and print table -->
      <section id="column-selectors">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Lites des classes</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <div class="table-responsive">
                                  <table class="table table-striped dataex-html5-selectors">
                                      <thead>
                                          <tr>
                                              <th>Libellé</th>
                                              <th>Sigle</th>
                                              <th>Description</th>
                                              <th>Classe d'examen</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($classroom as $classrooms)
                                          <tr>
                                              <td>{{$classrooms->label}}</td>
                                              <td>{{$classrooms->code}}</td>
                                              <td>{{$classrooms->description}}</td>
                                              <td>@if($classrooms->isexam == false) NON @else OUI @endif</td>
                                              <td>

                                                <div class="btn-group" role="group" aria-label="button group">
                                                  <a href="{{route('classroom-view', $classrooms->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                  <a href="{{route('classroom-edit', $classrooms->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                  <a href="{{route('classroom-delete', $classrooms->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                </div>

                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Libellé</th>
                                              <th>Sigle</th>
                                              <th>Description</th>
                                              <th>Classe d'examen</th>
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
      <!-- Column selectors with Export Options and print table -->

    @endif

  @endif

  <!--primary theme Modal -->
<div class="modal fade text-left" id="primaryClasses" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel160" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title white" id="myModalLabel160"><i class="bx bx-add-to-queue"></i> Ajouter une classe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <form method="POST" action="{{route('classroom-add')}}" class="form form-horizontal">
        @csrf

        <div class="modal-body">


            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">

              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Libellé</label>
                  </div>
                  <div class="col-md-8 form-group ">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="fname-icon" class="form-control" name="label"
                        placeholder="Libellé" maxlength="100">
                      <div class="form-control-position">
                        <i class="bx bx-label"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Sigle</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="sigle-icon" class="form-control" name="code" placeholder="Sigle" maxlength="100">
                      <div class="form-control-position">
                        <i class="bx bx-barcode"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Description</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <div class="position-relative has-icon-left">
                        <textarea class="form-control" name="description" id="exampleInput" placeholder="Description de la classe" rows="3"></textarea>

                      <div class="form-control-position">
                        <i class="bx bx-book-content"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label>Classe d'examen</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <div class="position-relative has-icon-left">

                        <select class="custom-select" id="exampleSelect" name="isexam">
                          <option value="1">Oui</option>
                          <option value="0">Non</option>
                        </select>
                    </div>
                  </div>

                  @if($current->root == true)
                    <div class="col-md-4">
                      <label>Ecole</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <div class="position-relative has-icon-left">

                          <select class="custom-select" id="exampleSelect" name="school">
                            @foreach ($school as $schools)
                              <optgroup label="{{$schools->area}} - {{$schools->address}}">
                              <option value="{{$schools->id}}">{{$schools->name}}</option>
                              </optgroup>

                            @endforeach
                          </select>
                      </div>
                    </div>
                  @endif
                </div>
              </div>


               </section>
            <!-- // Basic Horizontal form layout section end -->

        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light-secondary">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block"><i class="bx bx-eraser"></i> Effacer</span>
          </button>
          <button type="submit" class="btn btn-primary ml-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block"><i class="bx bx-add-to-queue"></i> Ajouter</span>
          </button>
        </div>
      </form>
    </div>
  </div>


@else


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
                                    List of classrooms
                                      </li>
                  </ol></div>
                </div>
              </div>
            </div>
    </div>

    <p>
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="#primaryClasses"><i class="bx bx-add-to-queue bx-flashing"></i><span> Add a classroom </span></a>
    </p>


    @if($current->root == true)

      <!-- Row grouping -->
      <section id="row-grouping">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">List of classrooms</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <div class="table-responsive">
                                  <table class="table row-grouping">
                                      <thead>
                                          <tr>
                                              <th>Label</th>
                                              <th>Code</th>
                                              <th>School</th>
                                              <th>Description</th>
                                              <th>Exam class</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($classroomAll as $classrooms)
                                          <tr>
                                              <td>{{$classrooms->label}}</td>
                                              <td>{{$classrooms->code}}</td>
                                              <td>
                                                @foreach ($school as $schools)
                                                  @if($schools->id == $classrooms->school_id)
                                                  <span class="font-weight-bold"> {{$schools->name}} </span>
                                                  @endif
                                                @endforeach
                                              </td>
                                              <td>{{$classrooms->description}}</td>
                                              <td>@if($classrooms->isexam == false) NON @else OUI @endif</td>
                                              <td>

                                                <div class="btn-group" role="group" aria-label="button group">
                                                  <a href="{{route('classroom-view', $classrooms->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                  <a href="{{route('classroom-edit', $classrooms->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                  <a href="{{route('classroom-delete', $classrooms->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                </div>

                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Label</th>
                                              <th>Code</th>
                                              <th>School</th>
                                              <th>Description</th>
                                              <th>Exam class</th>
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
      <!-- Row grouping -->

    @else

      <!-- Column selectors with Export Options and print table -->
      <section id="column-selectors">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Classroom's list</h4>
                      </div>
                      <div class="card-content">
                          <div class="card-body card-dashboard">
                              <div class="table-responsive">
                                  <table class="table table-striped dataex-html5-selectors">
                                      <thead>
                                          <tr>
                                              <th>Label</th>
                                              <th>Code</th>
                                              <th>Description</th>
                                              <th>Exam class</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($classroom as $classrooms)
                                          <tr>
                                              <td>{{$classrooms->label}}</td>
                                              <td>{{$classrooms->code}}</td>
                                              <td>{{$classrooms->description}}</td>
                                              <td>@if($classrooms->isexam == false) NON @else OUI @endif</td>
                                              <td>

                                                <div class="btn-group" role="group" aria-label="button group">
                                                  <a href="{{route('classroom-view', $classrooms->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                  <a href="{{route('classroom-edit', $classrooms->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                  <a href="{{route('classroom-delete', $classrooms->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                </div>

                                              </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Label</th>
                                              <th>Code</th>
                                              <th>Description</th>
                                              <th>Exam class</th>
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
      <!-- Column selectors with Export Options and print table -->

    @endif


        <!--primary theme Modal -->
    <div class="modal fade text-left" id="primaryClasses" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title white" id="myModalLabel160"><i class="bx bx-add-to-queue"></i>  Add a classroom</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="bx bx-x"></i>
            </button>
          </div>
          <form method="POST" action="{{route('classroom-add')}}" class="form form-horizontal">
            @csrf

            <div class="modal-body">


                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Label</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Libellé" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-label"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Code</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="sigle-icon" class="form-control" name="code" placeholder="Sigle" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-barcode"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Description</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                            <textarea class="form-control" name="description" id="exampleInput" placeholder="Description de la classe" rows="3"></textarea>

                          <div class="form-control-position">
                            <i class="bx bx-book-content"></i>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <label>Exam class</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">

                            <select class="custom-select" id="exampleSelect" name="isexam">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                        </div>
                      </div>

                      @if($current->root == true)
                        <div class="col-md-4">
                          <label>School</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="position-relative has-icon-left">

                              <select class="custom-select" id="exampleSelect" name="school">
                                @foreach ($school as $schools)
                                  <optgroup label="{{$schools->area}} - {{$schools->address}}">
                                  <option value="{{$schools->id}}">{{$schools->name}}</option>
                                  </optgroup>

                                @endforeach
                              </select>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>

                  </section>
                <!-- // Basic Horizontal form layout section end -->

            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-light-secondary">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block"><i class="bx bx-eraser"></i>reset</span>
              </button>
              <button type="submit" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block"><i class="bx bx-add-to-queue"></i> Add</span>
              </button>
            </div>
          </form>
        </div>
    </div>



@endif




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

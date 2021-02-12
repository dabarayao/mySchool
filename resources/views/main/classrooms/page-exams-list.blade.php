@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','List des examens')

  @endif

@else



  @section('title','List of exams')



@endif




{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('content')


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

        <!-- header breadcrumbs -->
            <div class="content-header row">
              <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                  <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Examens</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Ajouter un examen
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row">
        <div class="col-md-4 col-12">
          <div class="card">
              <h4 class="card-header">Ajouter un examen</h4>
              <div class="card-body">
                <form method="POST" action="{{route('exam-add')}}">

                  @csrf
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
                        <label>Type</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <select class="custom-select" id="exampleSelect" name="type">
                            <option value="0">National</option>
                            <option value="1">Locale</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Date</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <input type="date" id="sigle-icon" class="form-control" name="date" placeholder="Sigle" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-calendar"></i>
                          </div>
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
                      <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-add-to-queue"></i> Ajouter</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-eraser"></i>  Effacer</button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="card">
              <div class="card-body">

                @if($current->root == true)

                  <!-- Zero configuration table -->
                  <section id="horizontal-vertical">
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="card-title">Liste des examens</h4>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body card-dashboard">
                                          <div class="table-responsive">
                                              <table class="table nowrap scroll-horizontal-vertical">
                                                  <thead>
                                                      <tr>
                                                          <th>Libellé</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>Ecole</th>
                                                          <th>Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                    @foreach ($examAll as $exams)

                                                      <tr>
                                                          <td>{{$exams->label}}</td>
                                                          <td>@if($exams->type == false) National @else Locale @endif</td>
                                                          <td>{{$exams->date}}</td>
                                                          <td>
                                                            @foreach ($school as $schools)

                                                              @if($exams->school_id == $schools->id)
                                                                {{$schools->name}}
                                                              @endif

                                                            @endforeach
                                                          </td>
                                                          <td>
                                                            <div class="btn-group" role="group" aria-label="button group">
                                                              <a href="{{route('exam-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                              <a href="{{route('exam-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cet examen ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                            </div>
                                                          </td>
                                                      </tr>

                                                    @endforeach

                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>Libellé</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>Ecole</th>
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

                @else

                  <!-- Zero configuration table -->
                  <section id="horizontal-vertical">
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="card-title">Liste des examens</h4>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body card-dashboard">
                                          <div class="table-responsive">
                                              <table class="table nowrap scroll-horizontal-vertical">
                                                  <thead>
                                                      <tr>
                                                          <th>Libellé</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                    @foreach ($exam as $exams)

                                                      <tr>
                                                          <td>{{$exams->label}}</td>
                                                          <td>@if($exams->type == false) National @else Locale @endif</td>
                                                          <td>{{$exams->date}}</td>
                                                          <td>

                                                            <div class="btn-group" role="group" aria-label="button group">
                                                              <a href="{{route('exam-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                              <a href="{{route('exam-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cet examen ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                            </div>
                                                          </td>
                                                      </tr>

                                                    @endforeach

                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>Libellé</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
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

                @endif


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
                    <h5 class="content-header-title float-left pr-1 mb-0">Exams</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Add an exam
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row">
        <div class="col-md-4 col-12">
          <div class="card">
              <h4 class="card-header">Add an exam</h4>
              <div class="card-body">
                <form method="POST" action="{{route('exam-add')}}">

                  @csrf
                  <div class="row">
                      <div class="col-md-4">
                        <label>Label</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Label" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-label"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Type</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <select class="custom-select" id="exampleSelect" name="type">
                            <option value="0">National</option>
                            <option value="1">Locale</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Date</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <input type="date" id="sigle-icon" class="form-control" name="date" placeholder="date" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-calendar"></i>
                          </div>
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
                      <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-add-to-queue"></i> Add</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-eraser"></i>  Reset</button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="card">
              <div class="card-body">

                @if($current->root == true)

                  <!-- Zero configuration table -->
                  <section id="horizontal-vertical">
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="card-title">List of exams</h4>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body card-dashboard">
                                          <div class="table-responsive">
                                              <table class="table nowrap scroll-horizontal-vertical">
                                                  <thead>
                                                      <tr>
                                                          <th>Label</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>School</th>
                                                          <th>Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                    @foreach ($examAll as $exams)

                                                      <tr>
                                                          <td>{{$exams->label}}</td>
                                                          <td>@if($exams->type == false) National @else Locale @endif</td>
                                                          <td>{{$exams->date}}</td>
                                                          <td>
                                                            @foreach ($school as $schools)

                                                              @if($exams->school_id == $schools->id)
                                                                {{$schools->name}}
                                                              @endif

                                                            @endforeach
                                                          </td>
                                                          <td>
                                                            <div class="btn-group" role="group" aria-label="button group">
                                                              <a href="{{route('exam-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                              <a href="{{route('exam-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cet examen ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                            </div>
                                                          </td>
                                                      </tr>

                                                    @endforeach

                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>Label</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>School</th>
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

                @else

                  <!-- Zero configuration table -->
                  <section id="horizontal-vertical">
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="card-title">List of exams</h4>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body card-dashboard">
                                          <div class="table-responsive">
                                              <table class="table nowrap scroll-horizontal-vertical">
                                                  <thead>
                                                      <tr>
                                                          <th>Label</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
                                                          <th>Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>

                                                    @foreach ($exam as $exams)

                                                      <tr>
                                                          <td>{{$exams->label}}</td>
                                                          <td>@if($exams->type == false) National @else Locale @endif</td>
                                                          <td>{{$exams->date}}</td>
                                                          <td>

                                                            <div class="btn-group" role="group" aria-label="button group">
                                                              <a href="{{route('exam-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                              <a href="{{route('exam-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cet examen ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
                                                            </div>
                                                          </td>
                                                      </tr>

                                                    @endforeach

                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>Label</th>
                                                          <th>Type</th>
                                                          <th>Date</th>
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

                @endif


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
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
{{-- supermask.js cdn--}}
<script src="https://cdn.jsdelivr.net/npm/supermask-js@1.0.0/index.min.js"></script>
@endsection

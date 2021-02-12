@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Modifier un examen')

  @endif

@else



  @section('title','Edit an exam')



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
                                      modifier un examen
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- header breadcrumbs -->


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
              <h4 class="card-header">Modifier un examen</h4>
              <div class="card-body">
                <form method="POST" action="{{route('exam-update', $exam->id)}}">

                  @csrf
                  @method('PUT')

                  <div class="row">
                      <div class="col-md-4">
                        <label>Libellé</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Libellé" value="{{$exam->label}}" maxlength="100">
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
                        <label>date</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="position-relative has-icon-left">
                          <input type="date" id="sigle-icon" class="form-control" name="date" placeholder="Sigle" value="{{$exam->date}}" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-calendar"></i>
                          </div>
                        </div>
                      </div>


                      <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-edit"></i> Modifier</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-add-to-eraser"></i> Effacer</button>
                      </div>
                  </div>
                </form>
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
                                      Edit an exam
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- header breadcrumbs -->


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
              <h4 class="card-header">Edit an exam</h4>
              <div class="card-body">
                <form method="POST" action="{{route('exam-update', $exam->id)}}">

                  @csrf
                  @method('PUT')

                  <div class="row">
                      <div class="col-md-4">
                        <label>Label</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Label" value="{{$exam->label}}" maxlength="100">
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
                          <input type="date" id="sigle-icon" class="form-control" name="date" placeholder="Date" value="{{$exam->date}}" maxlength="100">
                          <div class="form-control-position">
                            <i class="bx bx-calendar"></i>
                          </div>
                        </div>
                      </div>


                      <div class="col-12 d-flex justify-content-end ">
                            <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-edit"></i> Edit</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-add-to-eraser"></i> Reset</button>
                      </div>
                  </div>
                </form>
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

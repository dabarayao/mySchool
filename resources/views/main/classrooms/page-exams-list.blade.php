@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Afficher une classe')

  @endif

@else



  @section('title','Display a class')



@endif




{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

        <!-- header breadcrumbs -->
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
                                      Display a class
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-4 col-12">
          <div class="card">
              <div class="card-body">
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
                      <div class="col-12 d-flex justify-content-end ">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                      </div>
                    @endif
                </div>
               </div>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="card">
              <div class="card-body">

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
                                                  @foreach ($exam as $exams)
                                                    <tr>
                                                        <td>{{$exams->label}}</td>
                                                        <td>{{$exams->code}}</td>
                                                        <td>{{$exams->description}}</td>
                                                        <td>@if($exams->isexam == false) NON @else OUI @endif</td>
                                                        <td>

                                                          <div class="btn-group" role="group" aria-label="button group">
                                                            <a href="{{route('classroom-view', $exams->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                            <a href="{{route('classroom-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                            <a href="{{route('classroom-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
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
                    <h5 class="content-header-title float-left pr-1 mb-0">Classroom</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Display a class
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-4 col-12">
          <div class="card">
              <div class="card-body">
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
                        <div class="col-12 d-flex justify-content-end ">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                        </div>
                    @endif
                </div>
               </div>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="card">
              <div class="card-body">

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
                                                  @foreach ($exam as $exams)
                                                    <tr>
                                                        <td>{{$exams->label}}</td>
                                                        <td>{{$exams->code}}</td>
                                                        <td>{{$exams->description}}</td>
                                                        <td>@if($exams->isexam == false) NON @else OUI @endif</td>
                                                        <td>

                                                          <div class="btn-group" role="group" aria-label="button group">
                                                            <a href="{{route('classroom-view', $exams->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="show"></i></a>
                                                            <a href="{{route('classroom-edit', $exams->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="edit" class="bx bx-edit"></i></a>
                                                            <a href="{{route('classroom-delete', $exams->id)}}" role="button" class="text-danger" onclick="return confirm('Voulez-vous supprimez cette classe ?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="delete"></i></a>
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
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
{{-- supermask.js cdn--}}
<script src="https://cdn.jsdelivr.net/npm/supermask-js@1.0.0/index.min.js"></script>
@endsection

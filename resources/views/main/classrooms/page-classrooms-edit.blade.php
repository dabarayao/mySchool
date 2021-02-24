@extends('layouts.contentLayoutMaster')
{{-- title --}}


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Modifier une classe')

  @endif

@else



  @section('title','Edit class')



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
                    <h5 class="content-header-title float-left pr-1 mb-0">Classes</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Modifier une classe
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Modifier une classe
                @if($current->root == true)
                  @foreach ($school as $schools)
                    <br>
                    @if($schools->id == $classroom->school_id)Ecole: <span class="text-primary"> {{$schools->name}} </span>@endif
                  @endforeach
                @endif

              </h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{route('classroom-update', $classroom->id)}}">

                  @csrf
                  {{method_field('PUT')}}



                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Libellé</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Libellé" maxlength="100" value="{{$classroom->label}}">
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
                          <input type="text" id="sigle-icon" class="form-control" name="code" placeholder="Sigle" maxlength="100"  value="{{$classroom->code}}">
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
                            <textarea class="form-control" name="description" id="exampleInput" placeholder="Description de la classe" rows="3"> {{$classroom->description}}</textarea>

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
                              @if($classroom->isexam == true)
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                              @else
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                              @endif

                            </select>
                        </div>
                      </div>

                      @if($classroom->isexam == true)

                        @if(isset($exam))
                          <div class="col-md-4">
                            <label>Examen</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <div class="position-relative has-icon-left">

                                <select class="custom-select" id="exampleSelect" name="exam_id" required>

                                  @foreach ($exam as $exams)


                                      <option value="{{$exams->id}}" @if($exams->id == $classroom->exam_id) selected @endif>{{$exams->label}}</option>
                                  @endforeach


                                      <option> selectionnez un examen </option>



                                </select>
                            </div>
                          </div>
                        @endif

                      @elseif($classroom->isexam == false)

                       @if(isset($exam))
                       <div class="col-md-4">
                          <label>Examen</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <div class="position-relative has-icon-left">

                              <select class="custom-select" id="exampleSelect" name="examname" required>

                                 @php $i = 0; @endphp
                                @foreach ($exam as $exams)

                                   @if($exams->id == $classroom->exam_id)
                                     @php  $i++; @endphp
                                   @endif
                                    <option value="{{$exams->id}}" @if($exams->id == $classroom->exam_id) selected @endif>{{$exams->label}}</option>
                                @endforeach

                                @if($i == 0)
                                    <option selected> selectionnez un examen </option>
                                @endif



                              </select>
                          </div>
                        </div>
                       @endif

                      @endif

                    </div>
                    <div class="col-12 d-flex justify-content-end ">
                          <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-edit"></i> Modifier</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-eraser"></i> Effacer</button>
                    </div>
                  </div>
                </form>
              </div>
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
                    <h5 class="content-header-title float-left pr-1 mb-0">Classrooms</h5>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb p-0 mb-0">
                                                <li class="breadcrumb-item ">
                                        <a href="#"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                      <li class="breadcrumb-item active">
                                      Edit a classroom
                                        </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>


    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Edit a classroom
                @if($current->root == true)
                  @foreach ($school as $schools)
                    <br>
                    @if($schools->id == $classroom->school_id)School: <span class="text-primary"> {{$schools->name}} </span>@endif
                  @endforeach
                @endif

              </h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{route('classroom-update', $classroom->id)}}">

                  @csrf
                  {{method_field('PUT')}}



                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Label</label>
                      </div>
                      <div class="col-md-8 form-group ">
                        <div class="position-relative has-icon-left">
                          <input type="text" id="fname-icon" class="form-control" name="label"
                            placeholder="Libellé" maxlength="100" value="{{$classroom->label}}">
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
                          <input type="text" id="sigle-icon" class="form-control" name="code" placeholder="Sigle" maxlength="100"  value="{{$classroom->code}}">
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
                            <textarea class="form-control" name="description" id="exampleInput" placeholder="Description de la classe" rows="3"> {{$classroom->description}}</textarea>

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
                              @if($classroom->isexam == true)
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              @else
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                              @endif

                            </select>
                        </div>
                      </div>


                      @if($classroom->isexam == true)

                        @if(isset($exam))
                          <div class="col-md-4">
                            <label>Examen</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <div class="position-relative has-icon-left">

                                <select class="custom-select" id="exampleSelect" name="exam_id" required>

                                  @foreach ($exam as $exams)


                                      <option value="{{$exams->id}}" @if($exams->id == $classroom->exam_id) selected @endif>{{$exams->label}}</option>
                                  @endforeach

                                      <option> choose an exam </option>



                                </select>
                            </div>
                          </div>
                        @endif

                      @elseif($classroom->isexam == false)

                       @if(isset($exam))
                       <div class="col-md-4">
                          <label>Examen</label>
                       </div>
                        <div class="col-md-8 form-group">
                          <div class="position-relative has-icon-left">

                              <select class="custom-select" id="exampleSelect" name="examname" required>

                                 @php $i = 0; @endphp
                                @foreach ($exam as $exams)

                                   @if($exams->id == $classroom->exam_id)
                                     @php  $i++; @endphp
                                   @endif
                                    <option value="{{$exams->id}}" @if($exams->id == $classroom->exam_id) selected @endif>{{$exams->label}}</option>
                                @endforeach

                                @if($i == 0)
                                    <option selected> choose an exam  </option>
                                @endif



                              </select>
                          </div>
                        </div>
                       @endif



                      @endif

                    </div>
                    <div class="col-12 d-flex justify-content-end ">
                          <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="bx bx-add-to-queue"></i> Edit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1"><i class="bx bx-eraser"></i> Reset</button>
                    </div>
                </div>
                </form>
              </div>
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

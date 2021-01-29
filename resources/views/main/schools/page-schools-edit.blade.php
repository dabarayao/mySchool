@extends('layouts.contentLayoutMaster')
{{-- title --}}

@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Modifier un école')

  @endif

@else



  @section('title','Edit a school')



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
                  <h5 class="content-header-title float-left pr-1 mb-0">Accueil</h5>
                  <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                                              <li class="breadcrumb-item ">
                                      <a href="#"><i class="bx bx-home-alt"></i></a>
                                      </li>
                                    <li class="breadcrumb-item active">
                                    Modifier une école
                                      </li>
                  </div>
                </div>
              </div>
            </div>
          </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Modifier une école </h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form" method="POST" id="school_edit" action="{{route('schools-update', $schools->id)}}" enctype="multipart/form-data">

                  @csrf
                  {{method_field('PUT')}}

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schoolphoto">
                            Photo de l'école (optionel)
                          </label>
                          <input type="hidden" id="settin_lang" value="{{$setting->language}}">
                          <input type="file" class="form-control" id="schoolphoto" name="photo"
                            placeholder="Enter Event Name" @change="inputFileCheck">
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schoolname">Nom de l'école </label>
                          <input type="text" class="form-control required" id="schoolname" value="{{$schools->name}}" name="schoolname"
                            placeholder="Nom de l'école" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="dialcode-icon">Code</label>
                          <input type="hidden" id="school_dialcode" value="{{$schools->dialcode}}">
                          @include('main.tools.dialcodes')
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltype">Téléphone</label>
                          <input type="text" class="form-control required maskField" id="schoolphone" value="{{$schools->phone}}"  mask="999-999-999-999-999" maxlength="19" name="phone"
                            placeholder="Téléphone de l'école" required>
                        </div>
                      </div>

                      @if($schools->type = "public")

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltype">Type</label>
                          <select class="custom-select form-control" id="schooltype" value="{{$schools->type}}" name="type" required>
                            <option value="public">Publique</option>
                            <option value="private">Privée</option>
                          </select>
                        </div>
                      </div>

                      @else

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="schooltype">Type</label>
                            <select class="custom-select form-control" id="schooltype" value="{{$schools->type}}" name="type" required>
                              <option value="private">Privée</option>
                              <option value="public">Publique</option>
                            </select>
                          </div>
                        </div>

                      @endif

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="country-icon">Pays</label>
                          <input type="hidden" id="school_country" value="{{$schools->country}}">
                          @include('main.tools.countries')
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltown">Ville</label>
                          <input type="text" class="form-control required" id="schooltown" value="{{$schools->area}}" name="area"
                            placeholder="Ville" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooladdress">Adresse</label>
                          <input type="text" class="form-control required" id="schooladdress" value="{{$schools->address}}" name="address"
                            placeholder="Adresse de l'école ex: area - city..." required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolnbroom">Nombre de salle</label>
                            <input type="number" class="form-control required" id="schoolnbroom" value="{{$schools->nb_room}}" name="nbroom"
                            placeholder="Nombre de salle" required>

                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolstart">Date de création</label>
                            <input type="date" class="form-control required" id="schoolstart" value="{{$schools->building_date}}" name="building_date"
                            placeholder="Date de création" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolfunder">Nom du fondateur </label>
                            <input type="text" class="form-control required" id="schoolfunder" value="{{$schools->funder}}"  name="funder"
                            placeholder="Nom du fondateur" required>
                        </div>
                      </div>

                      @if($schools->type_monthyear == false)

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolmonthyear">Système annuel</label>
                            <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                              <option value="0">TRIMESTER</option>
                              <option value="1">SEMESTRE</option>
                            </select>
                        </div>
                      </div>

                      @else

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolmonthyear">Système annuel</label>
                            <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                              <option value="1">SEMESTRE</option>
                              <option value="0">TRIMESTER</option>
                            </select>
                        </div>
                      </div>

                      @endif

                      @if($current->root == true)
                        @if($schools->status == true)

                          <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="schoolstatus">Status</label>
                                <select class="custom-select form-control" id="schoolstatus" name="status">
                                  <option value="1">ACTIF</option>
                                  <option value="0">INACTIF</option>
                                </select>
                            </div>
                          </div>

                        @else

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                              <label for="schoolstatus">Status</label>
                              <select class="custom-select form-control" id="schoolstatus" name="status">
                                <option value="0">INACTIF</option>
                                <option value="1">ACTIF</option>
                              </select>
                          </div>
                        </div>

                        @endif

                      @endif



                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mr-1 mb-1">Ajouter</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Effacer</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- // Basic multiple Column Form section end -->

  @endif

@else


      <!-- header breadcrumbs -->
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h5 class="content-header-title float-left pr-1 mb-0">Home</h5>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                                          <li class="breadcrumb-item ">
                                  <a href="#"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                <li class="breadcrumb-item active">
                                Edit a school
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row match-height">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit a school </h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form" method="POST" id="school_edit" action="{{route('schools-update', $schools->id)}}" enctype="multipart/form-data">

              @csrf
              {{method_field('PUT')}}

              <div class="form-body">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schoolphoto">
                        School's Photo
                      </label>
                      <input type="hidden" id="settin_lang" value="{{$setting->language}}">
                      <input type="file" class="form-control" id="schoolphoto" name="photo"
                          placeholder="Enter Event Name" @change="inputFileCheck">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schoolname">School's Name </label>
                      <input type="text" class="form-control required" id="schoolname" name="schoolname"
                        placeholder="The name of the school" value="{{$schools->name}}" maximum="256" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="dialcode-icon">Dialcode</label>
                      <input type="hidden" id="school_dialcode" value="{{$schools->dialcode}}">
                      @include('main.tools.dialcodes')
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooltype">Phone</label>
                      <input type="text" class="form-control required maskField" id="schoolphone"  mask="999-999-999-999-999" maxlength="19" name="phone"
                        placeholder="Phone of the school" value="{{$schools->phone}}" maximum="256" required>
                    </div>
                  </div>

                  @if($schools->type = "public")

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltype">Type</label>
                          <select class="custom-select form-control" id="schooltype" value="{{$schools->type}}" name="type" required>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
                          </select>
                        </div>
                      </div>

                      @else

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="schooltype">Type</label>
                            <select class="custom-select form-control" id="schooltype" value="{{$schools->type}}" name="type" required>
                              <option value="private">Private</option>
                              <option value="public">Public</option>
                            </select>
                          </div>
                        </div>

                      @endif

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="country-icon">Country</label>
                      <input type="hidden" id="school_country" value="{{$schools->country}}">
                      @include('main.tools.countries')
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooltown">Town</label>
                      <input type="text" class="form-control required" id="schooltown" name="area"
                        placeholder="Town of the country" value="{{$schools->area}}" maximum="256" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooladdress">Address</label>
                      <input type="text" class="form-control required" id="schooladdress" name="address"
                        placeholder="Address of the school eg: area - city..." value="{{$schools->address}}" maximum="256" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolnbroom">Number of room</label>
                        <input type="number" class="form-control required" id="schoolnbrooms" name="nbroom"
                        placeholder="Number of room into the school" value="{{$schools->nb_room}}" maximum="256" required>

                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolstart">Building date</label>
                        <input type="date" class="form-control required" id="schoolstart" name="building_date"
                        placeholder="Building dateof the school" value="{{$schools->building_date}}" maximum="256" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolfunder">Funder's Name </label>
                        <input type="text" class="form-control required" id="schoolfunder" name="funder"
                        placeholder="Funder's Name of the school" value="{{$schools->funder}}" maximum="256" required>
                    </div>
                  </div>

                  @if($schools->type_monthyear == false)

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolmonthyear">Système annuel</label>
                            <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                              <option value="0">TRIMESTER</option>
                              <option value="1">SEMESTER</option>
                            </select>
                        </div>
                      </div>

                      @else

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolmonthyear">Système annuel</label>
                            <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                              <option value="1">SEMESTER</option>
                              <option value="0">TRIMESTER</option>
                            </select>
                        </div>
                      </div>

                      @endif

                  @if($current->root == true)

                    @if($schools->status == true)

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolstatus">Status</label>
                            <select class="custom-select form-control" id="schoolstatus" name="status">
                              <option value="1">ACTIVE</option>
                              <option value="0">INACTIVE</option>
                            </select>
                        </div>
                      </div>

                    @else

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolstatus">Status</label>
                            <select class="custom-select form-control" id="schoolstatus" name="status">
                              <option value="0">INACTIVE</option>
                              <option value="1">ACTIVE</option>
                            </select>
                        </div>
                      </div>

                    @endif

                  @endif



                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Add</button>
                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- // Basic multiple Column Form section end -->

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

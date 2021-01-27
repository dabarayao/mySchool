@extends('layouts.contentLayoutMaster')
{{-- title --}}

@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Ajouter un école')

  @endif

@else



  @section('title','Add a school')



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
                                    Ajouter une école
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
              <h4 class="card-title">Ajouter une école </h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form" method="POST" action="{{route('schools-add')}}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schoolphoto">
                            Photo de l'école
                          </label>
                          <input type="file" class="form-control required" id="schoolphoto" name="photo"
                            placeholder="Enter Event Name">
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schoolname">Nom de l'école </label>
                          <input type="text" class="form-control required" id="schoolname" name="schoolname"
                            placeholder="The name of the school" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="dialcode-icon">Code</label>
                          @include('main.tools.dialcodes')
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltype">Téléphone</label>
                          <input type="text" class="form-control required maskField" id="schoolphone"  mask="999-999-999-999-999" maxlength="19" name="phone"
                            placeholder="Phone of the school" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltype">Type</label>
                          <select class="custom-select form-control" id="schooltype" name="type" required>
                            <option value="public">Publique</option>
                            <option value="private">Privée</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="country-icon">Pays</label>
                          @include('main.tools.countries')
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooltown">Ville</label>
                          <input type="text" class="form-control required" id="schooltown" name="area"
                            placeholder="Town of the country" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="schooladdress">Adresse</label>
                          <input type="text" class="form-control required" id="schooladdress" name="address"
                            placeholder="Address of the school eg: area - city..." required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schooladdress">Nombre de salle</label>
                            <input type="number" class="form-control required" id="schooladdress" name="nbroom"
                            placeholder="Number of room into the school" required>

                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolstart">Date de création</label>
                            <input type="date" class="form-control required" id="schoolstart" name="building_date"
                            placeholder="Enter Event Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolfunder">Nom du fondateur </label>
                            <input type="text" class="form-control required" id="schoolfunder" name="funder"
                            placeholder="Funder's Name of the school" required>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolmonthyear">Système annuel</label>
                            <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                              <option value="0">TRIMESTER</option>
                              <option value="1">SEMESTRE</option>
                            </select>
                        </div>
                      </div>

                      @if($current->root == true)

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolstatus">Status</label>
                            <select class="custom-select form-control" id="schoolstatus" name="status">
                              <option value="1">ACTIF</option>
                              <option value="0">INACTIF</option>
                            </select>
                        </div>
                      </div>

                      @endif

                      @if($current->root == true)

                        @if($userNb != 0)
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="schoolusers">Utilisateurs</label>
                                <select class="custom-select form-control" id="schoolusers" name="user">

                                  @foreach($user as $users)

                                    <optgroup label="{{$users->email}}">
                                      <option value="{{$users->id}}">{{$users->familyname}} {{$users->givenname}}</option>
                                    </optgroup>


                                  @endforeach

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
                                Add a school
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
          <h4 class="card-title">Add a school </h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form" method="POST" action="{{route('schools-add')}}" enctype="multipart/form-data">

              @csrf

              <div class="form-body">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schoolphoto">
                        School's Photo
                      </label>
                      <input type="file" class="form-control required" id="schoolphoto" name="photo"
                        placeholder="Enter Event Name">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schoolname">School's Name </label>
                      <input type="text" class="form-control required" id="schoolname" name="schoolname"
                        placeholder="The name of the school" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="dialcode-icon">Dialcode</label>
                      @include('main.tools.dialcodes')
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooltype">Phone</label>
                      <input type="text" class="form-control required maskField" id="schoolphone"  mask="999-999-999-999-999" maxlength="19" name="phone"
                        placeholder="Phone of the school" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooltype">Type</label>
                      <select class="custom-select form-control" id="schooltype" name="type" required>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="country-icon">Country</label>
                      @include('main.tools.countries')
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooltown">Town</label>
                      <input type="text" class="form-control required" id="schooltown" name="area"
                        placeholder="Town of the country" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="schooladdress">Address</label>
                      <input type="text" class="form-control required" id="schooladdress" name="address"
                        placeholder="Address of the school eg: area - city..." required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schooladdress">Number of room</label>
                        <input type="number" class="form-control required" id="schooladdress" name="nbroom"
                        placeholder="Number of room into the school" required>

                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolstart">Building date</label>
                        <input type="date" class="form-control required" id="schoolstart" name="building_date"
                        placeholder="Enter Event Name" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolfunder">Funder's Name </label>
                        <input type="text" class="form-control required" id="schoolfunder" name="funder"
                        placeholder="Funder's Name of the school" required>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolmonthyear">Type of monthyear</label>
                        <select class="custom-select form-control"  required id="schoolmonthyear" name="type_monthyear">
                          <option value="0">TRIMESTER</option>
                          <option value="1">SEMESTRE</option>
                        </select>
                    </div>
                  </div>

                  @if($current->root == true)

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="schoolstatus">Status</label>
                        <select class="custom-select form-control" id="schoolstatus" name="status">
                          <option value="1">ACTIVE</option>
                          <option value="0">INACTIVE</option>
                        </select>
                    </div>
                  </div>

                  @endif

                  @if($current->root == true)
                    @if($userNb != 0)
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="schoolusers">Users</label>
                            <select class="custom-select form-control" id="schoolusers" name="user">

                              @foreach($user as $users)

                                <optgroup label="{{$users->email}}">
                                  <option value="{{$users->id}}">{{$users->familyname}} {{$users->givenname}}</option>
                                </optgroup>


                              @endforeach

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

@extends('layouts.contentLayoutMaster')
{{-- title --}}

@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Modifier un étudiant ou un élève')

  @endif

@else



  @section('title','Edit a student or a pupils')



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
                                    Modifier l'étudiant ou l'élève
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
              <h4 class="card-title">Modifier l'étudiant ou l'élève </h4>
              <br>
              <h6>Ecole: <span class="text-primary">{{$school->name}}</span></h6>
              <h6>Classe: <span class="text-primary">{{$classroom->label}}</span></h6>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form" method="POST" id="student_edit_form" action="{{route('student-update', $student->id)}}" enctype="multipart/form-data">

                  @csrf
                  {{method_field('PUT')}}

                  <div class="form-body">
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="settin_lang" value="{{$setting->language}}"/>
                            <label for="photo-icon">Photo</label>
                            <div class="position-relative has-icon-left">
                              <input type="file" id="schoolphoto" class="form-control" accept="image/*" name="photo"
                                placeholder="Familyname" @change="inputFileCheck">
                              <div class="form-control-position">
                                <i class='bx bx-image-add'></i>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="email-icon">Numéro matricule</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="email-icon" class="form-control" name="reg_number"
                                placeholder="Numéro matricule" value="{{$student->reg_number}}"  maxlength="100" required>
                              <div class="form-control-position">
                                <i class="bx bx-mail-send"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="family-name-icon">Nom</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="family-name-icon" class="form-control" name="familyname"
                                placeholder="Nom de famille" value="{{$student->familyname}}" maxlength="100" required>
                              <div class="form-control-position">
                                <i class="bx bx-user"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="given-name-icon">Prénoms</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="given-name-icon" class="form-control" name="givenname"
                                placeholder="Prénoms" value="{{$student->givenname}}"  maxlength="256" required>
                              <div class="form-control-position">
                                <i class="bx bxs-user-detail"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="gender-icon">Sexe</label>
                            <div class="position-relative has-icon-left">
                              <select id="gender-icon" class="form-control"  name="gender">
                                  @if($student->gender == false)
                                    <option value="0"> MALE </option>
                                    <option value="1"> FEMALE </option>
                                  @else
                                    <option value="1"> FEMALE </option>
                                    <option value="0"> MALE </option>
                                  @endif
                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-male'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="birthdate-icon">Date de naissance</label>
                            <div class="position-relative has-icon-left">
                              <input type="date" id="birthdate-icon" class="form-control birthdate-picker" name="birthdate"
                                placeholder="birthdate" value="{{$student->birthdate}}" required>
                              <div class="form-control-position">
                                <i class='bx bxs-baby-carriage' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="birthcity-icon">Lieu de naissance</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="birthcity-icon" class="form-control birthdate-picker" name="birthcity"
                              placeholder="Lieu de naissance" maxlength="100" value="{{$student->birthcity}}" required >
                            <div class="form-control-position">
                              <i class='bx bxs-location-plus'></i>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="country_stud" value="{{$student->country}}">
                            <label for="country-icon">Pays</label>
                            <div class="position-relative has-icon-left">

                              @include('main.tools.countries')

                              <div class="form-control-position">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="address-icon">Adresse</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="address-icon" class="form-control" name="address"
                                placeholder="Address" value="{{$student->address}}"  maxlength="2566" required>
                              <div class="form-control-position">
                                <i class='bx bxs-building-house' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="dial_stud" value="{{$student->dialcode}}">
                            <label for="dialcode-icon">Code</label>
                            <div class="position-relative has-icon-left">

                                @include('main.tools.dialcodes')

                              <div class="form-control-position">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="phonenumber-icon">Téléphone</label>
                            <div class="position-relative has-icon-left">
                                      <input type="text" id="phonenumber-icon" class="form-control maskField" name="phone"
                                        placeholder="Téléphone" value="{{$student->phone}}"  mask="999-999-999-999-999" maxlength="19"  required>
                                      <div class="form-control-position">
                                        <i class='bx bxs-mobile' ></i>
                                      </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                              <div class="form-group">
                                <label for="oriented-icon">Est-il orienté?</label>
                                <div class="position-relative has-icon-left">
                                  <select id="oriented-icon" class="form-control" @change="selectOrien" name="is_oriented">

                                    @if($student->is_oriented == false)

                                      <option value="0">NON</option>
                                      <option value="1">OUI</option>

                                    @else

                                      <option value="1">OUI</option>
                                      <option value="0">NON</option>

                                    @endif


                                    </select>
                                  <div class="form-control-position">
                                    <i class='bx bxs-school'></i>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="hanidcap-icon">Est-il handicapé?</label>
                            <div class="position-relative has-icon-left">
                              <select id="hanidcap-icon" class="form-control" @change="selectHand"  name="is_handicap">

                                @if($student->is_handicap == false)

                                  <option value="0">NON</option>
                                  <option value="1">OUI</option>

                                @else

                                  <option value="1">OUI</option>
                                  <option value="0">NON</option>

                                @endif
                              </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="rang_orien" @if($student->is_oriented == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Prise en charge orientation?(0 à 100%)</label>
                            <div class="position-relative has-icon-left">
                                <input type="number" class="form-control" id="exampleInput" placeholder="Prise en charge orientation (0 à 100%)" value="{{$student->oriented_percent}}"  min="0" max="100" name="oriented_percent">
                              <div class="form-control-position">
                                <i class='bx bx-money'></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="lib_hand" @if($student->is_handicap == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Libellé handicap</label>
                            <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" id="exampleInput" placeholder="Libellé handicap" maxlength="100"  value="{{$student->label_handicap}}"  name="label_handicap">
                              <div class="form-control-position">
                                <i class='bx bx-text'></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="desc_hand" @if($student->is_handicap == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Description handicap</label>
                            <div class="position-relative has-icon-left">

                                  <textarea class="form-control" id="exampleInput" rows="3" maxlength="256" name="desc_handicap">{{$student->desc_handicap}}</textarea>

                              <div class="form-control-position">

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Modifier</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Effacer</button>
                        </div>






                        {{-- <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                        </div> --}}

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
                                Edit student or pupils
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
              <h4 class="card-title">Edit student or pupils </h4>
              <br>
              <h6>School: <span class="text-primary">{{$school->name}}</span></h6>
              <h6>Classroom: <span class="text-primary">{{$classroom->label}}</span></h6>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form class="form" method="POST" id="student_edit_form" action="{{route('student-update', $student->id)}}" enctype="multipart/form-data">

                  @csrf
                  {{method_field('PUT')}}

                  <div class="form-body">
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="settin_lang" value="{{$setting->language}}"/>
                            <label for="photo-icon">Photo</label>
                            <div class="position-relative has-icon-left">
                              <input type="file" id="schoolphoto" class="form-control" accept="image/*" name="photo"
                                placeholder="Familyname" @change="inputFileCheck">
                              <div class="form-control-position">
                                <i class='bx bx-image-add'></i>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="email-icon">Registration number</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="email-icon" class="form-control" name="reg_number"
                                placeholder="Registration number" value="{{$student->reg_number}}"  maxlength="100" required>
                              <div class="form-control-position">
                                <i class="bx bx-mail-send"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="family-name-icon">Familyname</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="family-name-icon" class="form-control" name="familyname"
                                placeholder="Familyname" value="{{$student->familyname}}" maxlength="100" required>
                              <div class="form-control-position">
                                <i class="bx bx-user"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="given-name-icon">Givenname</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="given-name-icon" class="form-control" name="givenname"
                                placeholder="Givenname" value="{{$student->givenname}}"  maxlength="256" required>
                              <div class="form-control-position">
                                <i class="bx bxs-user-detail"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="gender-icon">Gender</label>
                            <div class="position-relative has-icon-left">
                              <select id="gender-icon" class="form-control"  name="gender">
                                  @if($student->gender == false)
                                    <option value="0"> MALE </option>
                                    <option value="1"> FEMALE </option>
                                  @else
                                    <option value="1"> FEMALE </option>
                                    <option value="0"> MALE </option>
                                  @endif
                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-male'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="birthdate-icon">Birthdate</label>
                            <div class="position-relative has-icon-left">
                              <input type="date" id="birthdate-icon" class="form-control birthdate-picker" name="birthdate"
                                placeholder="Birthdate" value="{{$student->birthdate}}" required>
                              <div class="form-control-position">
                                <i class='bx bxs-baby-carriage' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="birthcity-icon">Birthcity</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="birthcity-icon" class="form-control birthdate-picker" name="birthcity"
                              placeholder="Birthcity" maxlength="100" value="{{$student->birthcity}}" required >
                            <div class="form-control-position">
                              <i class='bx bxs-location-plus'></i>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="country_stud" value="{{$student->country}}">
                            <label for="country-icon">Country</label>
                            <div class="position-relative has-icon-left">

                              @include('main.tools.countries')

                              <div class="form-control-position">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="address-icon">Address</label>
                            <div class="position-relative has-icon-left">
                              <input type="text" id="address-icon" class="form-control" name="address"
                                placeholder="Address" value="{{$student->address}}"  maxlength="2566" required>
                              <div class="form-control-position">
                                <i class='bx bxs-building-house' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <input type="hidden" id="dial_stud" value="{{$student->dialcode}}">
                            <label for="dialcode-icon">Dialcode</label>
                            <div class="position-relative has-icon-left">

                                @include('main.tools.dialcodes')

                              <div class="form-control-position">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="phonenumber-icon">Phone</label>
                            <div class="position-relative has-icon-left">
                                      <input type="text" id="phonenumber-icon" class="form-control maskField" name="phone"
                                        placeholder="Phone" value="{{$student->phone}}"  mask="999-999-999-999-999" maxlength="19"  required>
                                      <div class="form-control-position">
                                        <i class='bx bxs-mobile' ></i>
                                      </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                              <div class="form-group">
                                <label for="oriented-icon">Est-il orienté?</label>
                                <div class="position-relative has-icon-left">
                                  <select id="oriented-icon" class="form-control" @change="selectOrien" name="is_oriented">

                                    @if($student->is_oriented == false)

                                      <option value="0">NON</option>
                                      <option value="1">OUI</option>

                                    @else

                                      <option value="1">OUI</option>
                                      <option value="0">NON</option>

                                    @endif


                                    </select>
                                  <div class="form-control-position">
                                    <i class='bx bxs-school'></i>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="hanidcap-icon">Est-il handicapé?</label>
                            <div class="position-relative has-icon-left">
                              <select id="hanidcap-icon" class="form-control" @change="selectHand"  name="is_handicap">

                                @if($student->is_handicap == false)

                                  <option value="0">NON</option>
                                  <option value="1">OUI</option>

                                @else

                                  <option value="1">OUI</option>
                                  <option value="0">NON</option>

                                @endif
                              </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="rang_orien" @if($student->is_oriented == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Orientation support (0 to 100%)</label>
                            <div class="position-relative has-icon-left">
                                <input type="number" class="form-control" id="exampleInput" placeholder="Prise en charge orientation (0 à 100%)" value="{{$student->oriented_percent}}"  min="0" max="100" name="oriented_percent">
                              <div class="form-control-position">
                                <i class='bx bx-money'></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="lib_hand" @if($student->is_handicap == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Label of handicap</label>
                            <div class="position-relative has-icon-left">
                                <input type="text" class="form-control" id="exampleInput" placeholder="Label of handicap" maxlength="100"  value="{{$student->label_handicap}}"  name="label_handicap">
                              <div class="form-control-position">
                                <i class='bx bx-text'></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12" id="desc_hand" @if($student->is_handicap == false) style="display: none;" @endif>
                          <div class="form-group">
                            <label for="status-icon">Description of handicap</label>
                            <div class="position-relative has-icon-left">

                                  <textarea class="form-control" id="exampleInput" rows="3" maxlength="256" name="desc_handicap">{{$student->desc_handicap}}</textarea>

                              <div class="form-control-position">

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Edit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                        </div>






                        {{-- <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                          <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                        </div> --}}

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

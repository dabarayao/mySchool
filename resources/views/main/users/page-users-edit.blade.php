@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

@section('content')
<!-- users edit start -->
<section class="users-edit" id="user_edit_modal">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <ul class="nav nav-tabs mb-2" role="tablist">
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                  href="#account" aria-controls="account" role="tab" aria-selected="true">
                  <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Account</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                  href="#information" aria-controls="information" role="tab" aria-selected="false">
                  <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
              </a>
          </li>
        </ul>
        <form method="POST" action="{{route('users-update', $user->id)}}" id="user_edit_modal_form" enctype="multipart/form-data"  @submit="confCheck">
          @csrf
          {{ method_field('PUT') }}
          <div class="tab-content">

              <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                <!-- users edit media object start -->
                <div class="media mb-2">
                    <a class="mr-2" href="#">
                        <img src="@if($user->photo == NULL && $user->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($user->photo == NULL && $user->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{$user->photo}} @endif" id="edit_img" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$user->familyname}} {{$user->givenname}}</h4>
                        <div class="col-12 px-0 d-flex">
                            <a href="#" class="btn btn-sm btn-primary mr-25" id="btnUp" @click="displayUploader">@{{fire}}</a>

                        </div>
                    </div>
                </div>
                <!-- users edit media object ends -->

                <div v-if="photo"><input type="file" id="edit_file" name="photo" ><br><br></div>

                <!-- users edit account form start -->

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <div class="controls">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" placeholder="Nom"
                                        value="{{$user->familyname}}" required
                                        data-validation-required-message="This username field is required" name="familyname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Prénoms</label>
                                    <input type="text" class="form-control" placeholder="Prénoms"
                                        value="{{$user->givenname}}" required
                                        data-validation-required-message="This name field is required" name="givenname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" placeholder="Email"
                                        value="{{$user->email}}" required
                                        data-validation-required-message="This email field is required" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Mot de passe</label>
                                    <input type="password" id="password-icon" @keyup="passUp" class="form-control" placeholder="Mot de passe"
                                         required
                                        data-validation-required-message="This email field is required" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label>Confirmer le mot de passe</label>
                                    <input type="password" id="confirm-password-icon" @keyup="passUp" class="form-control" placeholder="Confirmer le mot de passe"
                                         required
                                        data-validation-required-message="This email field is required" name="confirm password">
                                        <div class="invalid-feedback">
                                          Les mots de passe ne correspondent pas.
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Sexe</label>
                                <select class="form-control" name="gender" required>
                                  @if($user->gender == false)
                                    <option value="0" selected>Masculin</option>
                                    <option value="1">Féminin</option>
                                  @else
                                    <option value="0" >Masculin</option>
                                    <option value="1" selected>Féminin</option>
                                  @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pays</label>
                                <input type="hidden" id="edit_country" value="{{$user->country}}">
                                @include('main.tools.countries')
                            </div>
                            <div class="form-group">
                                <label>Code</label>
                                <input type="hidden" id="edit_dialcode" value="{{$user->dialcode}}">
                                @include('main.tools.dialcodes')
                            </div>
                            <div class="form-group">
                              <div class="controls">
                                <label>Téléphone</label>
                                <input type="text" class="form-control" placeholder="Téléphone"
                                    value="{{$user->phone}}" required
                                    data-validation-required-message="This email field is required" name="phone">
                              </div>
                          </div>
                        </div>
                        {{--
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-1">
                                    <thead>
                                        <tr>
                                            <th>Module Permission</th>
                                            <th>Read</th>
                                            <th>Write</th>
                                            <th>Create</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Users</td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox1" class="checkbox-input" checked>
                                                    <label for="users-checkbox1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox2" class="checkbox-input"><label
                                                        for="users-checkbox2"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox3" class="checkbox-input"><label
                                                        for="users-checkbox3"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox4" class="checkbox-input" checked>
                                                    <label for="users-checkbox4"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Articles</td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox5" class="checkbox-input"><label
                                                        for="users-checkbox5"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox6" class="checkbox-input" checked>
                                                    <label for="users-checkbox6"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox7" class="checkbox-input"><label
                                                        for="users-checkbox7"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox8" class="checkbox-input" checked>
                                                    <label for="users-checkbox8"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Staff</td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox9" class="checkbox-input" checked>
                                                    <label for="users-checkbox9"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox10" class="checkbox-input" checked>
                                                    <label for="users-checkbox10"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox11" class="checkbox-input"><label
                                                        for="users-checkbox11"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox"><input type="checkbox"
                                                        id="users-checkbox12" class="checkbox-input"><label
                                                        for="users-checkbox12"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        --}}
                    </div>

                <!-- users edit account form ends -->
              </div>

              <div class="tab-pane fade show" id="information" aria-labelledby="information-tab" role="tabpanel">
                <!-- users edit Info form start -->

                  <div class="row">
                    @if($superuser->root == true)
                    <div class="col-12 col-sm-6">
                      <h5 class="mb-1"><i class="bx bx-link mr-25"></i>Extra</h5>
                      <div class="form-group">
                        <label for="status-icon">Status</label>
                          <input type="hidden" id="edit_status" value="{{$user->status}}">
                          <select id="status-icon" required class="form-control"  name="status">
                              <option value="0"> ACTIVE </option>
                              <option value="1"> INACTIVE </option>
                          </select>

                      </div>

                    </div>
                    @endif
                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                      <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Personal Info</h5>
                      <div class="form-group">
                        <div class="controls position-relative">
                          <label>Date de naissance</label>
                          <input type="date" class="form-control birthdate-picker" required
                              placeholder="Date de naissance" value="{{$user->birthdate}}"
                              data-validation-required-message="This birthdate field is required" name="birthdate">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls position-relative">
                          <label>Adresse</label>
                          <input type="text" class="form-control birthdate-picker" required
                              placeholder="Adresse" value="{{$user->address}}"
                              data-validation-required-message="This birthdate field is required" name="address">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls position-relative">
                          <label>Profession</label>
                          <input type="text" class="form-control birthdate-picker" required
                              placeholder="Date de naissance" value="{{$user->job}}"
                              data-validation-required-message="This birthdate field is required" name="job">
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- users edit Info form ends -->
              </div>

              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    changes</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection

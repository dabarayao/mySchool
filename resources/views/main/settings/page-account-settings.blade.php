@extends('layouts.contentLayoutMaster')
{{-- page title --}}

@if($setting->language == 1)

@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))
  {{-- page title --}}
  @section('title','Paramètres du compte')

@endif

@else

  {{-- page title --}}
  @section('title','Account Settings')

@endif

{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
@endsection
@section('content')


@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row" id="user_setting">
            <div class="col-12">
                <div class="row">
                  <input type="hidden" id="settin_lang" value="{{$setting->language}}">

                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(session()->get('error')) last @else active @endif" id="account-pill-general" data-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true">
                                    <i class="bx bx-cog"></i>
                                    <span>General</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(session()->get('error')) active @endif" id="account-pill-password" data-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i class="bx bx-lock"></i>
                                    <span>Changer Mot de passe</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane @if(session()->get('error')) fade @else active @endif" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="{{route('settings-update')}}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  {{method_field('put')}}


                                                    <a href="javascript: void(0);">
                                                        <img src="@if($current->photo == NULL && $current->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($current->photo == NULL && $current->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{asset($current->photo)}} @endif"
                                                            class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                  <div class="row">
                                                      <span> {{$current->familyname}} {{$current->givenname}} </span>
                                                  </div>
                                                  <div class="row">

                                                    <settings></settings>
                                                  </div>




                                                <hr>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Theme</label>
                                                                <input id="hide_theme" type="hidden" value="{{$setting->theme}}" >
                                                                <div class="form-group">
                                                                  <select class="form-control" id="themeSelect" name="theme" required>
                                                                    <option value="semi-dark">semi-dark</option>
                                                                    <option value="dark">dark</option>
                                                                    <option value="light">light</option>
                                                                  </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Langage</label>
                                                                <input type="hidden" id="hide_langage" value="{{$setting->language}}" >
                                                                <div class="form-group">
                                                                  <select class="form-control" id="langageSelect" name="language" required>
                                                                    <option value="1">Français</option>
                                                                    <option value="2">Anglais</option>
                                                                  </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Enregistrer <i class="bx bx-send"></i></button>
                                                        <button type="reset" class="btn btn-light mb-1">Restaurer <i class="bx bx-eraser"></i></button></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane @if(session()->get('error')) active @else fade @endif" id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form action="{{route('settings-pass')}}" method="POST">

                                              @csrf
                                              {{method_field('put')}}

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">

                                                                <label>Ancien mot de passe</label>
                                                                <input type="password" class="form-control @if(session()->get('error')) is-invalid @endif" required name="old_password"
                                                                    placeholder="Old Password"
                                                                    data-validation-required-message="This old password field is required">
                                                              <div class="invalid-feedback">
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 14px;">
                                                                  L'ancien mot de passe n'est pas correct
                                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Nouveau mot de passe</label>
                                                                <input type="password" name="password" class="form-control"
                                                                    placeholder="New Password" required
                                                                    data-validation-required-message="The password field is required"
                                                                    minlength="8" maxlength="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label> Confirmer nouveau de Mot de passe</label>
                                                                <input type="password" name="con-password"
                                                                    class="form-control" required
                                                                    data-validation-match-match="password"
                                                                    placeholder="New Password"
                                                                    data-validation-required-message="The Confirm password field is required"
                                                                    minlength="8" maxlength="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Enregistrer <i class="bx bx-send"></i></button>
                                                        <button type="reset" class="btn btn-light mb-1">Restaurer <i class="bx bx-eraser"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page ends -->
  @endif
@else

    <!-- account setting page start -->
    <section id="page-account-settings">
      <div class="row" id="user_setting">
          <div class="col-12">
              <div class="row">
                <input type="hidden" id="settin_lang" value="{{$setting->language}}">

                  <!-- left menu section -->
                  <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                      <ul class="nav nav-pills flex-column">
                          <li class="nav-item">
                              <a class="nav-link d-flex align-items-center @if(session()->get('error')) last @else active @endif" id="account-pill-general" data-toggle="pill"
                                  href="#account-vertical-general" aria-expanded="true">
                                  <i class="bx bx-cog"></i>
                                  <span>General</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link d-flex align-items-center @if(session()->get('error')) active @endif" id="account-pill-password" data-toggle="pill"
                                  href="#account-vertical-password" aria-expanded="false">
                                  <i class="bx bx-lock"></i>
                                  <span>Change Password</span>
                              </a>
                          </li>


                      </ul>
                  </div>
                  <!-- right content section -->
                  <div class="col-md-9">
                      <div class="card">
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane @if(session()->get('error')) fade @else active @endif" id="account-vertical-general"
                                          aria-labelledby="account-pill-general" aria-expanded="true">
                                          <form action="{{route('settings-update')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{method_field('put')}}

                                                  <a href="javascript: void(0);">
                                                      <img src="@if($current->photo == NULL && $current->gender == false) {{asset('images/mockup/man.jpg')}} @elseif($current->photo == NULL && $current->gender == true) {{asset('images/mockup/woman.jpg')}} @else {{asset($current->photo)}} @endif"
                                                          class="rounded mr-75" alt="profile image" height="64" width="64">
                                                  </a>
                                                  <div class="row">
                                                      <span> {{$current->familyname}} {{$current->givenname}} </span>
                                                  </div>
                                                  <div class="row">
                                                    <settings></settings>
                                                  </div>

                                              <hr>

                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="controls">
                                                              <label>Theme</label>
                                                              <input id="hide_theme" type="hidden" value="{{$setting->theme}}" >
                                                              <div class="form-group">
                                                                <select class="form-control" id="themeSelect" name="theme" required>
                                                                  <option value="semi-dark">semi-dark</option>
                                                                  <option value="dark">dark</option>
                                                                  <option value="light">light</option>
                                                                </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="controls">
                                                              <label>Language</label>
                                                              <input type="hidden" id="hide_langage" value="{{$setting->language}}" >
                                                              <div class="form-group">
                                                                <select class="form-control" id="langageSelect" name="language" required>
                                                                  <option value="1">French</option>
                                                                  <option value="2">English</option>
                                                                </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                      <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                          changes <i class="bx bx-send"></i></button>
                                                      <button type="reset" class="btn btn-light mb-1">Restore <i class="bx bx-eraser"></i></button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                      <div class="tab-pane @if(session()->get('error')) active @else fade @endif" id="account-vertical-password" role="tabpanel"
                                          aria-labelledby="account-pill-password" aria-expanded="false">
                                          <form action="{{route('settings-pass')}}" method="POST">

                                            @csrf
                                            {{method_field('put')}}

                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="controls">

                                                              <label>Ancien mot de passe</label>
                                                              <input type="password" class="form-control @if(session()->get('error')) is-invalid @endif" required name="old_password"
                                                                  placeholder="Old Password"
                                                                  data-validation-required-message="This old password field is required">
                                                            <div class="invalid-feedback">
                                                              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 14px;">
                                                                L'ancien mot de passe n'est pas correct
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="controls">
                                                              <label>Mot de passe</label>
                                                              <input type="password" name="password" class="form-control"
                                                                  placeholder="New Password" required
                                                                  data-validation-required-message="The password field is required"
                                                                  minlength="8" maxlength="100">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group">
                                                          <div class="controls">
                                                              <label> Confirmer de Mot de passe</label>
                                                              <input type="password" name="con-password"
                                                                  class="form-control" required
                                                                  data-validation-match-match="password"
                                                                  placeholder="New Password"
                                                                  data-validation-required-message="The Confirm password field is required"
                                                                  minlength="8" maxlength="100">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                      <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                          changes <i class="bx bx-send"></i></button>
                                                      <button type="reset" class="btn btn-light mb-1">Restore <i class="bx bx-eraser"></i></button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>



                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- account setting page ends -->

@endif

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/extensions/dropzone.min.js')}}"></script>
@endsection

@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-account-settings.js')}}"></script>
@endsection

@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Account Settings')
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
<!-- account setting page start -->
<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill"
                                href="#account-vertical-general" aria-expanded="true">
                                <i class="bx bx-cog"></i>
                                <span>General</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
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
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                        aria-labelledby="account-pill-general" aria-expanded="true">
                                        <div class="media">
                                            <a href="javascript: void(0);">
                                                <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}"
                                                    class="rounded mr-75" alt="profile image" height="64" width="64">
                                            </a>
                                            <div class="media-body mt-25">
                                                <div
                                                    class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                          <span>Upload new photo</span>

                                                        </label>
                                                    <button class="btn btn-sm btn-light-secondary ml-50">Reset</button>
                                                </div>

                                                <p class="text-muted ml-1 mt-50"><small><input id="select-files" type="file" ></small></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Theme</label>
                                                            <input id="select-files" type="hidden" value="{{$setting->theme}}">
                                                            <div class="form-group">
                                                              <select class="form-control" id="themeSelect">
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
                                                            <input id="select-files" type="hidden" value="{{$setting->language}}">
                                                            <div class="form-group">
                                                              <select class="form-control" id="LangageSelect">
                                                                <option value="1">Français</option>
                                                                <option value="2">Anglais</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Durée annuel</label>
                                                            @if($setting->type_monthverage == false)
                                                            <input id="select-files" type="hidden" value="0">
                                                            @else
                                                            <input id="select-files" type="hidden" value="1">
                                                            @endif
                                                            <div class="controls">
                                                              <div class="form-group">
                                                                <select class="form-control" id="LastSelect">
                                                                  <option value="0">Trimestre</option>
                                                                  <option value="1">Semestre</option>
                                                                </select>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="alert bg-rgba-warning alert-dismissible mb-2"
                                                        role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <p class="mb-0">
                                                            Your email is not confirmed. Please check your inbox.
                                                        </p>
                                                        <a href="javascript: void(0);">Resend confirmation</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                        aria-labelledby="account-pill-password" aria-expanded="false">
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Ancien mot de passe</label>
                                                            <input type="password" class="form-control" required
                                                                placeholder="Old Password"
                                                                data-validation-required-message="This old password field is required">
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
                                                                minlength="6">
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
                                                                minlength="6">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light mb-1">Cancel</button>
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

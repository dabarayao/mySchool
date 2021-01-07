@if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr')

  {{-- FRENCH VERSION --}}


  <!-- // Basic multiple Column Form section start -->
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">

                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="family-name-icon">Nom</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="family-name-icon" class="form-control" name="familyname"
                            placeholder="Familyname" required>
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
                            placeholder="Givenname" required>
                          <div class="form-control-position">
                            <i class="bx bxs-user-detail"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="email-icon">Email</label>
                        <div class="position-relative has-icon-left">
                          <input type="email" id="email-icon" class="form-control" name="email"
                            placeholder="Email" required>
                          <div class="form-control-position">
                            <i class="bx bx-mail-send"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="password-icon">Mot de passe</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" id="password-icon" class="form-control" name="password"
                            placeholder="Password" required>
                          <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="confirm-password-icon">Confirmer le Mot de passe</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" id="confirm-password-icon" class="form-control"
                            placeholder="Confirm your Password"  required>
                          <div class="invalid-feedback">
                            Les mots de passe ne correspondent pas.
                          </div>
                          <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="gender-icon">Sexe</label>
                        <div class="position-relative has-icon-left">
                          <select id="gender-icon" class="form-control"  name="gender">
                              <option value="0"> MALE </option>
                              <option value="1"> FEMALE </option>
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
                          <input type="date" id="birthdate-icon" class="form-control" name="birthdate"
                            placeholder="birthdate" required>
                          <div class="form-control-position">
                            <i class='bx bxs-baby-carriage' ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">

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
                                  <input type="text" id="phonenumber-icon" class="form-control" name="phone"
                                    placeholder="Phone number" required>
                                  <div class="form-control-position">
                                    <i class='bx bxs-mobile' ></i>
                                  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="address-icon">Adresse</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="address-icon" class="form-control" name="address"
                            placeholder="Address" required>
                          <div class="form-control-position">
                            <i class='bx bxs-building-house' ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="job-icon">Profession</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="job-icon" class="form-control" name="address"
                            placeholder="Job" required>
                          <div class="form-control-position">
                            <i class='fa fa-briefcase' ></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <div class="form-group">
                        <label for="status-icon">Status</label>
                        <div class="position-relative has-icon-left">
                          <select id="status-icon" class="form-control"  name="gender">
                              <option value="0"> ACTIVE </option>
                              <option value="1"> INACTIVE </option>
                            </select>
                          <div class="form-control-position">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                      <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                    </div> --}}

                  </div>
                </div>

      </div>
    </div>
  </section>
  <!-- // Basic multiple Column Form section end -->

  {{-- FRENCH VERSION --}}

@else

  {{-- ENGLISH VERSION --}}


  <!-- // Basic multiple Column Form section start -->
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">

                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="family-name-icon">Familyname</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="family-name-icon" class="form-control" name="familyname"
                            placeholder="Familyname" required>
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
                            placeholder="Givenname" required>
                          <div class="form-control-position">
                            <i class="bx bxs-user-detail"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="email-icon">Email</label>
                        <div class="position-relative has-icon-left">
                          <input type="email" id="email-icon" class="form-control" name="email"
                            placeholder="Email" required>
                          <div class="form-control-position">
                            <i class="bx bx-mail-send"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="password-icon">Password</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" id="password-icon" class="form-control" name="password"
                            placeholder="Password" required>
                          <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="confirm-password-icon">Confirm password</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" id="confirm-password-icon" class="form-control"
                            placeholder="Confirm your Password" required>
                          <div class="invalid-feedback">
                            The passwords does not match.
                          </div>
                          <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="gender-icon">Gender</label>
                        <div class="position-relative has-icon-left">
                          <select id="gender-icon" class="form-control"  name="gender">
                              <option value="0"> MALE </option>
                              <option value="1"> FEMALE </option>
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
                          <input type="date" id="birthdate-icon" class="form-control" name="birthdate"
                            placeholder="birthdate" required>
                          <div class="form-control-position">
                            <i class='bx bxs-baby-carriage' ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">

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
                                  <input type="text" id="phonenumber-icon" class="form-control" name="phone"
                                    placeholder="Phone number" required>
                                  <div class="form-control-position">
                                    <i class='bx bxs-mobile' ></i>
                                  </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="address-icon">Address</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="address-icon" class="form-control" name="address"
                            placeholder="Address" required>
                          <div class="form-control-position">
                            <i class='bx bxs-building-house' ></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="job-icon">Job</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="job-icon" class="form-control" name="address"
                            placeholder="Job" required>
                          <div class="form-control-position">
                            <i class='fa fa-briefcase' ></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-6">
                      <div class="form-group">
                        <label for="status-icon">Status</label>
                        <div class="position-relative has-icon-left">
                          <select id="status-icon" class="form-control"  name="gender">
                              <option value="0"> ACTIVE </option>
                              <option value="1"> INACTIVE </option>
                            </select>
                          <div class="form-control-position">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                      <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                    </div> --}}

                  </div>
                </div>

      </div>
    </div>
  </section>
  <!-- // Basic multiple Column Form section end -->

  {{-- ENGLISH VERSION --}}

@endif


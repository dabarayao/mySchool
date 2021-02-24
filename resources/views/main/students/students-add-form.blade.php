@if($setting->language == 1)

  @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    {{-- FRENCH VERSION --}}


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">



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
                              placeholder="Numéro matricule"  maxlength="100" required>
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
                              placeholder="Nom de famille" maxlength="100" required>
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
                              placeholder="Prénoms"  maxlength="256" required>
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
                                <option value="0"> MASCULIN </option>
                                <option value="1"> FEMININ </option>
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
                              placeholder="birthdate" required>
                            <div class="form-control-position">
                              <i class='bx bxs-baby-carriage' ></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="birthdate-icon">Lieu de naissance</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="birthdate-icon" class="form-control birthdate-picker" name="birthcity"
                              placeholder="Lieu de naissance" maxlength="100" required>
                            <div class="form-control-position">
                              <i class='bx bxs-location-plus'></i>
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
                          <label for="address-icon">Adresse</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="address-icon" class="form-control" name="address"
                              placeholder="Address" maxlength="256" required>
                            <div class="form-control-position">
                              <i class='bx bxs-building-house' ></i>
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
                                    <input type="text" id="phonenumber-icon" class="form-control maskField" name="phone"
                                      placeholder="Phone number" mask="999-999-999-999-999" maxlength="19"  required>
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
                                      <option value="1">OUI</option>
                                      <option value="0">NON</option>
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
                              <option value="1">OUI</option>
                              <option value="0">NON</option>
                              </select>
                            <div class="form-control-position">
                              <i class='bx bx-chair' ></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="rang_orien">
                        <div class="form-group">
                          <label for="status-icon">Prise en charge orientation (0 à 100%)</label>
                          <div class="position-relative has-icon-left">
                               <input type="number" class="form-control" id="exampleInput" placeholder="Prise en charge orientation (0 à 100%)" min="0" max="100" name="oriented_percent">
                            <div class="form-control-position">
                              <i class='bx bx-money'></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="lib_hand">
                        <div class="form-group">
                          <label for="status-icon">Libellé handicap</label>
                          <div class="position-relative has-icon-left">
                               <input type="text" class="form-control" id="exampleInput" placeholder="Example input placeholder" maxlength="100" name="label_handicap">
                            <div class="form-control-position">
                              <i class='bx bx-text'></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="desc_hand">
                        <div class="form-group">
                          <label for="status-icon">Description handicap</label>
                          <div class="position-relative has-icon-left">

                                 <textarea class="form-control" id="exampleInput" rows="3" maxlength="256" name="desc_handicap"></textarea>

                            <div class="form-control-position">

                            </div>
                          </div>
                        </div>
                      </div>

                      @if($current->root == true)
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="school-icon">Classe</label>
                            <div class="position-relative has-icon-left">
                              <select id="school-icon" class="form-control"  name="classroom_id" id="ecol_sel" onchange="giveSelection(this.value)">

                                @foreach ($school as $schools)
                                    @php $i = 0; @endphp
                                    @foreach ($classroom as $classrooms)


                                      @if($classrooms->school_id == $schools->id)
                                      @php $i++; @endphp
                                        <optgroup label="Ecole: {{$schools->name}}">
                                          @foreach ($classroom as $classrooms)
                                            @if($classrooms->school_id == $schools->id)
                                            <option value="{{$classrooms->id}}">{{$classrooms->label}}</option>
                                            @endif
                                          @endforeach
                                        </optgroup>
                                      @endif

                                      @if($i > 0)
                                        @php break; @endphp
                                      @endif

                                    @endforeach

                                @endforeach

                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif

                      @if($current->root == false)
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="class-icon">Classe</label>
                            <div class="position-relative has-icon-left">
                              <select id="class-icon" class="form-control"  name="classroom_id" id="class_sel">

                                @foreach ($classroom as $classrooms)
                                  <option value="{{$classrooms->id}}"> {{$classrooms->label}} </option>
                                @endforeach


                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif




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

  @endif

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
                              placeholder="Registration number"  maxlength="100" required>
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
                              placeholder="Familyname" maxlength="100" required>
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
                              placeholder="Givenname"  maxlength="256" required>
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
                            <input type="date" id="birthdate-icon" class="form-control birthdate-picker" name="birthdate"
                              placeholder="birthdate" required>
                            <div class="form-control-position">
                              <i class='bx bxs-baby-carriage' ></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="birthdate-icon">Birthcity</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="birthdate-icon" class="form-control birthdate-picker" name="birthcity"
                              placeholder="Birthcity" maxlength="100" required>
                            <div class="form-control-position">
                              <i class='bx bxs-location-plus'></i>
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
                          <label for="address-icon">Address</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" id="address-icon" class="form-control" name="address"
                              placeholder="Address" maxlength="256" required>
                            <div class="form-control-position">
                              <i class='bx bxs-building-house' ></i>
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
                                    <input type="text" id="phonenumber-icon" class="form-control maskField" name="phone"
                                      placeholder="Phone number" mask="999-999-999-999-999" maxlength="19"  required>
                                    <div class="form-control-position">
                                      <i class='bx bxs-mobile' ></i>
                                    </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="oriented-icon">Is oriented?</label>
                              <div class="position-relative has-icon-left">
                                <select id="oriented-icon" class="form-control" @change="selectOrien" name="is_oriented">
                                      <option value="1">YES</option>
                                      <option value="0">NO</option>
                                  </select>
                                <div class="form-control-position">
                                  <i class='bx bxs-school'></i>
                                </div>
                              </div>
                            </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="hanidcap-icon">Is handicapped?</label>
                          <div class="position-relative has-icon-left">
                            <select id="hanidcap-icon" class="form-control" @change="selectHand"  name="is_handicap">
                              <option value="1">YES</option>
                              <option value="0">NO</option>
                              </select>
                            <div class="form-control-position">
                              <i class='bx bx-chair' ></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="rang_orien">
                        <div class="form-group">
                          <label for="status-icon">Orientation support (0 to 100%)</label>
                          <div class="position-relative has-icon-left">
                               <input type="number" class="form-control" id="exampleInput" placeholder="Orientation support (0 to 100%)" min="0" max="100" name="oriented_percent">
                            <div class="form-control-position">
                              <i class='bx bx-money'></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="lib_hand">
                        <div class="form-group">
                          <label for="status-icon">Label of handicap</label>
                          <div class="position-relative has-icon-left">
                               <input type="text" class="form-control" id="exampleInput" placeholder="Example input placeholder" maxlength="100" name="label_handicap">
                            <div class="form-control-position">
                              <i class='bx bx-text'></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6 col-12" id="desc_hand">
                        <div class="form-group">
                          <label for="status-icon">Description handicap</label>
                          <div class="position-relative has-icon-left">

                                 <textarea class="form-control" id="exampleInput" rows="3" maxlength="256" name="desc_handicap"></textarea>

                            <div class="form-control-position">

                            </div>
                          </div>
                        </div>
                      </div>

                      @if($current->root == true)
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="school-icon">Classroom</label>
                            <div class="position-relative has-icon-left">
                              <select id="school-icon" class="form-control"  name="classroom_id" id="ecol_sel" onchange="giveSelection(this.value)">

                                @foreach ($school as $schools)
                                    @php $i = 0; @endphp
                                    @foreach ($classroom as $classrooms)


                                      @if($classrooms->school_id == $schools->id)
                                      @php $i++; @endphp
                                        <optgroup label="School: {{$schools->name}}">
                                          @foreach ($classroom as $classrooms)
                                            @if($classrooms->school_id == $schools->id)
                                            <option value="{{$classrooms->id}}">{{$classrooms->label}}</option>
                                            @endif
                                          @endforeach
                                        </optgroup>
                                      @endif

                                      @if($i > 0)
                                        @php break; @endphp
                                      @endif

                                    @endforeach

                                @endforeach

                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif

                      @if($current->root == false)
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="class-icon">Classroom</label>
                            <div class="position-relative has-icon-left">
                              <select id="class-icon" class="form-control"  name="classroom_id" id="class_sel">

                                @foreach ($classroom as $classrooms)
                                  <option value="{{$classrooms->id}}"> {{$classrooms->label}} </option>
                                @endforeach


                                </select>
                              <div class="form-control-position">
                                <i class='bx bx-chair' ></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif




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



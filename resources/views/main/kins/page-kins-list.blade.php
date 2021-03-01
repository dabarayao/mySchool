@extends('layouts.contentLayoutMaster')
{{-- page title --}}
  @if($setting->language == 1)

    @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

    @section('title','Listes des étudiants ou élèves')

    @endif

  @else

    @section('title','List of students or pupils')

  @endif

{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">s
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">

@endsection
@section('content')
<!-- users list start -->
<section class="users-list-wrapper">

  @if($setting->language == 1)

    @if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en'))

      {{-- FRENCH VERSION --}}


      <!-- header breadcrumbs start -->
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h5 class="content-header-title float-left pr-1 mb-0">Etudiants ou Elèves</h5>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                                          <li class="breadcrumb-item ">
                                  <a href="#"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                <li class="breadcrumb-item active">
                                Listes des Etudiants ou Elèves
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header breadcrumbs end -->





      <p>
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="#student_add_modal"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Ajouter un nouveau </span></a>
      </p>

      @if($current->root == true)

        <!-- Student configuration table -->
        <section id="row-grouping">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listes des Etudiants ou Elèves</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">
                                  @if(session()->get('emailroradd'))
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    L'email que vous avez rentrez existe déja, l'utilisateur ne peut pas être ajouter
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  @endif
                                </p>
                                <div class="table-responsive">
                                    <table class="table row-grouping">
                                        <thead>
                                            <tr>
                                                <th>photo</th>
                                                <th>matricule</th>
                                                <th>école</th>
                                                <th>nom</th>
                                                <th>prénoms</th>
                                                <th>classe</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($student as $students)
                                            <tr>
                                              <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                    @if($students->photo == NULL && $students->gender == false)
                                                      <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                    @elseif($students->photo == NULL && $students->gender == true)
                                                      <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                    @else
                                                      <img src="{{asset($students->photo)}}" alt="avtar img holder">

                                                    @endif
                                                </div>
                                              </td>
                                              <td>
                                                {{$students->reg_number}}
                                              </td>
                                              <td>
                                                <h5>{{$students->name}}<h5>
                                              </td>
                                              <td>
                                                {{$students->familyname}}
                                              </td>
                                              <td>
                                                {{$students->givenname}}
                                              </td>
                                              <td>
                                                {{$students->label}} ( {{$students->code}} )
                                              </td>
                                              <td>
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a href="{{route('student-view', $students->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="voir"></i></a>
                                                      <a href="{{route('student-edit', $students->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="modifier" class="bx bx-edit"></i></a>

                                                      <a href="{{route('student-delete', $students->id)}}" role="button" class="text-danger" id="del_user_but" onclick="return confirm('Etes-vous sûre de vouloir supprimer cet utilisateur?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="supprimer"></i></a>

                                                  </div>
                                              </td>
                                            </tr>
                                          @endforeach



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>photo</th>
                                                <th>matricule</th>
                                                <th>école</th>
                                                <th>nom</th>
                                                <th>prénoms</th>
                                                <th>classe</th>
                                                <th>actions</th>
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
        <!-- Student configuration table -->

      @else

        <!-- Student configuration table -->
        <section id="row-grouping">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Listes des Etudiants ou Elèves</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">
                                  @if(session()->get('emailroradd'))
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    L'email que vous avez rentrez existe déja, l'utilisateur ne peut pas être ajouter
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  @endif
                                </p>
                                <div class="table-responsive">
                                    <table class="table row-grouping">
                                        <thead>
                                            <tr>
                                                <th>photo</th>
                                                <th>matricule</th>
                                                <th>classe</th>
                                                <th>nom</th>
                                                <th>prénoms</th>
                                                <th>orienté</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($student as $students)
                                            <tr>
                                              <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                    @if($students->photo == NULL && $students->gender == false)
                                                      <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                    @elseif($students->photo == NULL && $students->gender == true)
                                                      <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                    @else
                                                      <img src="{{asset($students->photo)}}" alt="avtar img holder">

                                                    @endif
                                                </div>
                                              </td>
                                              <td>
                                                {{$students->reg_number}}
                                              </td>
                                              <td>
                                                <h5>{{$students->label}} ( {{$students->code}} )</h5>
                                              </td>
                                              <td>
                                                {{$students->familyname}}
                                              </td>
                                              <td>
                                                {{$students->givenname}}
                                              </td>
                                              <td>
                                                @if($students->is_oriented == false) OUI @else NON @endif
                                              </td>
                                              <td>
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a href="{{route('student-view', $students->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="voir"></i></a>
                                                      <a href="{{route('student-edit', $students->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="modifier" class="bx bx-edit"></i></a>
                                                      <a href="{{route('student-delete', $students->id)}}" role="button" class="text-danger" id="del_user_but" onclick="return confirm('Etes-vous sûre de vouloir supprimer cet utilisateur?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="supprimer"></i></a>

                                                  </div>
                                              </td>
                                            </tr>
                                          @endforeach



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>photo</th>
                                                <th>matricule</th>
                                                <th>classe</th>
                                                <th>nom</th>
                                                <th>prénoms</th>
                                                <th>orienté</th>
                                                <th>actions</th>
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
        <!-- Student configuration table -->



      @endif

      <!-- all modal start -->

      <!--user add modal -->
              <div class="modal modal-primary fade text-left w-100" id="student_add_modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <form class="form" id="student-add-form" method="POST" action="{{route('student-add')}}" enctype="multipart/form-data" @submit="confCheck">
                  @csrf

                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel16"><i class="bx bx-add-to-queue"></i> Ajouter un utilsateur</h4>
                        <button type="button" class="close bg-danger" style="color: white;" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">

                         @include('main.students.students-add-form')

                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-light-secondary" >
                            Effacer <i class='bx bx-eraser'></i>
                        </button>
                        <button type="submit" class="btn btn-primary" >
                          Ajouter <i class='bx bx-send' ></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>

      <!-- all modal end -->


      {{-- FRENCH VERSION --}}
    @endif
  @else
      {{-- ENGLISH VERSION --}}

           <!-- header breadcrumbs start -->
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h5 class="content-header-title float-left pr-1 mb-0">Student or pupils</h5>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                                          <li class="breadcrumb-item ">
                                  <a href="#"><i class="bx bx-home-alt"></i></a>
                                  </li>
                                <li class="breadcrumb-item active">
                                List of students or pupils
                                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header breadcrumbs end -->





      <p>
        <a role="button" class="btn round btn-outline-primary" data-toggle="modal" data-target="#student_add_modal"><i class='bx bx-add-to-queue bx-flashing' ></i><span> Add a new </span></a>
      </p>

      @if($current->root == true)

        <!-- Student configuration table -->
        <section id="row-grouping">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of students or pupils</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">

                                </p>
                                <div class="table-responsive">
                                    <table class="table row-grouping">
                                        <thead>
                                            <tr>
                                                <th>photo</th>
                                                <th>registration number</th>
                                                <th>School</th>
                                                <th>Familyname</th>
                                                <th>Givenname</th>
                                                <th>classroom</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($student as $students)
                                            <tr>
                                              <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                    @if($students->photo == NULL && $students->gender == false)
                                                      <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                    @elseif($students->photo == NULL && $students->gender == true)
                                                      <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                    @else
                                                      <img src="{{asset($students->photo)}}" alt="avtar img holder">

                                                    @endif
                                                </div>
                                              </td>
                                              <td>
                                                {{$students->reg_number}}
                                              </td>
                                              <td>
                                                <h5>{{$students->name}}<h5>
                                              </td>
                                              <td>
                                                {{$students->familyname}}
                                              </td>
                                              <td>
                                                {{$students->givenname}}
                                              </td>
                                              <td>
                                                {{$students->label}} ( {{$students->code}} )
                                              </td>
                                              <td>
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a href="{{route('student-view', $students->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="voir"></i></a>
                                                      <a href="{{route('student-edit', $students->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="modifier" class="bx bx-edit"></i></a>

                                                      <a href="{{route('student-delete', $students->id)}}" role="button" class="text-danger" id="del_user_but" onclick="return confirm('Etes-vous sûre de vouloir supprimer cet utilisateur?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="supprimer"></i></a>

                                                  </div>
                                              </td>
                                            </tr>
                                          @endforeach



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>photo</th>
                                                <th>registration number</th>
                                                <th>School</th>
                                                <th>Familyname</th>
                                                <th>Givenname</th>
                                                <th>classroom</th>
                                                <th>actions</th>
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
        <!-- Student configuration table -->

      @else

        <!-- Student configuration table -->
        <section id="row-grouping">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of students or pupils</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">

                                </p>
                                <div class="table-responsive">
                                    <table class="table row-grouping">
                                        <thead>
                                            <tr>
                                                <th>photo</th>
                                                <th>registration number</th>
                                                <th>School</th>
                                                <th>Familyname</th>
                                                <th>Givenname</th>
                                                <th>classroom</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($student as $students)
                                            <tr>
                                              <td>
                                                <div class="avatar mr-1 avatar-lg">
                                                    @if($students->photo == NULL && $students->gender == false)
                                                      <img src="{{asset('images/mockup/man.jpg')}}" alt="avtar img holder">

                                                    @elseif($students->photo == NULL && $students->gender == true)
                                                      <img src="{{asset('images/mockup/woman.jpg')}}" alt="avtar img holder">
                                                    @else
                                                      <img src="{{asset($students->photo)}}" alt="avtar img holder">

                                                    @endif
                                                </div>
                                              </td>
                                              <td>
                                                {{$students->reg_number}}
                                              </td>
                                              <td>
                                                <h5>{{$students->label}} ( {{$students->code}} )</h5>
                                              </td>
                                              <td>
                                                {{$students->familyname}}
                                              </td>
                                              <td>
                                                {{$students->givenname}}
                                              </td>
                                              <td>
                                                @if($students->is_oriented == false) OUI @else NON @endif
                                              </td>
                                              <td>
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a href="{{route('student-view', $students->id)}}" role="button" class="text-primary"><i data-toggle="tooltip" data-placement="right" class='bx bx-show-alt' title="voir"></i></a>
                                                      <a href="{{route('student-edit', $students->id)}}" role="button" class="text-secondary editer"><i data-toggle="tooltip" data-placement="right" title="modifier" class="bx bx-edit"></i></a>
                                                      <a href="{{route('student-delete', $students->id)}}" role="button" class="text-danger" id="del_user_but" onclick="return confirm('Etes-vous sûre de vouloir supprimer cet utilisateur?');"><i data-toggle="tooltip" data-placement="right" class="bx bx-trash" title="supprimer"></i></a>

                                                  </div>
                                              </td>
                                            </tr>
                                          @endforeach



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>photo</th>
                                                <th>registration number</th>
                                                <th>School</th>
                                                <th>Familyname</th>
                                                <th>Givenname</th>
                                                <th>classroom</th>
                                                <th>actions</th>
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
        <!-- Student configuration table -->



      @endif

      <!-- all modal start -->

      <!--user add modal -->
              <div class="modal modal-primary fade text-left w-100" id="student_add_modal" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <form class="form" id="student-add-form" method="POST" action="{{route('student-add')}}" enctype="multipart/form-data" @submit="confCheck">
                  @csrf

                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title" style="color: white;" id="myModalLabel16"><i class="bx bx-add-to-queue"></i> Add a student or pupils</h4>
                        <button type="button" class="close bg-danger" style="color: white;" data-dismiss="modal" aria-label="Close">
                          <i class="bx bx-x"></i>
                        </button>
                      </div>
                      <div class="modal-body">

                         @include('main.students.students-add-form')

                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-light-secondary" >
                            Reset <i class='bx bx-eraser'></i>
                        </button>
                        <button type="submit" class="btn btn-primary" >
                          Add <i class='bx bx-send' ></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>

      <!-- all modal end -->

      {{-- ENGLISH VERSION --}}
  @endif
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/datatables/datatable.js')}}"></script>
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>


{{-- supermask.js cdn--}}
<script src="https://cdn.jsdelivr.net/npm/supermask-js@1.0.0/index.min.js"></script>




@endsection

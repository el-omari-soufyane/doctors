@extends('layout')

@section('page-title')
    Consultation of {{$patient->lname_pat.' '.$patient->fname_pat}}
@endsection

@section('content-page')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Patient Consultation</h4>
            <p class="card-category">Fill the blanks</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('consultation.store') }}">
                @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group filled">
                    <label class="bmd-label-floating">Fist Name </label>
                    <input name="fname" type="text" class="form-control" id="fname_pat" value="{{$patient->fname_pat}}" disabled>
                    <input type="text" name="patient_id" value="{{$patient->patient_id}}" style="display:none">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group bmd-form-group filled">
                    <label class="bmd-label-floating">Last Name </label>
                    <input name="lname" type="text" class="form-control" id="lname_pat" value="{{$patient->lname_pat}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Consultation Report <span style="color: red;">*</span></label>
                    <textarea class="form-control" name="consultation_report" rows="5" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Prescription</label>
                    <textarea class="form-control" name="consultation_prescript" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Next Visit</label>
                        <input name="next_consultation" type="text" class="form-control" id="next_consultation">
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Save Consultation</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="{{route('patients.show', ['patient' => $patient->patient_id])}}">
                @if (\Carbon\Carbon::parse($patient->birthday)->age < 18 && $patient->sexe_pat == 'Male')
                    <img id="patient_profile" class="img" src="{{asset('imgs/default/boy.png')}}">
                @elseif(\Carbon\Carbon::parse($patient->birthday)->age < 18 && $patient->sexe_pat == 'Female')
                    <img id="patient_profile" class="img" src="{{asset('imgs/default/girl.png')}}">
                @elseif(\Carbon\Carbon::parse($patient->birthday)->age >= 18 && $patient->sexe_pat == 'Male')
                    <img id="patient_profile" class="img" src="{{asset('imgs/default/male.png')}}">
                @elseif(\Carbon\Carbon::parse($patient->birthday)->age >= 18 && $patient->sexe_pat == 'Female')
                    <img id="patient_profile" class="img" src="{{asset('imgs/default/female.png')}}">
                @endif
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">{{$patient->lname_pat.' '.$patient->fname_pat}}</h4>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Last Visit : </h6>
                <h5 id="card_cin" style="margin: auto">{{$last_visit}}</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">CIN : </h6>
                <h5 id="card_cin" style="margin: auto">{{$patient->cin_pat != NULL ? $patient->cin_pat : 'Not Available'}}</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Age : </h6>
                <h5 id="card_age" style="margin: auto">{{\Carbon\Carbon::parse($patient->birthday)->age}}</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Phone Number :</h6>
                <h5 id="card_phone" style="margin: auto">{{$patient->phone_pat}}</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Adresse :</h6>
                <h5 style="margin: auto">{{$patient->adresse_pat}}</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Insurance :</h6>
                <h5 id="card_insurance" style="margin: auto">{{($patient->insurance == 0) ? 'No' : 'Yes'}}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    <!--   Core JS Files   -->
    <script src="{{asset("js/core/jquery.min.js")}}"></script>
    <script src="{{asset("js/core/popper.min.js")}}"></script>
    <script src="{{asset("js/core/bootstrap-material-design.min.js")}}"></script>
    <script src="{{asset("js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{asset("js/plugins/bootstrap-datepicker.js")}}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{asset("js/plugins/jquery.dataTables.min.js")}}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{asset("js/plugins/fullcalendar.min.js")}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset("js/plugins/nouislider.min.js")}}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{asset("js/plugins/arrive.min.js")}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset("js/plugins/bootstrap-notify.js")}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset("js/material-dashboard.js?v=2.1.2")}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script>
        /* Initialise DatePicker */
        $("#next_consultation").datepicker({
          format: "yyyy-mm-dd"
        });
    </script>
@endsection
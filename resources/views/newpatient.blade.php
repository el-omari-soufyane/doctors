@extends('layout')

@section('page-title')
    New Patient - Administration Page
@endsection

@section('content-page')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add new patient</h4>
            <p class="card-category">Fill the blanks</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('patients.store') }}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Fist Name <span style="color: red;">*</span></label>
                    <input name="fname" type="text" class="form-control" id="fname_pat" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Last Name <span style="color: red;">*</span></label>
                    <input name="lname" type="text" class="form-control" id="lname_pat" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">CIN</label>
                    <input name="cin" type="text" class="form-control" id="cin_pat">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Phone Number <span style="color: red;">*</span></label>
                    <input name="phone" type="text" class="form-control" id="phone_pat" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Adress</label>
                    <input name="adresse" type="text" class="form-control" id="adrs_pat" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group is-focused">
                        <label class="bmd-label-floating">Birthday</label>
                        <input name="birth" type="text" class="form-control" id="birthpicker" required>
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">City</label>
                    <input name="city" type="text" class="form-control" id="city_pat">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group is-focused">
                    <label class="bmd-label-floating">Country</label>
                    <input name="country" type="text" class="form-control" id="country_pat" value="Morocco">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label" style="color: grey">
                          <input class="form-check-input" type="radio" name="sexe" id="sexe_male" value="male" required>
                          Male
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label" style="color: grey">
                          <input class="form-check-input" type="radio" name="sexe" id="sexe_female" value="female" required>
                          Female
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label>Medical insurance ? </label>
                      <div class="togglebutton" style="display: inline">
                        <label>
                          <input name="insurance" id="insurance_pat" type="checkbox">
                          <span class="toggle"></span>
                        </label>
                      </div>
                    </div>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Add Patient</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
            <img id="patient_profile" class="img" src="{{asset("imgs/default/male.png")}}">
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title"><span id="card_lname"></span> <span id="card_fname"></span></h4>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">CIN : </h6>
                <h5 id="card_cin" style="margin: auto"></h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Age : </h6>
                <h5 id="card_age" style="margin: auto"></h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Phone Number :</h6>
                <h5 id="card_phone" style="margin: auto">+212 000 00 00 00</h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Adresse :</h6>
                <h5 style="margin: auto"><span id="card_adrs"></span><span id="card_city"></span></h5>
            </div>
            <div class="card-infos">
                <h6 class="card-category text-gray" style="text-align: left">Insurance :</h6>
                <h5 id="card_insurance" style="margin: auto">No</h5>
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
        $("#birthpicker").datepicker({
          format: "yyyy-mm-dd"
        });

        /* Calculate Age */
        function calculate_age(dob) { 
            var diff_ms = Date.now() - dob.getTime();
            var age_dt = new Date(diff_ms); 
        
            return Math.abs(age_dt.getUTCFullYear() - 1970);
        }
        /* Smooth Card */
        $("#cin_pat").keyup(function() {
            $("#card_cin").text(this.value.toUpperCase());
        });

        $("#adrs_pat").keyup(function() {
            $("#card_adrs").text(this.value);
        });

        $("#city_pat").keyup(function() {
            $("#card_city").text(", " + this.value[0].toUpperCase() + this.value.slice(1));
        });

        $("#fname_pat").keyup(function() {
            $("#card_fname").text(this.value[0].toUpperCase() + this.value.slice(1));
        });

        $("#lname_pat").keyup(function() {
            $("#card_lname").text(this.value.toUpperCase());
        });

        $("#phone_pat").keyup(function() {
            $("#card_phone").text(this.value);
        });

        $("#birthpicker").change(function() {
            dob = new Date(this.value);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#card_age").text((isNaN(age) ? "" : age)+" Years Old");
            var sexe = "";
            if($('#sexe_male').is(':checked')) 
                sexe = "male";
            else if($('#sexe_female').is(':checked'))
                sexe = "female";
            if(age < 18 && sexe == "male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/boy.png')}}");
            else if(age < 18 && sexe == "female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/girl.png')}}");
            else if(age >= 18 && sexe == "male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/male.png')}}");
            else if(age >= 18 && sexe == "female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/women.png')}}");

        });

        $("#insurance_pat").click(function() {
            if($(this).is(":checked"))
                $("#card_insurance").text("Yes");
            else
                $("#card_insurance").text("No");
        });

    </script>
@endsection
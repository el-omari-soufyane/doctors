@extends('layout')

@section('additional-style')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('page-title')
    Patient - {{ $patient->lname_pat.' '.$patient->fname_pat }}
@endsection

@section('content-page')
<div class="row"> 
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="side-bar"> 
        
        <!-- Professional Details -->
        <h5 class="tittle">Patient</h5>
        <img src="" id="patient_profile" class="rounded img-fluid" alt="">
        <ul class="personal-info">
          <li>
            <p> <span> First Name</span> {{ $patient->fname_pat }}</p>
          </li>
          <li>
            <p> <span> Last Name</span> {{ $patient->lname_pat }}</p>
          </li>
          <li>
            <p> <span> Birthday</span> {{ $patient->birthday }} </p>
          </li>
          <li>
            <p><span> Sexe</span> {{ $patient->sexe_pat }}</p>
          </li>
          <li>
            <p> <span> Adresse</span> {{ $patient->adresse_pat }} </p>
          </li>
          <li>
            <p> <span> Phone</span> {{ $patient->phone_pat }} </p>
          </li>
        </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="inside-sec"> 
            <!-- BIO AND SKILLS -->
            <h5 class="tittle">About - {{ $patient->lname_pat.' '.$patient->fname_pat }}</h5>
            
            <!-- Blog -->
            <section class="about-me padding-top-10"> 
              
              <!-- Personal Info -->
              <ul class="personal-info">
                <li>
                  <p> <span> Name</span> {{ $patient->lname_pat.' '.$patient->fname_pat }} </p>
                </li>
                <li>
                  <p> <span> Sexe</span> {{ $patient->sexe_pat}} </p>
                </li>
                <li>
                    <p><span>Birthday</span> {{ $patient->birthday}} </p>
                </li>
                <li>
                    <p><span>Phone</span> {{ $patient->phone_pat}} </p>
                </li>
                <li>
                  <p> <span> Adresse</span> {{ $patient->adresse_pat}} </p>
                </li>
                <li>
                  <p> <span> Age</span> {{\Carbon\Carbon::parse($patient->birthday)->age}} Years </p>
                </li>
                <li>
                  <p> <span> Consultations</span> {{ $consultations }} </p>
                </li>
              </ul>
              
              <!-- Patient's Medical Files -->
              <h5 class="tittle">Medical Files</h5>
              <div class="medical-files">
                <ul class="list-files">
                  @forelse ($medicalFiles as $file)
                      <li data-toggle="modal" data-target="#myModal" onclick="getPatient({{$file->consultation_id}})">
                        <i class="fa fa-file-medical-alt"></i> 
                        Consultation in : {{$file->created_at->toDateString()}}
                      </li>
                  @empty
                    <img src="{{asset('imgs/empty_data_set.png')}}" class="col-md-8" style="margin-left: 6rem;">
                  @endforelse
                </ul>
              </div>
            </section>
          </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus-circle"></i> Consultation Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
          </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                      <h4 class="card-title">Consultation in : <span id="consult_date"></span></h4>
                      <div class="card-infos">
                          <h6 class="card-category text-gray" style="text-align: left">Patient Name : </h6>
                          <h5 id="card_name" style="margin: auto"></h5>
                      </div>
                      <div class="card-infos">
                        <h6 class="card-category text-gray" style="text-align: left">Report : </h6>
                        <h5 id="card_report" style="margin: auto"></h5>
                      </div>
                      <div class="card-infos">
                        <h6 class="card-category text-gray" style="text-align: left">Prescription : </h6>
                        <h5 id="card_prescript" style="margin: auto"></h5>
                      </div>
                    </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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
    <script src="{{asset("js/plugins/jPages.js")}}"></script>
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
        $(document).ready(function() {
            var obj = @json($patient);
            var sexe = obj.sexe_pat;
            var today = new Date();
            var age = Math.floor((today-(new Date(obj.birthday))) / (365.25 * 24 * 60 * 60 * 1000));
            if(age < 18 && sexe == "Male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/boy.png')}}");
            else if(age < 18 && sexe == "Female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/girl.png')}}");
            else if(age >= 18 && sexe == "Male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/male.png')}}");
            else if(age >= 18 && sexe == "Female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/women.png')}}");
        });
    </script>
    <script>
      var Consult = @json($medicalFiles);
      function getPatient(id)
      {
        var patient;
          for(var i=0; i<Consult.length; i++)
          {
            if(Consult[i].consultation_id == id) {
              patient = Consult[i];
              break;
            }
          }
          riseConsult(patient);
      }
      function riseConsult(object)
      {
          $("#consult_date").text(object.created_at);
          //$("#card_name").text(object.lname_pat+" "+object.fname_pat);
          $("#card_report").text(object.consultation_report);
          $("#card_prescript").text(object.consultation_prescript);
      }
    </script>
@endsection
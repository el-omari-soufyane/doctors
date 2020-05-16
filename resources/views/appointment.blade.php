@extends('layout')

@section('page-title')
    Appointment - Administration Page
@endsection

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-left: auto">
                <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus-circle" style="margin-right: 5px"></i> Add Appointment
                </button>
            </div>
            @if($appointments->count() == 0)
                <img src="{{asset('imgs/empty_data_set.png')}}" class="col-md-8" style="margin-left: 10rem;">
            @else
                <table id="appointments" class="display" width="100%">
                    <thead>
                        <tr>
                            <th><i class="fa fa-sort-numeric-down"></i> N° Order</th>
                            <th><i class="fa fa-user-injured"></i> Patient Name</th>
                            <th><i class="fa fa-heartbeat"></i> Consulations</th>
                            <th><i class="fa fa-calendar-week"></i> Date of Consultation</th>
                            <th><i class="fa fa-clipboard-check"></i> Status</th>
                            <th><i class="fas fa-edit"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{$order++}}</td>
                        <td>{{$appointment->patient->lname_pat.' '.$appointment->patient->fname_pat}}</td>
                        <td>{{$appointment->patient->consultations->count() }}</td>
                        <td>{{$appointment->appointment_date}}</td>
                        <td>
                        @if(in_array($appointment->appointment_id, $late))
                            <span class="badge badge-pill badge-danger">Not in time</span>
                        @else 
                            @if ($appointment->appointment_status == true)
                                <span class="badge badge-pill badge-success">Checked</span>
                            @else
                                <span class="badge badge-pill badge-warning">Not Checked</span>
                            @endif
                        @endif
                        </td> 
                        <td>
                        @if ($appointment->appointment_status == false)
                            <button class="btn btn-success" style="padding: 6px 10px;">
                                <a style="color: #fff" href="{{route('appointment.edit', ['appointment' => $appointment->appointment_id])}}">
                                    <i class="fa fa-check"></i> Check</a>
                                <div class="ripple-container"></div>
                            </button>
                            <button class="btn btn-danger" style="padding: 6px 10px;">
                                <a style="color: #fff" href="{{route('appointment.edit', ['appointment' => $appointment->appointment_id])}}">
                                    <i class="fa fa-check"></i> Cancel</a>
                                <div class="ripple-container"></div>
                            </button>
                        @else
                            No Action 
                        @endif
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <form method="POST" action="{{ route('appointment.store') }}">
        @csrf
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus-circle"></i> Set new appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Patient's Name <span style="color: red;">*</span></label>
                            <input name="name" type="text" class="form-control" id="name_pat" 
                            onkeyup="findPatient()" autocomplete="off" required>
                            <input id="patient_id" type="hidden" name="patient_id" value="">
                            <input id="appointment_date" type="hidden" name="appointment_date" value="">
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">Your Order : 5</label>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="popover fade bs-popover-bottom show" role="tooltip" id="patientsPop" 
                            style="display: none;" x-placement="bottom">
                                <div class="arrow" style="left: 125px;"></div>
                                <h3 class="popover-header">Tape Patient's Name</h3>
                                <div class="popover-body"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2rem">
                        <div class="col-md-12">
                            <div class="card card-profile" style="margin-bottom: 0">
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
            <div class="modal-footer">
              <button type="submit" class="btn btn-link">Set Appointment</button>
              <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </form>
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
        var _patientObj = {};
        $(document).ready(function() {
            $('#appointments').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
            } );
            var targetDiv = document.getElementById("appointments_wrapper").getElementsByClassName("row")[0];
            targetDiv.classList.add("card-header");
            targetDiv.classList.add("card-header-primary-tab");
        } );

        $("#name_pat").focus(function() {
            $("#patientsPop").fadeIn(350);
        });

        $("#name_pat").blur(function() {
            $("#patientsPop").fadeOut(350);
        });

        function getPatient(object)
        {
            _patientObj = object;
            console.log(_patientObj);
        }
        function format(object)
        {
            return "<li id='"+object.patient_id+"' style='cursor: pointer' onclick='autocomplete("+object.patient_id+")'>\
                <i class='fa fa-user-injured'></i> "+object.fname_pat+" "+object.lname_pat+"</li>";
        }

        function findPatient() {
            var xhttp = new XMLHttpRequest();
            var route = "{{ route('patients.getpatient') }}";
            var params = "?name="+$("#name_pat").val();
            if($("#name_pat").val() == "")
                $(".popover-body").text("");
            else {
                xhttp.open("GET", route+params, true);
                xhttp.onreadystatechange = function() {
                    if(xhttp.readyState == 4 && xhttp.status == 200) {
                        $(".popover-body").text("");
                        var obj = JSON.parse(xhttp.response);
                        getPatient(obj);
                        if(obj.length == 0)
                            $(".popover-body").append("<i class='fa fa-exclamation-circle'></i> Not Found");
                        else {
                            $(".popover-body").append("<ul id='list_pat' style='list-style-type: none; margin: 0; padding: 0'></ul>");
                            for(var i=0; i<obj.length; i++)
                            {
                                $(".popover-body ul").append(format(obj[i]));
                            }
                        }
                    }
                }
                xhttp.send();
            }
        }

        function autocomplete(id) {
            var name = $("#list_pat li#"+id).text();
            var patient;
            var today = new Date();
            var age;
            $("#name_pat").val(id+" - "+name.trim());
            for(var i=0; i<_patientObj.length; i++)
            {
                if(_patientObj[i].patient_id == id) {
                    patient = _patientObj[i];
                    break;
                }
            }
            age = Math.floor((today-(new Date(patient.birthday))) / (365.25 * 24 * 60 * 60 * 1000));
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + "-" + mm + "-" + dd;
            $("#patient_id").val(patient.patient_id);
            $('#appointment_date').val(today);
            $("#card_cin").text((patient.cin_pat == "") ? "Not Available" : patient.cin_pat); 
            $("#card_fname").text(patient.fname_pat); $("#card_lname").text(patient.lname_pat);
            $("#card_phone").text(patient.phone_pat); $("#card_adrs").text(patient.adresse_pat);
            $("#card_age").text(age+" ans"); $("#card_insurance").text((patient.insurance == 1) ? "Yes" : "No"); 
            if(age < 18 && patient.sexe_pat == "Male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/boy.png')}}");
            else if(age < 18 && patient.sexe_pat == "Female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/girl.png')}}");
            else if(age >= 18 && patient.sexe_pat == "Male")
                $("#patient_profile").attr("src", "{{asset('imgs/default/male.png')}}");
            else if(age >= 18 && patient.sexe_pat == "Female")
                $("#patient_profile").attr("src", "{{asset('imgs/default/women.png')}}");
        }
    </script>
@endsection
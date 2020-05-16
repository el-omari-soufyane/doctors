@extends('layout')

@section('page-title')
    All Patients - Administration Page
@endsection

@section('content-page')
<div class="row">
    <div class="col-md-12">
            <table id="patients-tab" class="display" width="100%">
                <thead>
                    <tr>
                        <th><i class="fa fa-sort-numeric-up-alt"></i> ID</th>
                        <th><i class="fa fa-user-injured"></i> Patient Name</th>
                        <th><i class="fa fa-id-card"></i> CIN</th>
                        <th><i class="fa fa-phone-square-alt"></i> Phone Number</th>
                        <th><i class="fa fa-calendar-week"></i> Age</th>
                        <th><i class="fa fa-user-check"></i> Insurance</th>
                        <th><i class="fa fa-clock"></i> Since</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($patients as $patient)
                <tr data-patient='[{"fname": {{$patient->fname_pat}}}, {"lname" : {{$patient->lname_pat}}}]'>
                        <td>{{ $patient->patient_id }}</td>
                        <td><a href="{{ route('patients.show', [ 'patient' => $patient->patient_id]) }}">{{ $patient->lname_pat.' '.$patient->fname_pat }}</a></td>
                        <td>{{ ($patient->cin_pat == NULL) ? 'Inavailable' : $patient->cin_pat }}</td>
                        <td>{{ $patient->phone_pat }}</td>
                        <td>{{ \Carbon\Carbon::parse($patient->birthday)->age.' ans' }}</td>
                        <td>{{ ($patient->insurance == true) ? 'Yes' : 'No' }}</td>
                        <td>{{ $patient->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
    <script src="{{asset("js/plugins/bootstrap-datetimepicker.min.js")}}"></script>
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
        function format(patient)
        {
            console.log(patient.lname);
            return '<div class="col-md-4">\
                        <div class="card card-profile">\
                          <div class="card-avatar">\
                            <a href="javascript:;">\
                            <img id="patient_profile" class="img" src="{{asset("imgs/default/male.png")}}">\
                            </a>\
                          </div>\
                          <div class="card-body">\
                            <h4 class="card-title"><span id="card_lname">'+patient.lname+'</span> <span id="card_fname">'+patient.fname+'</span></h4>\
                            <div class="card-infos">\
                                <h6 class="card-category text-gray" style="text-align: left">CIN : </h6>\
                                <h5 id="card_cin" style="margin: auto">'+patient.fname+'</h5>\
                            </div>\
                            <div class="card-infos">\
                                <h6 class="card-category text-gray" style="text-align: left">Age : </h6>\
                                <h5 id="card_age" style="margin: auto"></h5>\
                            </div>\
                            <div class="card-infos">\
                                <h6 class="card-category text-gray" style="text-align: left">Phone Number :</h6>\
                                <h5 id="card_phone" style="margin: auto">+212 000 00 00 00</h5>\
                            </div>\
                            <div class="card-infos">\
                                <h6 class="card-category text-gray" style="text-align: left">Adresse :</h6>\
                                <h5 style="margin: auto"><span id="card_adrs"></span><span id="card_city"></span></h5>\
                            </div>\
                            <div class="card-infos">\
                                <h6 class="card-category text-gray" style="text-align: left">Insurance :</h6>\
                                <h5 id="card_insurance" style="margin: auto">No</h5>\
                            </div>\
                          </div>\
                        </div>\
                    </div>';
        }
        $(document).ready(function() {
            var table = $('#patients-tab').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
            } );
            var targetDiv = document.getElementById("patients-tab_wrapper").getElementsByClassName("row")[0];
            targetDiv.classList.add("card-header");
            targetDiv.classList.add("card-header-primary-tab");
        });

    </script>
@endsection
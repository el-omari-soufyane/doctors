@extends('layout')

@section('page-title')
    Dashboard - Administration Page
@endsection

@section('content-page')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <i class="fa fa-user-injured"></i>
            </div>
            <p class="card-category">Total Patients</p>
            <h3 class="card-title">{{$patients}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">explore</i>
            <a href="{{ url("/patients") }}">Get all patients table</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="fa fa-dollar-sign"></i>
            </div>
            <p class="card-category">Revenue (Dhs)</p>
            <h3 class="card-title">{{$monthRevenue}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> This month
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-heartbeat"></i>
            </div>
            <p class="card-category">Consultations</p>
            <h3 class="card-title">{{$todayConsultation}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i>  {{\Carbon\Carbon::now()->toFormattedDateString()}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-success">
            <canvas id="daily-patients" width="400" height="400"></canvas>
          </div>
          <div class="card-body">
            <h4 class="card-title">Daily Consultations</h4>
            <p class="card-category">
            @if ($dailyStats > 0)
              <span class="text-success">
                <i class="fa fa-long-arrow-up"></i> {{$dailyStats}}% 
              </span> increase in today patients.
            @elseif($dailyStats < 0)
              <span class="text-danger">
                <i class="fa fa-long-arrow-down"></i> {{$dailyStats}}% 
              </span> decrease in today patients.
            @else 
              {{$dailyStats}}
            @endif
            </p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> updated 4 minutes ago
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-warning">
            <canvas id="monthly-revenue" width="400" height="400"></canvas>
          </div>
          <div class="card-body">
            <h4 class="card-title">Monthly revenue</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> Updated last month
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-danger">
            <canvas id="myChart" width="400" height="400"></canvas>
          </div>
          <div class="card-body">
            <h4 class="card-title">Monthly Consultations</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> updated 4 min ago
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Patients' Consultations</h4>
                <p class="card-category"> Today consultations table</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr><th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Consultation Type
                      </th>
                      <th>
                        Amount
                      </th>
                    </tr></thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          El Maalmi Billal
                        </td>
                        <td>
                          Control
                        </td>
                        <td class="text-primary">
                          200 Dhs
                        </td>
                      </tr>
                      <tr>
                        <td>
                          12
                        </td>
                        <td>
                          El Omari Soufyane
                        </td>
                        <td>
                          1st Consultation
                        </td>
                        <td class="text-primary">
                          300 Dhs
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
        <!-- Plugin for the momentJs  -->
        <script src="{{asset("js/plugins/moment.min.js")}}"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{asset("js/plugins/sweetalert2.js")}}"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{asset("js/plugins/jquery.validate.min.js")}}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{asset("js/plugins/jquery.bootstrap-wizard.js")}}"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{asset("js/plugins/bootstrap-selectpicker.js")}}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{asset("js/plugins/bootstrap-datetimepicker.min.js")}}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{asset("js/plugins/jquery.dataTables.min.js")}}"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{asset("js/plugins/bootstrap-tagsinput.js")}}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{asset("js/plugins/jasny-bootstrap.min.js")}}"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{asset("js/plugins/fullcalendar.min.js")}}"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{asset("js/plugins/jquery-jvectormap.js")}}"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{asset("js/plugins/nouislider.min.js")}}"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{asset("js/plugins/arrive.min.js")}}"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!--  Notifications Plugin    -->
        <script src="{{asset("js/plugins/bootstrap-notify.js")}}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{asset("js/material-dashboard.js?v=2.1.2")}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            /* Monthly Consultations */
            var ctx = document.getElementById('myChart');
            var monthConsult = @json($yearConsultation);
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                    'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Monthly Consultations',
                        data: [monthConsult[0], monthConsult[1], monthConsult[2], monthConsult[3],
                        monthConsult[4], monthConsult[5], monthConsult[6], monthConsult[7], monthConsult[8],
                        monthConsult[9], monthConsult[10], monthConsult[11]],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true
                            }
                        }],
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#fff'
                        }
                    }
                }
            });

            /* Monthly Revenue Chart */
            var ctRevenue = document.getElementById('monthly-revenue');
            var monthStats = @json($yearRevenue);
            var revenueChart = new Chart(ctRevenue, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                    'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Monthly Revenue (Dhs) ',
                        data: [monthStats[0], monthStats[1], monthStats[2], monthStats[3], monthStats[4], monthStats[5],
                        monthStats[6], monthStats[7], monthStats[8], monthStats[9], monthStats[10], monthStats[11]],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true
                            }
                        }],
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#fff'
                        }
                    }
                }
            });
            
            /* Daily Patients Chart */
            var ctPatients = document.getElementById('daily-patients');
            var stats = @json($weekConsultation);
            var patientsChart = new Chart(ctPatients, {
                type: 'line',
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    datasets: [{
                        label: 'Daily Patients ',
                        data: [stats[0], stats[1], stats[2], stats[3], stats[4], stats[5]],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    elements: {
                        line: {
                            tension: 0
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true,
                                stepSize: 3,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff',
                                beginAtZero: true
                            }
                        }],
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#fff'
                        }
                    }
                }
            });
        </script>
@endsection
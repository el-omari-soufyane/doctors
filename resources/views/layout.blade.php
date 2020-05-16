<!--
=========================================================
Medical Dashboard - v1.0
=========================================================
Coded by : EL OMARI SOUFYANE & EL MAALMI BILLAL
=========================================================
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('page-title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <script src="https://kit.fontawesome.com/ae28ac79bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset("css/datepicker.css")}}">
    <!-- CSS Files -->
    <link href="{{asset("css/material-dashboard.css?v=2.1.2")}}" rel="stylesheet" />
    @yield('additional-style')
    <link rel="stylesheet" href="{{asset("css/dashboard-datatables-css.css")}}">
  </head>
<body>
    <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset("imgs/sidebar-1.jpg")}}">
            <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
              Office Management
              </a></div>
            <div class="sidebar-wrapper">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('patients.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Patients Table</p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('patients.create') }}">
                    <i class="fa fa-user-plus"></i>
                    <p>Add Patient</p>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('appointment.create') }}">
                    <i class="fa fa-user-md"></i>
                    <p>Set Appointment</p>
                  </a>
                </li>
              </ul>
            </div>
      </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                  <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                  <form class="navbar-form">
                    <div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div>
                  </form>
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="javascript:;">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                          Stats
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="d-lg-none d-md-block">
                          Some Actions
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                          Account
                        </p>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="content">

                @yield('content-page')
                <footer class="footer">
                    <div class="container-fluid">
                      <nav class="float-left">
                        <ul>
                          <li>
                            <a href="https://www.creative-tim.com">
                              Creative Tim
                            </a>
                          </li>
                          <li>
                            <a href="https://creative-tim.com/presentation">
                              About Us
                            </a>
                          </li>
                          <li>
                            <a href="http://blog.creative-tim.com">
                              Blog
                            </a>
                          </li>
                          <li>
                            <a href="https://www.creative-tim.com/license">
                              Licenses
                            </a>
                          </li>
                        </ul>
                      </nav>
                      <div class="copyright float-right">
                        ©
                        <script>
                          document.write(new Date().getFullYear())
                        </script>2020, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                      </div>
                    </div>
                  </footer>
            </div>
          </div>
        <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
              <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
              </a>
              <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                      <span class="badge filter badge-purple" data-color="purple"></span>
                      <span class="badge filter badge-azure" data-color="azure"></span>
                      <span class="badge filter badge-green" data-color="green"></span>
                      <span class="badge filter badge-warning" data-color="orange"></span>
                      <span class="badge filter badge-danger" data-color="danger"></span>
                      <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                  </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-2.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-4.jpg" alt="">
                  </a>
                </li>
                <li class="button-container">
                  <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
                </li>
                <!-- <li class="header-title">Want more components?</li>
                    <li class="button-container">
                        <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                          Get the pro version
                        </a>
                    </li> -->
                <li class="button-container">
                  <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                    View Documentation
                  </a>
                </li>
                <li class="button-container github-star">
                  <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                  <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                  <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                  <br>
                  <br>
                </li>
              </ul>
            </div>
    </div>
    @yield('scripts')
    <script>
      $(document).ready( function() {
          var path = window.location.pathname;
          console.log(path);
          var classes = document.getElementsByClassName("nav-item");
          if(path.includes("/home")) classes[0].classList.add("active");
          else if(path.includes("/create") && path.includes("/patients")) classes[2].classList.add("active");
          else if(path.includes("/patients")) classes[1].classList.add("active");
          else if(path.includes("/create") && path.includes("/appointment")) classes[3].classList.add("active");
      });
    </script>
</body>
</html>
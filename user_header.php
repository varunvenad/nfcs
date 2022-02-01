<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NFCS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/overlayscrollbars/css/OverlayScrollbars.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <!-- Sidebar Header    -->
      <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center">
          <h2 class="h5 text-white text-uppercase mb-0">NFCS</h2>
          <p class="text-sm mb-0 text-muted">Mezhathur</p>
        </div>
        <!-- Small Brand information, appears on minimized sidebar--> <a class="brand-small text-center" href="user_dashboard.php">
          <p class="h1 m-0">BD</p></a>
      </div>
      <!-- Sidebar Navigation Menus--><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
      <ul class="list-unstyled">                  
        <li class="sidebar-item"><a class="sidebar-link" href="sample.php"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#real-estate-1"> </use>
            </svg>View Profile </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="category.php"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1"> </use>
        </svg>View Items/Book </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="add_food_item.php"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1""> </use>
            </svg>View/Take packages </a></li>
        <!--<li class="sidebar-item"><a class="sidebar-link" href="add_packages.php"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#survey-1"> </use>
            </svg>Add Packages </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="tables.html"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg>Tables </a></li>-->
        <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>View/Use Offers </a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdown">
            <li><a class="sidebar-link" href="add_packages.php">Add packages</a></li>
            <li><a class="sidebar-link" href="#">View and Manage</a></li>
            <!--<li><a class="sidebar-link" href="#">Page</a></li>-->
          </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="add_offers.php"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#disable-1"> </use>
            </svg>Food Basket </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#!"> 
            <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
              <use xlink:href="#imac-screen-1"> </use>
            </svg>Demo
            <div class="badge bg-warning">6 New</div></a></li>
      </ul><span class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Second menu</span>
      <ul class="list-unstyled py-4">
        <li class="sidebar-item"> <a class="sidebar-link" href="#!"> 
            <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
              <use xlink:href="#chart-1"> </use>
            </svg>Demo</a></li>
        <li class="sidebar-item"> <a class="sidebar-link" href="">
            <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
              <use xlink:href="#imac-screen-1"> </use>
            </svg>Demo
            <div class="badge bg-info">Special</div></a></li>
        <li class="sidebar-item"> <a class="sidebar-link" href=""> 
            <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
              <use xlink:href="#quality-1"> </use>
            </svg>Demo</a></li>
        <li class="sidebar-item"> <a class="sidebar-link" href=""> 
            <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
              <use xlink:href="#security-shield-1"> </use>
            </svg>Demo</a></li>
      </ul>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center"><a class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn" href="#">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                    <use xlink:href="#menu-1"> </use>
                  </svg></a><a class="navbar-brand ms-2" href="user_dashboard.php">
                  <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span class="text-white fw-normal text-xs">USER</span><strong class="text-primary text-sm"> Dashboard</strong></div></a></div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown
                <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="notifications" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#chart-1"> </use>
                    </svg><span class="badge bg-warning">12</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="notifications">
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-blue">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#envelope-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have 6 new messages </span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-orange">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#checked-window-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server Rebooted</span><small class="small text-gray-600">8 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#!"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">10 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item all-notifications text-center" href="#!"> <strong class="text-xs text-gray-600">view all notifications                                            </strong></a></li>
                  </ul>
                </li>-->

                <!-- Messages dropdown
                <li class="nav-item dropdown"> <a class="nav-link text-white position-relative" id="messages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#envelope-1"> </use>
                    </svg><span class="badge bg-info">3</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="messages">
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-1.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                        </div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-2.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                        </div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#!"> <img class="img-fluid rounded-circle flex-shrink-0 avatar shadow-0" src="img/avatar-3.jpg" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small>
                          <p class="mb-0 small text-gray-600">3 days ago at 7:58 pm - 10.06.2014</p>
                        </div></a></li>
                    <li><a class="dropdown-item text-center" href="#!"> <strong class="text-xs text-gray-600">Read all messages       </strong></a></li>
                  </ul>
                </li>-->
                <!-- Languages dropdown 
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white text-sm" id="languages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block ms-2">English</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-sm-3 shadow-sm" aria-labelledby="languages">
                    <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span>German</span></a></li>
                    <li><a class="dropdown-item" rel="nofollow" href="#!"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span>French                                                         </span></a></li>
                  </ul>
                </li>-->
                <!-- Log out-->
                <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="log.php?out=1"> <span class="d-none d-sm-inline-block">Logout</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <?php
      if(isset($_GET['out']))
      {
        
      }
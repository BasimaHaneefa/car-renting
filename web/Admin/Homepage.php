<!DOCTYPE html>
<html lang="en">
  <head>
  <?php

include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

?>  
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CarRental Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../Assets/Template/Admin/assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Assets/Template/Admin/assets/images/favicon.png" />
  </head>
  <body>
 
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
             
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center"><?php echo $_SESSION["adname"] ?></span>
                <span class="text-secondary icon-sm text-center">Admin</span>
              </div>
            </a>
          </li>

          <li class="pt-2 pb-1">
            <span class="nav-item-head"> Pages</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Homepage.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-map-marker menu-icon"></i>
              <span class="menu-title">Location</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="District.php">District</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Place.php">Place</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-data" aria-expanded="false" aria-controls="ui-data">
              <i class="mdi mdi-cube menu-icon"></i>
              <span class="menu-title">Basic Datas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-data">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="Brand.php">Brand</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Seater.php">Seater</a>
                </li>
                
              </ul>
            </div>
        </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-ver" aria-expanded="false" aria-controls="ui-ver">
              <i class="mdi mdi-check-all menu-icon"></i>
              <span class="menu-title">Verification</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-ver">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="Agentverification.php">Agent verification</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Acceptedagency.php">Accepted</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rejectagency.php">Rejected</a>
                  </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-rep" aria-expanded="false" aria-controls="ui-rep">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-rep">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="AgencyBookingReport.php">Agency Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="CarbookingReport.php">Car Booking</a>
                </li>
                
              </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-fc" aria-expanded="false" aria-controls="ui-fc">
              <i class="mdi mdi-comment-text menu-icon"></i>
              <span class="menu-title">F&C</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-fc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="ViewuserComplaint.php">View Complaint</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ViewuserFeedback.php">View Feedback</a>
                </li>
                
              </ul>
            </div>
        </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../Assets/Template/Admin/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
           
            <ul class="navbar-nav navbar-nav-right">
             
              
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="Logout.php">
                  <i class="mdi mdi-logout"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            
           
            
            
            <!-- table row starts here -->
            <div class="row">
              
              <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
                <div class="card color-card-wrapper">
                  <div class="card-body">
                    <img class="img-fluid card-top-img w-100" src="../Assets/Template/Admin/assets/images/dashboard/img_5.jpg" alt="" />
                    <div class="d-flex flex-wrap justify-content-around color-card-outer">
                      <div class="col-6 p-0 mb-4">
                        <div class="color-card primary m-auto">
                          <i class="mdi mdi-amazon"></i>
                          <p class="font-weight-semibold mb-0">Agency</p>
                          <?php
                            $selAg="select COALESCE(count(agent_id),0) as ag from tbl_agent where agent_status=1";
                            $rowAg=$Conn->query($selAg);
                            $dataAg=$rowAg->fetch_assoc();


                          ?>
                          <span class="small"><?php echo $dataAg["ag"]  ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0 mb-4">
                        <div class="color-card bg-success m-auto">
                          <i class="mdi mdi-account"></i>
                          <p class="font-weight-semibold mb-0">Customer</p>
                          <?php
                            $selCu="select COALESCE(count(customer_id),0) as cu from tbl_customer ";
                            $rowCu=$Conn->query($selCu);
                            $dataCu=$rowCu->fetch_assoc();


                          ?>
                          <span class="small"><?php echo $dataCu["cu"]  ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0">
                        <div class="color-card bg-info m-auto">
                          <i class="mdi mdi-car"></i>
                          <p class="font-weight-semibold mb-0">Booking</p>
                          <?php
                            $selBk="select COALESCE(count(booking_id),0) as bk from tbl_booking where booking_status>0 ";
                            $rowBk=$Conn->query($selBk);
                            $dataBk=$rowBk->fetch_assoc();


                          ?>
                          <span class="small"><?php echo $dataBk["bk"] ?></span>
                        </div>
                      </div>
                      <div class="col-6 p-0">
                        <div class="color-card bg-danger m-auto">
                          <i class="mdi mdi-car-connected"></i>
                          <p class="font-weight-semibold mb-0">Cars</p>
                          <?php
                            $selCa="select COALESCE(count(car_id),0) as ca from tbl_car ";
                            $rowCa=$Conn->query($selCa);
                            $dataCa=$rowCa->fetch_assoc();


                          ?>
                          <span class="small"><?php echo $dataCa["ca"] ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
                
                
                
              </div>
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body pb-0">
                    <h4 class="card-title mb-0">Agency</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table custom-table text-dark">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Address</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $selQ="select *  from tbl_agent where agent_status=1";
                            $row=$Conn->query($selQ);
                            while($data=$row->fetch_assoc())
                                {

                          ?>
                          <tr>
                            <td>
                              <img src="../Assets/Files/Agent/<?php echo $data["agent_photo"] ?>" class="mr-2" alt="image" /><?php echo $data["agent_name"] ?></td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center"><?php echo $data["agent_contact"] ?></span>
                               
                              </div>
                            </td>
                            <td><?php echo $data["agent_email"] ?></td>
                            <td><?php echo $data["agent_address"] ?></td>
                            <?php
                                }
                            ?>
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                     </div>
                </div>
              </div>
            </div>
           
           
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            </div>

            <div>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"> Distributed By: <a href="https://themewagon.com/" target="_blank">Themewagon</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../Assets/Template/Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../Assets/Template/Admin/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/flot/jquery.flot.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../Assets/Template/Admin/assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../Assets/Template/Admin/assets/js/off-canvas.js"></script>
    <script src="../Assets/Template/Admin/assets/js/hoverable-collapse.js"></script>
    <script src="../Assets/Template/Admin/assets/js/misc.js"></script>
    <script src="../Assets/Template/Admin/assets/js/settings.js"></script>
    <script src="../Assets/Template/Admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../Assets/Template/Admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
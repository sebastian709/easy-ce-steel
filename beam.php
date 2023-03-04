<?php
session_start();
require 'db/connection.php';



if (isset($_POST['AJAXLocator']) || isset($_GET['AJAXLocator'])) {
  if (isset($_POST['AJAXLocator'])) {
    $locator = $_POST['AJAXLocator'];
  } else {
    $locator = $_GET['AJAXLocator'];
  }
  if ($locator == "searchBeam") {
    $BSx = $_POST['data'];

    $sql = "SELECT * FROM `beam_aisc` WHERE `Sx` > " . $BSx . " AND `Type` = 'w' ORDER BY `Sx` ASC LIMIT 3";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    while ($row = mysqli_fetch_assoc($result)) {
      $emparray[] = $row;
    }

    echo json_encode($emparray);
    exit;
  }
}


?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
  <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <link href="dist/css/style.min.css" rel="stylesheet" />
</head>

<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <a class="navbar-brand" href="index.html">
            <b class="logo-icon ps-2">
              <img src="assets/images/LightLogo.png" alt="homepage" class="light-logo" width="25" />
            </b>
            <span class="logo-text ms-2">
              Easy CE-Steel
            </span>
          </a><a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items afdsa-->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="assets/images/icon/gear.png" alt="user" class="rounded-circle" width="31" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i> My
                  Profile</a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i> My
                  Balance</a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Account
                  Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                <div class="dropdown-divider"></div>
                <div class="ps-4 p-10">
                  <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View Profile</a>
                </div> -->
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                <i class="fas fa-home"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="beam.php" aria-expanded="false">
                <img src="assets/images/icon/beam.png" alt="" class="px-2"><span class="hide-menu">Beam</span></a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <div class="page-wrapper">
      <!-- Bread crumb and right sidebar toggle -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Beam</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Beam
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Container fluid  -->
      <div class="container-fluid">
        <div class="row card">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="mt-3 ps-4 mt-5 mb-3">Title</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-10 form-group ps-5">
                <label for="">Dead Load:</label>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" id="BDL">
                  <span class="input-group-text">Kn/m</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-10 form-group ps-5">
                <label for="">Live Load:</label>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" id="BLL">
                  <span class="input-group-text">Kn/m</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-10 form-group ps-5">
                <label for="">Length:</label>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" id="BLength">
                  <span class="input-group-text">m</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-10 form-group ps-5">
                <label for="">Fy:</label>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" id="BFy">
                  <span class="input-group-text">Kn/m</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-10 form-group ps-5">
                <label for="">Final result</label>
                <input type="number" class="form-control d-inline" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-10 mb-5 ps-5">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Show other result
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                          <div class="col">
                            <h5>Other Results:</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label for="Wu">Wu</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" readonly id="BWu">
                              <span class="input-group-text">Kn/m</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label for="Wu">V</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" readonly id="BV">
                              <span class="input-group-text">Kn/m</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label for="Wu">M</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" readonly id="BM">
                              <span class="input-group-text">Kn/m</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label for="Wu">Fb</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" readonly id="BFb">
                              <span class="input-group-text">MPa</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col form-group">
                            <label for="Wu">Sx</label>
                            <div class="input-group mb-3">
                              <input type="number" class="form-control" readonly id="BSx">
                              <!-- <span class="input-group-text">MPa</span> -->
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <!-- Check 1 -->
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <h5>Test 1</h5>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col form-group">
                                <label for="">EDI</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" readonly id="BEdi1">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Check 2 -->
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <h5>Test 2</h5>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col form-group">
                                <label for="">EDI</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" readonly id="BEdi2">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Check 3 -->
                          <div class="col">
                            <div class="row">
                              <div class="col">
                                <h5>Test 3</h5>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col form-group">
                                <label for="">EDI</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" readonly id="BEdi3">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">

          </div>
        </div>
      </div>
      <footer class="footer text-center">
        © 2023 — <b>Easy CE-Steel</b>
      </footer>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/extra-libs/sparkline/sparkline.js"></script>
  <script src="dist/js/waves.js"></script>
  <script src="dist/js/sidebarmenu.js"></script>
  <script src="dist/js/custom.min.js"></script>
  <script src="assets/libs/flot/excanvas.js"></script>
  <script src="assets/libs/flot/jquery.flot.js"></script>
  <script src="assets/libs/flot/jquery.flot.pie.js"></script>
  <script src="assets/libs/flot/jquery.flot.time.js"></script>
  <script src="assets/libs/flot/jquery.flot.stack.js"></script>
  <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
  <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="dist/js/pages/chart/chart-page-init.js"></script>

  <script>
    var BSx;
    $('#BDL, #BLL, #BLength, #BFy').on('keyup', function () {
      BSx();
    });

    function BSx() {
      // Solving Wu
      var BDL = $('#BDL').val();
      var BLL = $('#BLL').val();

      var BWu = 1.2 * BDL + 1.6 * BLL;
      var new_Bwu = BWu.toFixed(2);
      $('#BWu').val(new_Bwu);

      // Solving V 
      var BLength = $('#BLength').val();
      var BV = (BWu * BLength) / 2;
      var new_BV = BV.toFixed(2);
      $('#BV').val(new_BV);

      // Solving M
      var BLengthEx = Math.pow(BLength, 2);
      var BM = (BWu * BLengthEx) / 8;
      var new_Bm = BM.toFixed(2);
      $('#BM').val(new_Bm);

      // Solving Fb
      var BFy = $('#BFy').val();
      var BFb = 0.60 * BFy;
      var new_BFb = BFb.toFixed(2);

      $('#BFb').val(new_BFb);

      var sixqrt = Math.pow(10, 6);
      var cuberoot = Math.pow(10, 3);
      var BSx = (BM * sixqrt) / BFb;
      var FBSx = BSx / cuberoot;
      var new_FBSx = FBSx.toFixed(3);

      $('#BSx').val(new_FBSx);

      getTrialSec(new_FBSx);
    }

    // producing tester
    function getTrialSec(DBSx) {
      var FBSx = DBSx;
      $.ajax({
        url: "beam.php",
        type: "POST",
        data: {
          data: FBSx,
          AJAXLocator: "searchBeam",
        },
        dataType: 'json',
        success: function (result) {
          console.log(result);
          // Fetching EDI
          $('#BEdi1').val(result[0]["EDI_Std_Nomenclature"]);
          $('#BEdi2').val(result[1]["EDI_Std_Nomenclature"]);
          $('#BEdi3').val(result[2]["EDI_Std_Nomenclature"]);
        }
      });
    }
  </script>

</body>

</html>
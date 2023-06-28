<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <x-app-layout>



        <!-- Page Wrapper -->
        <div id="wrapper">


            @include('partials.sidebar', [
                'data' => 'dashboard',
            ])
            <!-- Combined Dashboard Partials Start -->

            <!-- Combined Dashboard Partials End -->


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">



                    <br>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">



                        <!-- Content Row -->
                        <div class="row">


                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Earnings (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    P{{ number_format($monthy, 2) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Earnings (Annual)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    P{{ number_format($annual, 2) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Present Employee
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            {{ $present }}
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Today's Customer</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                        {{-- <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Yearly Income</h6>
                                        {{-- <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Total Sales</th>




                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>Total Sales</th>



                                                    </tr>
                                                </tfoot>
                                                <tbody>



                                                    @foreach ($year_sales as $yearly)
                                                        <tr>

                                                            <td>{{ $yearly->year }}</td>
                                                            <td>P{{ number_format($yearly->yearly_sales, 2) }}</td>


                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-12 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Customer Peak Sesson</h6>
                                    </div>
                                    <div class="card-body">

                                        <!--January -->
                                        <h4 class="small font-weight-bold">January <span
                                                class="float-right">{{ $monthly_percentage[0] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ $monthly_percentage[0] }}%" aria-valuenow="20"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--February -->
                                        <h4 class="small font-weight-bold">February <span
                                                class="float-right">{{ $monthly_percentage[1] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[1] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--March -->
                                        <h4 class="small font-weight-bold">March <span
                                                class="float-right">{{ $monthly_percentage[2] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $monthly_percentage[2] }}%" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <!--April -->
                                        <h4 class="small font-weight-bold">April <span
                                                class="float-right">{{ $monthly_percentage[3] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $monthly_percentage[3] }}%" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--May -->
                                        <h4 class="small font-weight-bold">May <span
                                                class="float-right">{{ $monthly_percentage[4] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[4] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--June -->
                                        <h4 class="small font-weight-bold">June <span
                                                class="float-right">{{ $monthly_percentage[5] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[5] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <!--July -->
                                        <h4 class="small font-weight-bold">July <span
                                                class="float-right">{{ $monthly_percentage[6] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[6] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>


                                        <!--August -->
                                        <h4 class="small font-weight-bold">August <span
                                                class="float-right">{{ $monthly_percentage[7] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[7] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <!--September -->
                                        <h4 class="small font-weight-bold">September <span
                                                class="float-right">{{ $monthly_percentage[8] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[8] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--October -->
                                        <h4 class="small font-weight-bold">October <span
                                                class="float-right">{{ $monthly_percentage[9] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[9] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <!--November -->
                                        <h4 class="small font-weight-bold">November <span
                                                class="float-right">{{ $monthly_percentage[10] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[10] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>


                                        <!--December -->
                                        <h4 class="small font-weight-bold">December <span
                                                class="float-right">{{ $monthly_percentage[11] }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $monthly_percentage[11] }}%" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>



                                    </div>
                                </div>



                            </div>



                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>






    </x-app-layout>

</body>

</html>

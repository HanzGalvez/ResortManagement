<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .form-group {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
        }

        .form-style {
            padding: 13px 20px;
            padding-left: 55px;
            height: 48px;
            width: 100%;
            font-weight: 500;
            border-radius: 4px;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            outline: none;
            color: black;
            background-color: whitesmoke;
            border: none;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            box-shadow: 0 4px 8px 0 rgba(21, 21, 21, .2);
        }
    </style>

</head>

<body id="page-top">

    <x-app-layout>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <?php include 'partials/staff_sidebar.php'; ?>

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-2 text-gray-800">ADD NEW ENTRANCE FEE</h1> -->


                        <form action="{{ route('trans.data') }}" method="post" style="width: 80%; margin-left: 110px"
                            enctype="multipart/form-data">

                            @csrf



                            <div class="row">
                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="text">Adult : </label>
                                        <input type="text" name="adult" class="form-style" id="adult"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="email">Children : </label>
                                        <input type="text" name="child" class="form-style" id="child"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-12">

                                    <label for="email">Cottages : </label>

                                    <div class="form-group">


                                        <div class="row">



                                            @foreach ($cottage as $cottage)
                                                <div class="col-sm-2">
                                                    <input type="checkbox" name="cottage[]" id="cottage[]"
                                                        data-name={{ $cottage->cottage_name }}
                                                        data-price={{ $cottage->price }}
                                                        value="{{ $cottage->cottage_id }}">
                                                    <label for="text">
                                                        {{ $cottage->cottage_name }}
                                                    </label>
                                                </div>
                                            @endforeach




                                        </div>



                                        {{-- <select name="cottage[]" class="form-style" id="cottage[]" multiple>


                                        <option value="admin" selected disabled>Select Cottage</option>

                                        @foreach ($cottage as $cottage)

                                            
                                            <option value="{{ $cottage->cottage_name }}">{{ $cottage->cottage_name }}
                                            </option>
                                        @endforeach
                                    </select> --}} <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="email">Additional Fee : </label>
                                        <input type="text" name="add" class="form-style" id="add"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                                <div class="col-sm-6">

                                    <br><br>

                                    <h3>Total: <span id="total"></span></h3>






                                </div>

                            </div>
                            <br>



                            <div class="row">

                                <div class="col-sm-12">


                                    <div class="form-group">

                                        <center>
                                            <button type="button" name="compute" id="compute"class="btn mt-4"
                                                style="width: 200px; background-color: darkblue; color:azure">Compute</button>
                                        </center>
                                    </div>





                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="text">Cash Tendered : </label>
                                        <input type="text" name="tendered" class="form-style" id="tendered"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="email">Change : </label>
                                        <input type="text" name="change" class="form-style" id="change"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                    </div>

                                    <!-- Hidden Total -->

                                    <input type="hidden" name="totalvalue" id="totalvalue">



                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">


                                    <div class="form-group">

                                        <center>
                                            <button type="submit" name="submit" class="btn mt-4"
                                                style="width: 200px; background-color: darkblue; color:azure">Done</button>
                                        </center>
                                    </div>





                                </div>
                            </div>



                        </form>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

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
        <script src="js/pos.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </x-app-layout>

</body>

</html>

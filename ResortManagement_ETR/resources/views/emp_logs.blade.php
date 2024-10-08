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

            <?php include 'partials/emp_sidebar.php'; ?>

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">ATTENDANCE LOGS</h1>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <td>Date</td>
                                                <td>Time In</td>
                                                <td>Time Out</td>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <td>Date</td>
                                                <td>Time In</td>
                                                <td>Time Out</td>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            @foreach ($attendance as $user_attendance)
                                                @php
                                                    
                                                    $date = substr($user_attendance->date, 0, 10);
                                                @endphp
                                                <tr>
                                                    <td>{{ $date }}</td>
                                                    <td>{{ date('h:i A', strtotime($user_attendance->time_in)) }}</td>
                                                    <td>{{ date('h:i A', strtotime($user_attendance->time_out)) }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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

        <!-- Edit Modal-->

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Entrance</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="/update_entrance" method="post">
                            {{ csrf_field() }}

                            <br>


                            <div class="row">
                                <div class="col-sm-6">


                                    <div class="form-group">

                                        <label for="text">Name: </label>

                                        <input type="hidden" id="type_id" name="type_id">

                                        <input type="text" name="type" class="form-style" id="type"
                                            autocomplete="off">
                                        @error('capacity')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="email">Fee : </label>

                                        <input type="text" name="fee" class="form-style" id="fee"
                                            autocomplete="off">
                                        <i class="input-icon uil uil-at"></i>
                                        @error('price')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>





                                </div>

                            </div>

                            <br>










                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button> </form>
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
        <script src="js/entrance.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    </x-app-layout>
</body>

</html>

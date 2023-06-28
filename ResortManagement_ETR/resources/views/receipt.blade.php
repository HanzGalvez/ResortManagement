<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Receipt</title>

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



            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <!-- <h1 class="h3 mb-2 text-gray-800">ADD NEW ENTRANCE FEE</h1> -->

                        <center>
                            <div class="card" style="width: 50%; height: auto">
                                <div class="card-body mx-4">
                                    <div class="container">
                                        <p class="my-5 mx-5" style="font-size: 30px;">Thank for your visit</p>
                                        <div class="row">
                                            <ul class="list-unstyled">

                                                <li class="text-black mt-1">{{ date('Y-m-d') }}</li>
                                            </ul>
                                            <hr>

                                        </div>

                                        <br>

                                        <div class="row">

                                            @php
                                                $adultSub = $adult * 100;
                                                $childSub = $child * 50;
                                                
                                            @endphp

                                            <div class="container">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th>Entity</th>
                                                            <th>Quantity</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Adult</td>
                                                            <td>{{ $adult }}</td>
                                                            <td>{{ number_format($adultSub, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Children</td>
                                                            <td>{{ $child }}</td>
                                                            <td>{{ number_format($childSub, 2) }}</td>
                                                        </tr>




                                                        @for ($i = 0; $i < count($cottage); $i++)


                                                            @for ($j = 0; $j < count($cottage_id); $j++)
                                                                @if ($cottage[$i]->cottage_id == $cottage_id[$j])
                                                                    <tr>
                                                                        <td>{{ $cottage[$i]->cottage_name }}</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>{{ number_format($cottage[$i]->price, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endfor
                                                        @endfor

                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <th>Total</th>
                                                            <th>{{ number_format($total, 2) }}</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>

                                        <div class="row">

                                            <div class="container">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>

                                                            <th>Cash Tendered</th>
                                                            <th>&nbsp;</th>
                                                            <th>{{ number_format($cash, 2) }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <tr>

                                                            <th>Change</th>
                                                            <th>&nbsp;</th>
                                                            <td>{{ $change }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>



                                        <a href="PointOfSale"><button type="button" name="compute"
                                                id="compute"class="btn mt-4"
                                                style="width: 200px; background-color: darkblue; color:azure">Done</button></a>

                                    </div>
                                </div>

                        </center>

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
        <script src="js/pos.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </x-app-layout>

</body>

</html>

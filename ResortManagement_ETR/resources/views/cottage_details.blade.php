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

            @include('partials.sidebar', [
                'data' => 'add_cottage',
            ])

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">



                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">COTTAGE DETAILS</h1>


                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Cottage</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="display: none">Cottage ID</th>
                                                <th>Cottage Name</th>
                                                <th>Capacity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th style="display: none">Cottage ID</th>
                                                <th>Cottage Name</th>
                                                <th>Capacity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>




                                            @foreach ($cottages as $cottage)
                                                <tr>
                                                    <td style="display: none">{{ $cottage->cottage_id }}</td>
                                                    <td>{{ $cottage->cottage_name }}</td>
                                                    <td>{{ $cottage->capacity }}</td>
                                                    <td>{{ $cottage->price }}</td>
                                                    <td>{{ $cottage->status }}</td>
                                                    <td>

                                                        <a><i class='fas fa-fw fa-pencil-alt editedit'
                                                                data-toggle="modal" data-target="#editModal"></i></a>
                                                        &nbsp;

                                                        <a onclick="return confirm('Are you sure?')"
                                                            href="/delete_cottage/{{ $cottage->cottage_id }}"> <i
                                                                class='fas fa-fw fa-trash-alt trashtrash'></i></a>
                                                        &nbsp;
                                                    </td>
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

        <!--  Modal-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Cottage</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="/update_cottage" method="post">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-sm-12">

                                    <input type="hidden" id="cottage_id" name="cottage_id">
                                    <div class="form-group">
                                        <label for="email">Cottage Name : </label>

                                        <input type="text" name="cottage" class="form-style" id="cottage"
                                            autocomplete="off">
                                        @error('cottage')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>



                            </div>
                            <br>


                            <div class="row">
                                <div class="col-sm-6">


                                    <div class="form-group">

                                        <label for="text">Capacity: </label>

                                        <input type="text" name="capacity" class="form-style" id="capacity"
                                            autocomplete="off">
                                        @error('capacity')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                        <i class="input-icon uil uil-at"></i>
                                    </div>





                                </div>

                                <div class="col-sm-6">


                                    <div class="form-group">
                                        <label for="email">Price : </label>

                                        <input type="text" name="price" class="form-style" id="price"
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
        <script src="js/cottage.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </x-app-layout>

</body>

</html>

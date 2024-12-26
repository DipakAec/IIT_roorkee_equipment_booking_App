<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IITR | EMS</title>
    <link rel="shortcut icon" href="https://iicbooking.iitr.ac.in/admin_asset/img/favicon.png">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/animate.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/style.css" rel="stylesheet">
    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/jquery-3.1.1.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://iicbooking.iitr.ac.in/admin_asset/DataTables/datatables.min.css" />
    <script type="text/javascript" src="https://iicbooking.iitr.ac.in/admin_asset/DataTables/datatables.min.js"></script>

    <script>
        var base_url = "https://estihomebidder.com/";
    </script>
    <style>
        .show {
            display: inline-block;
        }

        .hide {
            display: none;
        }

        .pro-pic {
            background: url(../admin_asset/img/gallery/getimagelogo.webp) no-repeat 0 0);
            background-size: contain;
            width: 20px;
            height: 20px;
            position: absolute;
            top: 50%;
            z-index: 111;
            left: 50%;
            cursor: pointer;
            transform: translate(-50%, 10px);
        }
    </style>
</head>
<body>
    
    
    
      @include('user.layout.sidebar');
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
       @yield('section')
        <!-- End of Content Wrapper -->

<div class="footer">
    <div>
        <strong>Copyright</strong> IITR-EMS &copy; 2024 </div>
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<!-- Mainly scripts -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/popper.min.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/bootstrap.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Peity -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/peity/jquery.peity.min.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/inspinia.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Jvectormap -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- EayPIE -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/easypiechart/jquery.easypiechart.js"></script>

<!-- Sparkline -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/demo/sparkline-demo.js"></script>

<!-- data table -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<!-- Toastr script -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/toastr/toastr.min.js"></script>

<!-- Switchery -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/switchery/switchery.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script> -->

<!-- DROPZONE -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/dropzone/dropzone.js"></script>
<!-- checkbox -->
<script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/iCheck/icheck.min.js"></script>

<script>
    $(document).on('click', '.delete', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var table = $(this).attr('data-table');
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "https://iicbooking.iitr.ac.in/admin/delete_data",
                    method: "POST",
                    data: {
                        table: table,
                        id: id
                    },
                    dataType: 'json',
                    success: function (res) {

                        if (res.status == 'success') {
                            $('#row' + id).remove();

                        }
                        Swal.fire(
                                'Deleted!',
                                res.message,
                                res.status
                                )

                    }
                })
            }
        })

    });
</script>

</body>

</html>
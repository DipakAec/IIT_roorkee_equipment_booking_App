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

    
    
    
    
    
    
    
    <script>
    $(document).ready(function () {

        $('#dashboard').attr('class', 'active');
//
//            $('.chart').easyPieChart({
//                barColor: '#f8ac59',
////                scaleColor: false,
//                scaleLength: 5,
//                lineWidth: 4,
//                size: 80
//            });
//
//            $('.chart2').easyPieChart({
//                barColor: '#1c84c6',
////                scaleColor: false,
//                scaleLength: 5,
//                lineWidth: 4,
//                size: 80
//            });

//            var data2 = [
//                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
//                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
//                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
//                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
//                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
//                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
//                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
//                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
//            ];
//
//            var data3 = [
//                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
//                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
//                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
//                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
//                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
//                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
//                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
//                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
//            ];
//
//
//            var dataset = [
//                {
//                    label: "Number of orders",
//                    data: data3,
//                    color: "#1ab394",
//                    bars: {
//                        show: true,
//                        align: "center",
//                        barWidth: 24 * 60 * 60 * 600,
//                        lineWidth:0
//                    }
//
//                }, {
//                    label: "Payments",
//                    data: data2,
//                    yaxis: 2,
//                    color: "#1C84C6",
//                    lines: {
//                        lineWidth:1,
//                            show: true,
//                            fill: true,
//                        fillColor: {
//                            colors: [{
//                                opacity: 0.2
//                            }, {
//                                opacity: 0.4
//                            }]
//                        }
//                    },
//                    splines: {
//                        show: false,
//                        tension: 0.6,
//                        lineWidth: 1,
//                        fill: 0.1
//                    },
//                }
//            ];
//
//
//            var options = {
//                xaxis: {
//                    mode: "time",
//                    tickSize: [3, "day"],
//                    tickLength: 0,
//                    axisLabel: "Date",
//                    axisLabelUseCanvas: true,
//                    axisLabelFontSizePixels: 12,
//                    axisLabelFontFamily: 'Arial',
//                    axisLabelPadding: 10,
//                    color: "#d5d5d5"
//                },
//                yaxes: [{
//                    position: "left",
//                    max: 1070,
//                    color: "#d5d5d5",
//                    axisLabelUseCanvas: true,
//                    axisLabelFontSizePixels: 12,
//                    axisLabelFontFamily: 'Arial',
//                    axisLabelPadding: 3
//                }, {
//                    position: "right",
//                    clolor: "#d5d5d5",
//                    axisLabelUseCanvas: true,
//                    axisLabelFontSizePixels: 12,
//                    axisLabelFontFamily: ' Arial',
//                    axisLabelPadding: 67
//                }
//                ],
//                legend: {
//                    noColumns: 1,
//                    labelBoxBorderColor: "#000000",
//                    position: "nw"
//                },
//                grid: {
//                    hoverable: false,
//                    borderWidth: 0
//                }
//            };
//
//            function gd(year, month, day) {
//                return new Date(year, month - 1, day).getTime();
//            }
//
//            var previousPoint = null, previousLabel = null;
//
//            $.plot($("#flot-dashboard-chart"), dataset, options);
//
//            var mapData = {
//                "US": 298,
//                "SA": 200,
//                "DE": 220,
//                "FR": 540,
//                "CN": 120,
//                "AU": 760,
//                "BR": 550,
//                "IN": 200,
//                "GB": 120,
//            };
//
//            $('#world-map').vectorMap({
//                map: 'world_mill_en',
//                backgroundColor: "transparent",
//                regionStyle: {
//                    initial: {
//                        fill: '#e4e4e4',
//                        "fill-opacity": 0.9,
//                        stroke: 'none',
//                        "stroke-width": 0,
//                        "stroke-opacity": 0
//                    }
//                },
//
//                series: {
//                    regions: [{
//                        values: mapData,
//                        scale: ["#1ab394", "#22d6b1"],
//                        normalizeFunction: 'polynomial'
//                    }]
//                },
//            });
    });
</script><!-- start footer -->
<div class="footer">
    <div>
        <strong>Copyright</strong> IITR-EMS &copy; 2024    </div>
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
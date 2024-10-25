<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IITR-EMS</title>

    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/animate.css" rel="stylesheet">
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/style.css" rel="stylesheet">

    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/jquery-3.1.1.min.js"></script>

    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- switcher -->
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/switchery/switchery.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">

    <!--dropzone css-->
    <link href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!--checkbox css-->
    <link
        href="https://iicbooking.iitr.ac.in/admin_asset/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css"
        rel="stylesheet">
    <!-- ajax datatable -->
    <script type="text/javascript" src="https://iicbooking.iitr.ac.in/admin_asset/DataTables/datatables.min.js">
    </script>

    <script>
        var base_url = "https://iicbooking.iitr.ac.in/";
    </script>
</head>

<body>
    <div class="container">
        <style type="text/css">
            .hide {
                display: none;
            }

            .show {
                display: block;
            }

            .container {
                padding-top: 50px;
                margin: auto;
            }
            .message {
                margin-top: 5px;
                font-size: 14px;
                border: none;
            }
            .valid {
                color: rgb(73, 237, 52);
            }
            .invalid {
                color: rgb(241, 53, 40);
            }
        </style>
        <a href="https://estihomebidder.com/" style="color: #fff">
            <h3>Home</h3>
        </a>
        <style>
            span.required {
                color: red !important;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="wrapper wrapper-content animated fadeIn">
                        <form role="form" action="{{ route('register.create') }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            <div class="row">
 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="name_label">Student Name <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter Name" class="form-control" name="name"
                                            value="" required>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="email_label">Student Email <span class="required">*</span></label>
                                        <input type="email" placeholder="Enter Email" class="form-control" name="email"
                                            id="student_email" value="" required>
                                        <div id="email_error" style="color: red; display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" id="password" placeholder="Enter Password" class="form-control" name="password" required>
                                        <div id="message" class="message"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Enrollment Number <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter enrollment number" class="form-control"
                                            name="emp_id" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Department <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter Student Department" class="form-control"
                                            name="department" value="">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" placeholder="Enter Mobile number" class="form-control" 
                                            name="phone" id="student_phone" maxlength="10" required>
                                        <div id="phone_error" style="color: red; display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enrolled Program</label>
                                        <select class="form-control" name="program_id" id="student_program_id">
                                            <option value="B.Tech">B.Tech</option>
                                            <option value="Ph.D">Ph.D</option>
                                            <option value="Post Doc">Post Doc</option>
                                            <option value="others">Others</option>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="supervisor_Section row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="supervisorname" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Department <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="supervisor_dept"
                                            id="supervisor_dept" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="supervisor_email"
                                            id="supervisor_email" required>
                                    </div>
                                </div>

                            </div>


                            
                            <button class="btn btn-lg btn-success float-right m-t-n-xs" type="submit" id="student_submit">
                                <strong>Submit</strong>
                            </button>
                            
                            <button class="btn btn-lg btn-success  m-t-n-xs" id="go_home" style="display: none;">
                                <strong>Login</strong>
                            </button>
                            
                            
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>



        <!--        <div class="footer">
            <div>
                <strong>Copyright</strong> IITR-EMS &copy; 2024            </div>
        </div>-->
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validatePhone(input) {
            // Remove any non-digit character
            input.value = input.value.replace(/[^0-9]/g, '');

            // Ensure the length does not exceed 10 digits
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }

        $(document).ready(function() {
           
            $('#password').on('input', function() {
                const passwordLength = $(this).val().length;
                const messageDiv = $('#message');

                if (passwordLength < 8) {
                    messageDiv.text('Password must be at least 8 characters long.').removeClass('valid').addClass('invalid');
                } else {
                    messageDiv.text('Password is valid.').removeClass('invalid').addClass('valid');
                }
            });
        });

        $(document).ready(function () {
    $('#student_email, #student_phone').on('input', function () {
        const email = $('#student_email').val();
        const phone = $('#student_phone').val();
        const emailError = $('#email_error');
        const phoneError = $('#phone_error');
        const submitButton = $('#student_submit');
        const goHomeButton = $('#go_home');

        // Clear previous error messages
        emailError.text('').hide();
        phoneError.text('').hide();
        goHomeButton.hide(); // Hide go home button initially

        let isValid = true;

        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailPattern.test(email)) {
            emailError.text('Please enter a valid email address.').show();
            isValid = false;
        }

        // Validate phone number
        const phonePattern = /^[0-9]{10}$/;
        if (phone && !phonePattern.test(phone)) {
            phoneError.text('Please enter a valid 10-digit mobile number.').show();
            isValid = false;
        }

        // If either field is invalid, disable the submit button
        if (!isValid) {
            submitButton.prop('disabled', true);
            return;
        }

        // AJAX request to check if email or phone number is already in use
        $.ajax({
            url: '/check-email-phone', // Laravel route
            method: 'POST',
            data: {
                email: email,
                phone: phone,
                _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
            },
            success: function (response) {
                // Reset validity
                isValid = true;

                // If only email is entered
                if (email && response.emailExists) {
                    emailError.text('Email ID is already used.').show();
                    isValid = false;
                }

                // If only phone number is entered
                if (phone && response.phoneExists) {
                    phoneError.text('Phone number is already used.').show();
                    isValid = false;
                }

                // Update the submit button's enabled state
                submitButton.prop('disabled', !isValid);

                // Show or hide the Go Home button based on existence
                if (response.emailExists || response.phoneExists) {
                    goHomeButton.show();
                    // submitButton.hide();
                } else {
                    // submitButton.show();
                    goHomeButton.hide(); 
                    
                }
            },
            error: function () {
                emailError.text('Error checking information.').show();
                phoneError.text('Error checking information.').show();
                submitButton.prop('disabled', true);
            }
        });
    });

    // Go to homepage button click event
    $('#go_home').on('click', function() {
        window.location.href = '/'; // Redirect to homepage
    });
});



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
    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js">
    </script>
    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js">
    </script>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

    <!-- DROPZONE -->
    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/dropzone/dropzone.js"></script>
    <!-- checkbox -->
    <script src="https://iicbooking.iitr.ac.in/admin_asset/js/plugins/iCheck/icheck.min.js"></script>
</body>

</html>
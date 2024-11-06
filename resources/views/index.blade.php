<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>

<body>
    <div class="container">
        <section class="h-100 gradient-form" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">

                                        <center> <img src="{{ asset('') }}assets/img/software.jpeg" \
                                                style="height:500px;width:280px;" class="img-responsive"></center>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <div class="text-center">
                                            <img src="https://cmsredesign.channeli.in/library/assets/images/iitrLogo.png"
                                                style="width: 185px;" alt="logo"> <br> <br>
                                            <h4 class="mt-1 mb-5 pb-1">FESEM Booking</h4>
                                        </div>

                                        <form method="POST" action="{{ route('login.post') }}">
                                            <!-- Correct action route -->
                                            @csrf
                                            <p>Please login to your account</p>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" id="email" name="email"
                                                    class="form-control" placeholder="Email address" required />
                                                <label class="form-label" for="form2Example11">Email</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" required />
                                                <label class="form-label" for="form2Example22">Password</label>
                                            </div>   

                                            
                                            <div id="responseMessage" class="mt-3" style="color:red"></div>
                                            <div id="responseMessageError" class="mt-3" style="color:red"></div>
                                            <div id="responseMessageCorrect" class="mt-3" style="color:green"></div>
                                            
                                            <div class="text-center pt-1 mb-5 pb-1">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Log
                                                    in</button>
                                                {{-- <a class="text-muted" href="#">Forgot password?</a> --}}
                                                <a class="text-muted" href="{{ route('password.request') }}">Forgot
                                                    password?</a>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>
                                                <a href="{{ url('signup') }}">
                                                    <button type="button" class="btn btn-outline-danger">Register
                                                        new</button>
                                                </a>

                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to send AJAX request
            function validateInputs() {
                const email = $('#email').val();
                const password = $('#password').val();

                
                // Only send request if both fields are filled
                if (email && password) {
                    // AJAX request to validate the email and password
                    $.ajax({
                        url: '{{ route('login-check') }}', // Use Laravel route helper
                        type: 'POST',
                        data: {
                            email: email,
                            password: password,
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                             $('#responseMessage').hide(); // Hide error message
                             $('#responseMessageCorrect').hide(); // Hide success message

                            // Check the response and display appropriate message
                            if (response.message === 'Email does not exist.' || response.message === 'Incorrect password.') {
                                $('#responseMessage').html(response.message).show(); // Show error message
                            } else {
                                $('#responseMessageCorrect').html(response.messageSuccess).show(); // Show success message
                                $('#responseMessage').hide();
                            }

                        },
                        error: function(xhr) {
                            // Handle error response
                            const response = xhr.responseJSON;
                            $('#responseMessageError').html(response.message || 'An error occurred.');
                        }
                    });
                }
            }

            // Attach input event listener to email and password fields
            $('#email, #password').on('input', function() {
                validateInputs();
            });
        });
    </script>
</body>

</html>

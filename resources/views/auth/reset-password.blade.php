<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 100px; /* Adjust based on your logo size */
        }
    
        .message {
            margin-top: 5px;
            margin-bottom: 5px;
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
</head>
<body>
    <div class="container">
        <div class="text-center">
            <img src="https://cmsredesign.channeli.in/library/assets/images/iitrLogo.png"
                style="width: 185px;" alt="logo"> <br> <br>
            <h4 class="mt-1 mb-5 pb-1">Reset Password</h4>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="otp" value="{{ $otp }}">
            
            <div class="form-group">
                <label for="otp">Enter the OTP you received:</label>
                <input type="text" name="otp" id="otp" class="form-control" required>
                @error('otp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div id="message" class="message"></div>
            {{-- <button type="submit" class="btn btn-primary btn-block">Reset Password</button> --}}
            <button type="submit" id="submitBtn" class="btn btn-primary btn-block" disabled>Reset Password</button>
        </form>
        <p class="text-center mt-3">
            <a href="{{ route('login') }}">Back to Login</a>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function validatePasswords() {
                const password = $('#password').val();
                const confirmPassword = $('#password_confirmation').val();
                const messageDiv = $('#message');
                const submitBtn = $('#submitBtn');

                if (password.length < 8 || confirmPassword.length < 8) {
                    messageDiv.text('Both passwords must be at least 8 characters long.').removeClass('valid').addClass('invalid');
                    submitBtn.prop('disabled', true);
                } else if (password !== confirmPassword) {
                    messageDiv.text('Passwords do not match.').removeClass('valid').addClass('invalid');
                    submitBtn.prop('disabled', true);
                } else {
                    messageDiv.text('Passwords are valid.').removeClass('invalid').addClass('valid');
                    submitBtn.prop('disabled', false);
                }
            }

            $('#password, #password_confirmation').on('input', validatePasswords);
        });
    </script>
</body>
</html>

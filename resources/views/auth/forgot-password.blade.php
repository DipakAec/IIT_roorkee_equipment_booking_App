<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <img src="https://cmsredesign.channeli.in/library/assets/images/iitrLogo.png"
                style="width: 185px;" alt="logo"> <br> <br>
            <h4 class="mt-1 mb-5 pb-1">Forgot Password</h4>
        </div>
        
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Enter your email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send OTP</button>
        </form>
        <p class="text-center mt-3">
            <a href="{{ route('login') }}">Back to Login</a>
        </p>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Login - Blooming Fast">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>Admin Login - Blooming Fast</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #19B2EB 0%, #0D8CC0 50%, #0A6B8F 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
        }
        
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-header {
            background: linear-gradient(135deg, #19B2EB 0%, #0D8CC0 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .login-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .login-logo img {
            max-width: 70px;
            max-height: 70px;
        }
        
        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
        }
        
        .login-header p {
            font-size: 14px;
            opacity: 0.9;
            color: white;
        }
        
        .login-body {
            padding: 40px 35px;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            border: none;
        }
        
        .alert-danger {
            background: #fee;
            color: #c33;
            border-left: 4px solid #c33;
        }
        
        .alert ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .form-control {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #19B2EB;
            box-shadow: 0 0 0 3px rgba(25, 178, 235, 0.1);
        }
        
        .form-control.is-invalid {
            border-color: #c33;
        }
        
        .invalid-feedback {
            display: block;
            color: #c33;
            font-size: 13px;
            margin-top: 6px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #19B2EB;
        }
        
        .form-check-label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
            margin: 0;
        }
        
        .btn-login {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #19B2EB 0%, #0D8CC0 100%);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 4px 15px rgba(25, 178, 235, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(25, 178, 235, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .back-link a {
            color: #19B2EB;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .back-link a:hover {
            color: #0D8CC0;
            text-decoration: underline;
        }
        
        .bg-decoration {
            position: fixed;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: move 20s linear infinite;
            z-index: 1;
        }
        
        @keyframes move {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(50px, 50px);
            }
        }
        
        @media (max-width: 576px) {
            .login-body {
                padding: 30px 25px;
            }
            
            .login-header {
                padding: 30px 25px;
            }
            
            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-decoration"></div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
                </div>
                <h1>Admin Login</h1>
                <p>Access the admin panel</p>
            </div>
            
            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">
                            <i class="fa fa-envelope"></i> Email Address
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <i class="fa fa-lock"></i> Password
                        </label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required
                               placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="remember" 
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fa fa-sign-in"></i> Login
                    </button>
                </form>
                
                <div class="back-link">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-arrow-left"></i> Back to website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


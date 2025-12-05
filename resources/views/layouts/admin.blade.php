<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel - Blooming Fast">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>@yield('title', 'Admin Panel - Blooming Fast')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .admin-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 30px auto;
            max-width: 1200px;
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .admin-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .admin-header .logo img {
            max-width: 150px;
            height: auto;
        }
        
        .admin-actions {
            display: flex;
            gap: 10px;
        }
        
        .form-group-admin {
            margin-bottom: 20px;
        }
        
        .form-label-admin {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        .form-control-admin {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.3s ease;
        }
        
        .form-control-admin:focus {
            outline: none;
            border-color: #19B2EB;
            box-shadow: 0 0 0 3px rgba(25, 178, 235, 0.1);
        }
        
        .btn-admin {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        
        .btn-admin-primary {
            background: #19B2EB;
            color: #ffffff;
        }
        
        .btn-admin-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(25, 178, 235, 0.3);
            color: #ffffff;
            text-decoration: none;
        }
        
        .btn-admin-secondary {
            background: #6c757d;
            color: #ffffff;
        }
        
        .btn-admin-secondary:hover {
            background: #5a6268;
            color: #ffffff;
            text-decoration: none;
        }
        
        textarea.form-control-admin {
            resize: vertical;
            min-height: 100px;
        }
        
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        
        .row::after {
            content: "";
            display: table;
            clear: both;
        }
        
        [class*="col-"] {
            float: left;
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .col-md-6 {
            width: 50%;
        }
        
        .col-md-4 {
            width: 33.333333%;
        }
        
        .col-md-12 {
            width: 100%;
        }
        
        .form-check-admin {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .text-center {
            text-align: center;
        }
        
        .d-inline {
            display: inline;
        }
        
        @media (max-width: 768px) {
            .col-md-6,
            .col-md-4 {
                width: 100%;
            }
            
            .admin-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .admin-card {
                margin: 15px;
                padding: 20px;
            }
            
            .admin-actions {
                flex-wrap: wrap;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>

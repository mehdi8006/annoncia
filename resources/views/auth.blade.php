<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Alert Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
        }
        
        .alert-success {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc;
        }
        
        .alert-danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }
        
        .error-text {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
   @extends('layouts.masterhome') 
   @section('main')
   
   <!-- Success Message -->
   @if(Session::has('success'))
   <div class="alert alert-success">
       {{ Session::get('success') }}
   </div>
   @endif
   
   <!-- Error Message -->
   @if(Session::has('error'))
   <div class="alert alert-danger">
       {{ Session::get('error') }}
   </div>
   @endif
   
   <x-auth.auth />
   
   @endsection
</body>
</html>
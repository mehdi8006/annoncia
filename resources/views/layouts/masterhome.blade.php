<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <title>Annoncia - Achetez et vendez facilement</title>
   <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
       .main{
            padding: 20px;
       }
       
       /* Alert styles */
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
   </style>

</head>
<body>
    @include('components.nav')
<div class="main">
    <!-- Flash Messages -->
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    
    @yield('main')
  
</div>
    @include('components.footer')
    
    <script>
    // Auto-hide alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 1s';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 1000);
            }, 5000);
        });
    });
    </script>
</body>
</html>
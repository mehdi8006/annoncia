<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <title>Document</title>
  
</head>
<body>
    @include('components.nav')
    
    <div class="content-wrapper">
        <aside class="sidebar">
            @yield('sidebar')
        </aside>
        
        <main class="main">
            @yield('main')
        </main>
    </div>
    
    @include('components.footer')
</body>
</html>
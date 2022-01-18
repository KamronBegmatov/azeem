<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @include('layout.style')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <!-- Site wrapper -->
    
    <div class="wrapper dashboard">
        @include('layout.top-nav')
        @include('layout.sidebar')
       
    
        <div class="content-wrapper">
        
            @yield('content')


        </div>
    </div>
    @include('layout.script')
</body>

</html>
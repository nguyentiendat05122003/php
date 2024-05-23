<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    <div class="main">
        @yield('content')
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a> 
    </div>
    @include('includes.footer')
</body>
</html>
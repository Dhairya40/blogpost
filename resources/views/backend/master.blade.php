<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.2/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('/') }}/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('public/css/dashboard.css')}}" rel="stylesheet">
    <link href="{{url('public/css/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{url('public/js/toast/toast.min.css')}}" rel="stylesheet"> 

    <style type="text/css">
      .error{
        color: red;
      }
    </style>
     @yield('css')
    <!-- Custom styles for this template -->
   </head>
  <body>
 @include('backend.admin.partial.navbar')
@yield('content')
    
  <script src="{{url('public/js/jquery.min.js')}}"></script>
  <script src="{{url('public/js/bootstrap.min.js')}}"></script>
  <script src="{{url('public/js/select2/select2.min.js')}}"></script>
  <script src="{{url('public/js/jquery.validate.min.js')}}"></script>
  <script src="{{url('public/js/feather.min.js')}}"></script>   
  <script src="{{url('public/js/toast/toast.min.js')}}"></script>   
  

    <script>
      feather.replace()
    </script>
  @yield('script')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- inclure le fichier qui contient le head -->
@include('include.head')
</head>
<body >

@include('include.navbar')

<!-- Masthead-->


  @yield('home')



<div>
   @include('include.footer')
</div>
@include('include.script')
</body>
</html>

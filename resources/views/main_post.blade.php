<!DOCTYPE Html>
<html lang="en">
<head>
  @include('admin_partials._head')
</head>
<body>
<div id="wrapper">
    @include('admin_partials._nav')


<div id="page-wrapper">
    @include('admin_partials._messages')
    @yield('content')
  </div>



  @include('admin_partials._javascript')
</div>
</body>

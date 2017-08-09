<!DOCTYPE Html>

<head>
  @include('partials._head')
</head>
<body>
    @include('partials._nav')
    @include('partials._banner')

@yield('content')




@yield('sidebar')
@include('partials._footer')
</body>

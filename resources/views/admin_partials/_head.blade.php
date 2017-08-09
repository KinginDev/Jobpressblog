<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

	<title>Jobpress Blog @yield('title')</title>
  <!-- jQuery -->
    {{ Html::script("js/jquery.js")}}
   <!-- Bootstrap Core CSS -->
     {{ Html::style('css/bootstrap.min.css')}}

   <!-- Custom CSS -->

  {{ Html::style('css/sb-admin.css')}}
   <!-- Morris Charts CSS -->

     {{ Html::style('css/plugins/morris.css')}}

   <!-- Custom Fonts -->

  {{ Html::style('font-awesome/css/font-awesome.min.css')}}
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
   

   @yield('stylesheets')

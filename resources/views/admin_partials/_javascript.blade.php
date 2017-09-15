<!-- jQuery -->
  {{ Html::script("js/jquery.js")}}

    <!-- Bootstrap Core JavaScript -->
  {{  Html::script("js/bootstrap.min.js")}}
    <!-- Morris Charts JavaScript -->
    {{Html::script("js/plugins/morris/raphael.min.js")}}
  {{  Html::script("js/plugins/morris/morris.min.js")}}
    {{Html::script("js/plugins/morris/morris-data.js")}}
    {{Html::script('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js')}}
@yield('script')

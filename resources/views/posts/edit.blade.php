@extends('main_post')

@section('title' , "| $post->title ")

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css')!!}
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=3lgnpqyr6glr8b485lvk9scwve3lhiq5wfs630xg6tw7szie	"></script>

  <script type="text/javascript">
   var editor_config = {
      path_absolute : "/",
      selector: "textarea",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>

@section('content')
<div class="row">
   <div class="col-xs-offset-2 col-md-8">
     {!! Form::model($post, ['route' => ['post.update' , $post->id], 'method'=> 'PUT' ]) !!}
      <div class="col-sm-12">
        <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title', null, ['class' => 'form-control inpul-lg'])}}
        </div>
        <div class="form-group">
          {{Form::label('category_id', 'Categories')}}
		       {{Form::select('category_id',array($categories),$post->id ,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
          {{Form::label('tags', 'Tags')}}
	{{Form::select('tags[]' ,$tags,null, ['multiple' =>'multiple','class' => 'form-control select2-multi']) }}

        </div>
				<div class="form-group">
					{{Form::label('featured_image','Edit Featued Image')}}
					{{Form::file('featured_image')}}
				</div>
        <div class="form-group">
          {{Form::label('body', 'Edit the Content')}}
          {{Form::textarea('body', null, ['class' => 'form-control'])}}
        </div>
        {{Form::submit('Edit Post', ['class' => 'btn btn-default btn-block', 'style' => 'margin-top:10px;'])}}
        {{Form::close()}}
      </div>
   </div>
</div>
@endsection
@section('script')
{!! Html::script('js/parsely.min.js')!!}
{!! Html::script('js/select2.min.js')!!}
<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-single').select2();
</script>
@endsection

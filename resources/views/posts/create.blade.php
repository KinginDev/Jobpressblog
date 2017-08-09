@extends('main_post')

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

@endsection


@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h1>Create New Post</h1>
	<hr />
	 {!! Form::open(array('route' => 'post.store', 'data-parsley-validate' => '','files'=>'true')) !!}
    {{Form::label('title' , 'Title:')}}
    {{Form::text('title',null,array('class'=>'form-control' ,'required' => '' ,'maxlength' => '255'))}}

	{{ Form::label('category', 'Category')}}
	<select class="form-control select2-single" name="category_id" required="">
	<option></option>
		@foreach($categories as $category)

		<option value="{{$category->id}}">{{ $category->name}}</option>
		@endforeach
	</select>
	<div class="form-group">
		{{Form::label('tags' ,'Tags')}}
		<select class="form-control select2-multi"  name="tags[]" required="" multiple="multiple">
	<option></option>
		@foreach($tags as $tag)

		<option value="{{$tag->id}}">{{ $tag->name}}</option>
		@endforeach
	</select>
		</div>
		<div class="form-group">
			{{Form::label('featured_image','Upload featured image')}}
			{{ Form::file('featured_image') }}
		</div>

	{{Form::label('body', 'Post Body')}}
	{{Form::textarea('body', null , array('class' => 'form-control'))}}

	{{Form::submit('Create New Post' , array('class' =>'btn btn-default btn-large btn-block', 'style' => 'margin-top:20px;'))}}
	{!! Form::close() !!}
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

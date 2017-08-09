@extends('main_post')

@section('title', "| Edit $tag->id")

@section('content')
  <div class="row" style="width:100%;">
<div class="col-sm-8 col-sm-offset-2" style="margin-bottom:500px; margin-top:40px;">
  {{Form::model($tag,['route' =>['tag.update',$tag->id],'method'=>'put'] )}}

  {{Form::label('name', 'Title')}}
  {{Form::text('name',null,['class'=>'form-control']) }}

  {{Form::submit('Save Changes',['class' => 'btn btn-primary','style' =>'margin-top:20px;']) }}

  {{Form::close()}}
</div>
</div>

@stop

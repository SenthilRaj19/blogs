@extends('main')
@section('title',' Create new post')

@section('styles')
    {!! Html::style('css/parsley.css') !!}
    @endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>Create new Post</h2>
        <hr>
        {!! Form::open(['route' => 'posts.store', 'files'=>true]) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title',null,(['class'=>'form-control'])) }}

            {{Form::label('slug', 'Slug:')}}
            {{Form::text('slug',null,['class'=>'form-control', 'required'=>'required', 'minlength'=>'5','maxlength'=>'255'] )}}

            {{ Form::label('body','Enter text') }}
            {{ Form::textarea('body',null,(['class'=>'form-control','required'=>''])) }}

            {{Form::label('image','Upload image')}}
            {{Form::file('image')}}

            {{ Form::submit('Create post', (['class'=>'btn btn-primary btn-block', 'style'=>'margin:20px 0'])) }}

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    @endsection
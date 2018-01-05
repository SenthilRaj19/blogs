@extends('main')
@section('title',' Edit post')

@section('content')
    <div class="row">
        {!!   Form::model($post, ['route'=> ['posts.update', $post->id],'method'=>'PUT']) !!}
        <div class="col-md-12">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null,  ['class'=>'form-control']) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null,  ['class'=>'form-control','required'=>'required', 'minlength'=>'5','maxlength'=>'255']) }}

            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null,  ['class'=>'form-control']) }}
            <hr>

            <div class="col-md-6">
                {{ Html::linkRoute('posts.show', 'CANCEL', ($post->id), ['class'=>'btn btn-block btn-danger'] ) }}
            </div>
            <div class="col-md-6">
              {{ Form::submit('Save', ['class'=>'btn btn-success btn-block']) }}
            </div>
        </div>
        {!!  Form::close() !!}
    </div>

@endsection

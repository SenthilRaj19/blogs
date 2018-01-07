@extends('main')
@section('title',' View post')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('posts.index') }}" class="btn btn-primary pull-right">Go back</a>
        <h2 class="title">{!!  $post->title !!}</h2>
        <small>created at: {{ date('M j, Y H:i', strtotime($post->created_at)) }} </small>
        <br>
           <small>updated at: {{ date('M j, Y H:i', strtotime($post->updated_at)) }}</small>
        <br>
        <small>slug: <a href="{{ url($post->slug) }}">{{ $post->slug }}</a></small>
        <hr>
        <img src="{{asset('images/'.$post->image)}}" alt="">

        <p class="block">{!! $post->body !!}</p>
        <hr>
        <div class="col-md-6">
            {{ Html::linkRoute('posts.edit', 'EDIT', ($post->id), ['class'=>'btn btn-primary btn-block'] ) }}
        </div>
        <div class="col-md-6">
            {!!    Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
            {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
            {!!  Form::close() !!}
        </div>
    </div>
</div><!-- end-->
@endsection


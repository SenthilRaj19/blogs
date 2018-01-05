@extends('main')
@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h2>{{$post->title}}</h2>

        <p>
            {{$post->body}}
        </p>
    </div>

</div>

    @endsection


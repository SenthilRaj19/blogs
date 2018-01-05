@extends('main')
@section('title', 'archives')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>All blogs</h2>
    </div>
    <div class="col-md-12">
        @foreach($posts as $post)
         <h2>{{$post->title}}</h2>
        <small></small>
        <p>
            {{$post->body}}
        </p>
            <hr>
       @endforeach
    </div>

    <div class="col-md-12">
        <div class="text-center">
            {!! $posts->links() !!}
        </div>
    </div>

</div>

    @endsection


@extends('main')

@section('title',' HomePage')

<!-- main-content -->
@section('content')
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, Welcome to my Blog</h1>
                <p class="lead">Thankyou for being a part of my test blog</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12">
            <div class="post">
                @foreach($posts as $post)
                <h3>{{$post->title}}</h3>
                <p>{{substr($post->body, 0,100)}} {{strlen($post->body)>100 ?'...': ''}}</p>
                <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read more</a>
            <hr/>
            @endforeach
            </div>

        </div>

        <div class="col-md-12">

        </div>

    </div>
    <hr/><br/>
@endsection




<!-- end-main-content -->
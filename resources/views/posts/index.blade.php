@extends('main')
@section('title',' All post')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">Create New Post</a>
        <h2 class="title">Showing all posts</h2>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-responsive">
            <thead>
             <tr>
                 <th>id</th><th>Title</th><th>Body</th><th>Created at</th><th>Edit</th><th>Delete</th>
             </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        {{$post->id}}
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        {{ substr($post->body, 0,25) }} {{ strlen($post->body) >25 ? '...' : ''  }}
                    </td>
                    <td>
                        {{ date('M j, Y ', strtotime($post->created_at)) }}
                    </td>
                    <td>
                        {{ Html::linkRoute('posts.show', 'VIEW', $post->id, ['class'=>'btn btn-default btn-block']) }}
                    </td>
                    <td>
                        {{ Html::linkRoute('posts.edit', 'EDIT', $post->id, ['class'=>'btn btn-default btn-block']) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
         <div class="text-center">
             {!! $posts->links(); !!}
         </div>

    </div>
</div>

@endsection


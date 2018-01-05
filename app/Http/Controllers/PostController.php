<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Image;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','DESC')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' =>'required|alpha_dash|min:5|max:255'
        ));

        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->slug=$request->slug;

        if($request->hasFile('image')){
         $image=$request->file('image');
         $filename=time().'.'.$image->getClientOriginalExtension();
         $location = public_path('images/'.$filename);
         Image::make($image)
             ->resize(100, null, function($constraint){
                 $constraint->aspectRatio();
             })
             ->save($location);
         $post->image=$filename;
        }


        $post->save();

        Session::flash('success','Thanks for creating the blog. this is now saved');
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post= Post::find($id);
       return view('posts.show')
           ->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' =>'required|alpha_dash|min:5|max:255',
            'image' => 'sometimes|image'
        ));

        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->slug=$request->input('slug');
        $post->save();

        Session::flash('success','Thanks for updating the blog. this is now saved');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        Session::flash('success','Successfully deleted');
        return redirect()->route('posts.index');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    public function showContact()
    {
        return view('pages.contact');
    }
    public function showAbout()
    {
        $name ='RS';
        $email = 'test@gmail.com';
        $data=[];
        $data['no']=003300;
        $data['sex']='male';
        return view('pages.about')
            ->withName($name)
            ->withEmail($email)
            ->withData($data);
    }
    public function showIndex()
    {
        $post=Post::all();
        return view('pages.welcome')->withPosts($post);
    }

}

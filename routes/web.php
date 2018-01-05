<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['web']],function(){

    Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])
    ->where('slug','[\w\d\-\_]+');
    Route::get('blog', ['uses'=> 'BlogController@getIndex', 'as'=>'blog.index']);
    Route::get('/pages/welcome' , 'PagesController@showIndex');
    Route::get('/' , 'PagesController@showIndex');
    Route::get('/pages/contact' , 'PagesController@showContact');
    Route::get('/pages/about' , 'PagesController@showAbout');
    Route::resource('posts', 'Postcontroller');

    Route::post('/pages/contact' , function(  \Illuminate\Mail\Mailer $mailer, \Illuminate\Http\Request $request){
        $mailer->to($request->input('email'))
            ->send(new \App\Mail\EmailContact($request->input('name'),$request->input('subject'),$request->input('message')));
        return redirect()->back();
    });
});

Auth::routes();

Route::group(['middleware'=>['auth']],function(){
    Route::get('/home', 'HomeController@index')->name('home');

});



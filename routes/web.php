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
//use App\Image;
 /*
Route::get('/', function () {
   
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path."<br>";
        echo $image->user->name."<br>";
        echo "<ul>";
        foreach($image->comments as $comment){
            echo "<li><p>".$comment->content."</p></li>";
        }
        echo"</ul><hr>";
    }
    die();
   
    return view('welcome');
});
 */
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/configuracion','UserController@config')->name('config');
Route::post('/user/update','UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}','UserController@getImage')->name('user.avatar');
Route::get('/perfil/{id}','UserController@profile')->name('user.profile');
Route::get('/gente/{search?}','UserController@index')->name('user.index');

Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file');
Route::get('/subir-imagen','ImageController@create')->name('image.create');
Route::get('/image/delete/{id}','ImageController@delete')->name('image.delete');
Route::get('/image/{id}','ImageController@detail')->name('image.detail');
Route::post('/image/save','ImageController@save')->name('image.save');
Route::get('/image/editar/{id}','ImageController@edit')->name('image.edit');
Route::post('/image/update','ImageController@update')->name('image.update');

Route::post('/comment/save','CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}','CommentController@delete')->name('comment.delete');

Route::get('/like/{image_id}','LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}','LikeController@dislike')->name('like.delete');
Route::get('/likes','LikeController@likes')->name('like.likes');

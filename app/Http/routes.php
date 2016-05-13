<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('photos','PhotoController');

/*
 * dynamic image cache
 */
Route::get('/uploads/{size}/{name}',['as' => 'imagecache', function($size = NULL, $name = NULL){
    //if(!Auth::guest()) {
        if (!is_null($size) && !is_null($name)) {
            $size = explode('x', $size);
            $cache_image = Image::cache(function ($image) use ($size, $name) {
                return $image->make(url("/uploads/". $name))
                    ->resize($size[0], $size[1])
                    ->encode('jpg',60);
            }, 500); // cache for 500 minutes

            return Response::make($cache_image, 200, ['Content-Type' => 'image']);
        } else {
            abort(404);
        }
    //} else {
    //    abort(404);
    //}
}]);
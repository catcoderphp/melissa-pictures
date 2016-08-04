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

Route::get('/home', ['HomeController@index']);

Route::resource('photos','PhotoController');
Route::post('photos/album','PhotoController@storageFromAlbum');
Route::resource('albums','AlbumController');

Route::get('/protected',['middleware' => 'oauth',function (){
   return Response()->json(['auth' => 'success']);
}]);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
/*
 * dynamic image cache
 */
Route::get('/image/{size}/{name}',['as' => 'imagecache', function($size = NULL, $name = NULL){
    if(!Auth::guest()) {
        $image_pointer = file_get_contents(public_path('uploads/'.$name));
        if (!is_null($size) && !is_null($name)) {
            $size = explode('x', $size);
            $cache_image = Image::cache(function ($image) use ($size, $name, $image_pointer) {
                return $image->make($image_pointer)
                    ->resize($size[0], $size[1])
                    ->encode('jpg',90);
            }, 500); // cache for 500 minutes

            return Response::make($cache_image, 200, ['Content-Type' => 'image']);
        } else {
            abort(404);
        }
    } else {
        abort(404);
    }
}]);

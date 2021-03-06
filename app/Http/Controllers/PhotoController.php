<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Catcoder\Helpers\FilesHandler;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PhotoController extends Controller
{
    private $data;
    private $current_user;

    public function __construct()
    {
        /*$this->middleware('auth');
        if(isset(Auth::user()->id)){
            $this->current_user = Auth::user()->id;
        }*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::where('user_id','=',1)
            ->with(['share' => function($query) {
                $query->select('name','id')->get();
            }])
            ->orderBy('id','DESC')
            ->paginate(15);
        return view('photos.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '<>',Auth::user()->id)->lists('name','id')->toArray();
        return view('photos.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data = $request->all();
        $this->data['user_id'] = Auth::user()->id;

        //$this->data['photo'] = json_encode($photos_storage);
        Photo::create($this->data);
        if($request->ajax()){
            return response()->json([
                'status' => 'ok',
                'message' => 'Foto(s) agregada(s) correctamente',
                'error' => 0
            ]);
        } else {
            return redirect()
                ->to(route('photos.index'))
                ->with('success','Foto(s) agregada(s) correctamente');
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storageFromAlbum(Requests\PhotosRequest $request) {
        $files[] = $request->file('file');
        $url = preg_split('/\//',$request->headers->get('referer'));
        $data['album_id'] = $url[(count($url)) - 1];
        $photos_storage = FilesHandler::upload(base_path('public/uploads'),$files);
        $data['photo'] = $photos_storage[0];
        Photo::create($data);
        return response()->json([
            'response' => 'Imagen subida'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if($photo->trashed()){
            return Redirect::to(route('albums.index'))->with('success','Foto eliminada correctamente');
        }
    }
}

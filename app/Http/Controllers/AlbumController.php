<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('user_id','=',Auth::user()->id)
            ->get();
        return view('albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *'album_id'
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recent_images = Album::with(['photos' => function($query){
            $query->limit(5)
                ->orderBy('id','DESC');
        }])->where('user_id','=',Auth::user()->id)
            ->get();
        if(!isset($recent_images[0])) {
            $recent_images = [];
        } else{
            $recent_images = $recent_images[0];
        }
        return view('albums.create',compact('recent_images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AlbumRequest $request)
    {
        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $album = Album::create($data);
        return Redirect::to(route('albums.show',$album->id))->with('success','Tu &aacute;lbum fue creado');
    }

    /**
     * Display the speci302 Foundfied resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with(['photos' => function($query){
            $query->orderBy('id','desc');
        }])
            ->find($id);
        return view('albums.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit',compact('album'));
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
        $album = Album::find($id);
        $album->delete();
        if($album->trashed()){
            echo json_encode([
                'delete' => 1
            ]);
        }
        }
}

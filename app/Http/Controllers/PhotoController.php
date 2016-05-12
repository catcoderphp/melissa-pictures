<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Catcoder\Helpers\FilesHandler;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    private $data;
    private $current_user;

    public function __construct()
    {
        $this->middleware('auth');
        if(isset(Auth::user()->id)){
            $this->current_user = Auth::user()->id;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::where('user_id','=',$this->current_user)
            ->with(['share' => function($query) {
                $query->select('name','id')->get();
            }])->paginate(15);
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
        $photos_storage = FilesHandler::upload(base_path('public/uploads'),$request->file('photos'));
        $this->data['photo'] = json_encode($photos_storage);
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
        //
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Album\StoreAlbum;
use App\Models\Album\Album;

class AlbumController extends Controller
{
    protected $album;

    function __construct(Album $album)
    {
        $this->album = $album;
    }
    public function index()
    {
        $album = $this->album->orderBy('created_at', 'desc')->get();

        return view('backend.album.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbum $request)
    {
        if($album = $this->album->create($request->albumFillData())) {
            return redirect()->route('album.index');

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
    public function edit(Album $album)
    {
        return view('backend.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlbum $request, Album $album)
    {
        if ($album->update($request->albumFillData())) {
            $album->fill([
                'slug' => $request->name,
            ])->save();
        }
        return redirect()->route('album.index')->withSuccess(trans('album has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = $this->album->find($id);
        $album->delete();
        return redirect()->route('album.index')->withSuccess(trans('album has been deleted'));
    }
}

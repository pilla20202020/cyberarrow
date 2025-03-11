<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team\Team;
use App\Http\Requests\Team\StoreTeam;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $team;

    function __construct(Team $team)
    {
        $this->team = $team;
    }
    public function index()
    {
        $teams = Team::orderBy('order')->get();
        return view('backend.team.index',compact('teams'));
    }

    public function create()
    {
        return view('backend.team.create');
    }

    public function store(StoreTeam $request)
    {
        //dd($request->all());
        if ($team = Team::create($request->data())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $team);
            }
        }
        return redirect()->route('team.index')->withsuccess(trans('team information has been successfully created',[ 'entity' => 'team']));
    }

    public function show(Team $team)
    {
        return view($team->view,compact('teams'));
    }

    public function edit(Team $team)
    {
        return view('backend.team.edit',compact('team'));
    }

    public function update(StoreTeam $request,Team $team)
    {
//        DB::transaction(function () use($request,$team)
//        {
//            $team->update($request->data());
//
//            $this->uploadRequestImage($request,$team);
//        });
        if ($team->update($request->data())) {

            $team->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $team);
            }
        }
        return redirect()->route('team.index')->withsuccess(trans('team information has been successfully updated',['entity'=>'team']));
    }

    public function teamOrder(Request $request)
    {
        foreach ($request->get('order') as $order => $teamId)
        {
            $team = Team::find($teamId);

            $team->update(['order' => $order]);
        }
        return redirect()->route('team.index')->withsuccess(trans('team information has been successfully updated',['entity'=>'team']));

    }

    public function destroy($id)
    {
        $team = $this->team->find($id);
        $team->delete();
        return redirect()->route('team.index')->withSuccess(trans('Team has been deleted'));
    }


    function uploadFile(Request $request, $team)
    {
        $file = $request->file('image');
        $path = 'uploads/team';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($team->image))
            $this->__deleteImages($team);

        $data['image'] = $fileName;
        $this->updateImage($team->id, $data);

    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }

    public function updateImage($teamId, array $data)
    {
        try {
            $team = Team::find($teamId);
            $team = $team->update($data);
            return $team;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}

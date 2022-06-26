<?php

namespace App\Http\Controllers;

use App\Models\DeputyTeam;
use App\Http\Requests\StoreDeputyTeamRequest;
use App\Http\Requests\UpdateDeputyTeamRequest;
use App\Models\Dbsc;
use App\Models\Team;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class TeamDeputyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DeputyTeam::orderBy('team_id','ASC')->paginate(50);
        
        return view('team-deputy.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_teams = Team::all();
        $list_profiles = Dbsc::all();
        return view('team-deputy.create',compact('list_teams','list_profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeputyTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'team_id' => 'required',
            'profile_id' => 'required',
        ]);

        $input = $request->all();
        $deputy = new DeputyTeam();
        $deputy->profile_id = $input['profile_id'];
        $deputy->team_id = $input['team_id'];
        $deputy->created_by = auth()->user()->id;
        $deputy->created_at = date("Y-m-d H:i:s");
        //$infraction = Infractions::create($input);
        if($deputy->save()) {
            $show = 'success';
            $message = 'Team deputy was assigned successfully.';
        } else {
            $show = 'error';
            $message = 'Team deputy was not added.';
        }
        return redirect()->route('team-deputy.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeputyTeam  $deputyTeam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deputy = DeputyTeam::find($id);
        return view('team-deputy.show',compact('deputy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeputyTeam  $deputyTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deputy = DeputyTeam::find($id);
        $list_teams = Team::all();
        $list_profiles = Dbsc::all();
        return view('team-deputy.edit',compact('deputy','list_teams','list_profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeputyTeamRequest  $request
     * @param  \App\Models\DeputyTeam  $deputyTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'team_id' => 'required',
            'profile_id' => 'required',
        ]);
    
        $input = $request->all();
        $deputy = DeputyTeam::find($id);
        $deputy->profile_id = $input['profile_id'];
        //$deputy->team_id = $input['team_id'];
        $deputy->updated_by = auth()->user()->id;
        $deputy->updated_at = date("Y-m-d H:i:s");
        if($deputy->save()) {
            $show = 'success';
            $message = 'Team deputy was updated successfully.';
        } else {
            $show = 'error';
            $message = 'Team deputy was not updated.';
        }
        return redirect()->route('team-deputy.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeputyTeam  $deputyTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DeputyTeam::find($id)->delete();
        if($delete) {
            $show = 'success';
            $message = 'Team deputy deleted successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to delete team deputy.';
        }
        return redirect()->route('team-deputy.index')->with($show,$message);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DeputyTeam;
use App\Http\Requests\StoreDeputyTeamRequest;
use App\Http\Requests\UpdateDeputyTeamRequest;
use App\Models\Dbsc;
use App\Models\DeputyTeamHistory;
use App\Models\Team;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $list_teams = Team::all()->where('status_id',1);
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
    // public function edit($id)
    // {
    //     $deputy = DeputyTeam::find($id);
    //     $list_teams = Team::all();
    //     $list_profiles = Dbsc::all();
    //     return view('team-deputy.edit',compact('deputy','list_teams','list_profiles'));
    // }

    public function updatedeputy($id)
    {
        $deputy = DeputyTeam::find($id);
        $list_teams = Team::all()->where('status_id',1);
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
    public function updaterecord(Request $request, $id)
    {
        $this->validate($request, [
            //'team_id' => 'required',
            'profile_id' => 'required',
        ]);
        DB::beginTransaction();

        $old_rec = DeputyTeam::find($id);
        $old_profile = $old_rec->profile_id;
        $old_team = $old_rec->team_id;

        $input = $request->all();
        $deputy = DeputyTeam::find($id);
        $deputy->profile_id = $input['profile_id'];
        //$deputy->team_id = $input['team_id'];
        $deputy->updated_by = auth()->user()->id;
        $deputy->updated_at = date("Y-m-d H:i:s");

        if($deputy->save()) {
            if($old_profile == $input['profile_id']) {
                DB::rollBack();
                $show = 'success';
                $message = 'No changes made';
            } else {
                $rec_history = new DeputyTeamHistory();
                $rec_history->profile_id = $old_profile;
                $rec_history->team_id = $old_team;
                $rec_history->date_changed = date("Y-m-d H:i:s");
                $rec_history->action_taken = 1; //update
                $rec_history->created_by = auth()->user()->id;
                $rec_history->created_at = date("Y-m-d H:i:s");
                if($rec_history->save()) {
                    DB::commit();
                    $show = 'success';
                    $message = 'Team deputy was updated successfully.';
                } else {
                    DB::rollBack();
                    $show = 'error';
                    $message = 'Team deputy was not updated.';
                }
            }
        } else {
            DB::rollback();
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
        DB::beginTransaction();
        $deputy = DeputyTeam::find($id);
        $old_profile = $deputy->profile_id;
        $old_team = $deputy->team_id;
        $old_team_name = Team::find($deputy->team_id)->team_name;
        if($deputy->delete()) {
            $rec_history = new DeputyTeamHistory();
            $rec_history->profile_id = $old_profile;
            $rec_history->team_id = $old_team;
            $rec_history->date_changed = date("Y-m-d H:i:s");
            $rec_history->action_taken = 2; //delete
            $rec_history->deleted_team_name = $old_team_name;
            $rec_history->created_by = auth()->user()->id;
            $rec_history->created_at = date("Y-m-d H:i:s");
            if($rec_history->save()) {
                DB::commit();
                $show = 'success';
                $message = 'Team deputy deleted successfully.';
            } else {
                DB::rollBack();
                $show = 'error';
                $message = 'Failed to delete team deputy.';
            }
        } else {
            DB::rollBack();
            $show = 'error';
            $message = 'Failed to delete team deputy.';
        }
        return redirect()->route('team-deputy.index')->with($show,$message);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Team::orderBy('team_name','ASC')->paginate(50);
        return view('team.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'team_code' => 'required',
            'team_name' => 'required',
        ]);

        $input = $request->all();
        $team = new Team();
        $team->team_code = $input['team_code'];
        $team->team_name = $input['team_name'];
        $team->created_by = auth()->user()->id;
        $team->created_at = date("Y-m-d H:i:s");
        if($team->save()) {
            $show = 'success';
            $message = 'Team created successfully.';
        } else {
            $show = 'error';
            $message = 'Team was not created.';
        }
        return redirect()->route('team.index')->with($show,$message);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view('team.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'team_code' => 'required',
            'team_name' => 'required',
        ]);
    
        $input = $request->all();
        $team = Team::find($id);
        $team->team_code = $input['team_code'];
        $team->team_name = $input['team_name'];
        $team->updated_by = auth()->user()->id;
        $team->updated_at = date("Y-m-d H:i:s");
        if($team->save()) {
            $show = 'success';
            $message = 'Team updated successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to update team.';
        }
        return redirect()->route('team.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check_profile = DB::table('dbsc')->join('team', 'team.team_id', '=', 'dbsc.team_id')->where('dbsc.team_id',$id)->count();
        $check_deputy = DB::table('deputy_team')->join('team', 'team.team_id', '=', 'deputy_team.team_id')->where('deputy_team.team_id',$id)->count();
        $check_history = DB::table('deputy_team_history')->join('team', 'team.team_id', '=', 'deputy_team_history.team_id')->where('deputy_team_history.team_id',$id)->count();

        if($check_profile > 0 || $check_deputy > 0 || $check_history > 0) {
            $show = 'error';
            $message = "Can't delete team due to existing related records.";
        } else {
            $delete = Team::find($id)->delete();
            //$delete = DB::table('team')->where('team_id', '=', (int) $id)->delete();
            if($delete) {
                $show = 'success';
                $message = 'Team deleted successfully.';
            } else {
                $show = 'error';
                $message = 'Failed to delete team.';
            }
        }
        return redirect()->route('team.index')->with($show,$message);
    }

    public function activate($id)
    {
        $check_profile = DB::table('team')->where('team_id',$id)->count();
        $check_deputy = DB::table('deputy_team')->join('team', 'team.team_id', '=', 'deputy_team.team_id')->where('deputy_team.team_id',$id)->count();
        $check_history = DB::table('deputy_team_history')->join('team', 'team.team_id', '=', 'deputy_team_history.team_id')->where('deputy_team_history.team_id',$id)->count();

        $check_team = Team::find($id);
        $team = Team::find($id);
        if($check_team->status_id == 1) {
            $team->status_id = 2;
            $message = 'Team deactivated successfully.';
        } else {
            $team->status_id = 1;
            $message = 'Team activated successfully.';
        }

        if($team->save()) {
            $show = 'success';
        } else {
            $show = 'error';
            $message = 'Failed to activate/deactivate team.';
        }

        return redirect()->route('team.index')->with($show,$message);
    }
}

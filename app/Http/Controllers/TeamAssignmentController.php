<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamAssignmentController extends Controller
{
    public function index(Request $request)
    {
        $data = Dbsc::select('dbsc.*',DB::raw('team.team_name AS name_team'),DB::raw('team.team_code AS team_code'),
            DB::raw('(SELECT CONCAT(tbl1.firstname," ",tbl1.lastname) FROM dbsc tbl1 WHERE tbl1.id = dbsc.assigned_team_by) AS assigned_by'))
            ->join('team', 'dbsc.team_id', '=', 'team.team_id')
            ->orderByRaw('team_name, modid')
            ->paginate(30);
            
        return view('team-assignment.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 30);
    }

    public function create()
    {
        $list_teams = Team::all()->where('status_id',1);
        $list_profiles = Dbsc::all();
        return view('team-assignment.mod-assign',compact('list_teams','list_profiles'));
    }

    public function show($id)
    {
        $team = Team::find($id);
        return view('team.show',compact('team'));
    }

    public function savemodteam(Request $request)
    {
        $this->validate($request, [
            'team_id' => 'required',
            'mods' => 'required',
        ]);
    
        $input = $request->all();;
        $id = $input['mods'];

        $is_save = 0;
        if(!empty($id)) {
            $team = Team::find($input['team_id']);
            // foreach ($mods as $mod) {
            //     $profile = Dbsc::find($mod);
            //     $profile->team_id = (int) $input['team_id'];
            //     $profile->team_name = !empty($team) ? $team->team_name : NULL;
            //     if($profile->save()) {
            //         $is_save = 1;
            //     } else {
            //         $is_save = 0;
            //     }
            // }

            // if($is_save == 0) {
            //     $show = 'success';
            //     $message = "Mod's team successfully assigned.";
            // } else {
            //     $show = 'error';
            //     $message = 'Failed to assign team.';
            // }
            $profile = Dbsc::find($id);
            $profile->team_id = (int) $input['team_id'];
            $profile->team = !empty($team) ? $team->team_name : NULL;
            $profile->assigned_team_by = auth()->user()->id;
            $profile->date_team_assigned = date("Y-m-d H:i:s");
            if($profile->save()) {
                $show = 'success';
                $message = "Mod's team successfully assigned.";
            } else {
                $show = 'error';
                $message = "Failed to assign team.";
            }
        } else {
            $show = 'error';
            $message = 'No mods to be assigned on a team.';
        }
        return redirect()->route('team-assignment.index')->with($show,$message);
    }

    public function remove($id)
    {
        $profile = Dbsc::find($id);
        $profile->team_id = NULL;
        $profile->team = NULL;
        $profile->assigned_team_by = NULL;
        $profile->date_team_assigned = NULL;
        if($profile->save()) {
            $show = 'success';
            $message = "Successfully removed from team.";
        } else {
            $show = 'error';
            $message = "Failed to remove Mod from team.";
        }

        return redirect()->route('team-assignment.index')->with($show,$message);
    }
}

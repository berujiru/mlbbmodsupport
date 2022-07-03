<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

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
        $delete = Team::find($id)->delete();
        if($delete) {
            $show = 'success';
            $message = 'Team deleted successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to delete team.';
        }
        return redirect()->route('team.index')->with($show,$message);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Markdowns;
use App\Models\Masterfile;
use App\Models\Qascore;
use Illuminate\Http\Request;

class DeputyModsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = (int) auth()->user()->id; //if deputy user
        //$user = 4; //if deputy user

        if(isset($_GET['mod_id']) && isset($_GET['filter_score'])) {
            $search_modid = $request->input('mod_id');
            $filter_score = $request->input('filter_score');
            if($search_modid > 0 && !empty($filter_score) && $filter_score == 1) {
                $data = Masterfile::select('masterfile.*')
                    ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->where('OVERALLSCORE','LIKE','100%')
                    ->where('masterfile.MOD_ID','=',$search_modid)
                    ->orderby('modid')
                    ->paginate(50);
            } elseif ($search_modid > 0 && !empty($filter_score) && $filter_score == 2) {
                $data = Masterfile::select('masterfile.*')
                    ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->where('OVERALLSCORE','NOT LIKE','100%')
                    ->where('masterfile.MOD_ID','=',$search_modid)
                    ->orderby('modid')
                    ->paginate(50);
            } elseif (empty($search_modid) && !empty($filter_score)) {
                if($filter_score == 1) {
                    $data = Masterfile::select('masterfile.*')
                        ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                        ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                        ->where('deputy_team.profile_id',$user)
                        ->where('OVERALLSCORE','LIKE','100%')
                        ->orderby('modid')
                        ->paginate(50);
                } else {
                    $data = Masterfile::select('masterfile.*')
                        ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                        ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                        ->where('deputy_team.profile_id',$user)
                        ->where('OVERALLSCORE','NOT LIKE','100%')
                        ->orderby('modid')
                        ->paginate(50);
                }
            } elseif ($search_modid > 0 && empty($filter_score)) {
                $data = Masterfile::select('masterfile.*')
                    ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->where('masterfile.MOD_ID','=',$search_modid)
                    ->orderby('modid')
                    ->paginate(50);
            } else {
                $data =  Masterfile::select('masterfile.*')
                    ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->orderby('modid')
                    ->paginate(50);
            }
        } else {
            $data = Masterfile::select('masterfile.*')
                ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                ->where('deputy_team.profile_id',$user)
                ->orderby('modid')
                ->paginate(50);
        }
        
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
        return view('deputy-mods.index',compact('data','mods'))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = Masterfile::find($id);
        $markdown = Markdowns::select('markdowns.*')
            ->where('markdowns.Merged',$id)
            ->where('MOD_ID',$score->MOD_ID)
            ->get();

        return view('deputy-mods.show',compact('score','markdown'));
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

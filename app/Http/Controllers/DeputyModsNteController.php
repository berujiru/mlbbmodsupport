<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Nte;
use App\Models\Ntereply;
use Illuminate\Http\Request;

class DeputyModsNteController extends Controller
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

        if(isset($_GET['mod_id']) && isset($_GET['filter_seen'])) {
            $search_modid = $request->input('mod_id');
            $seen = $request->input('filter_seen');
            if($search_modid > 0 && !empty($seen) && $seen == 1) {
                $data = Nte::select('nte.*')
                    //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                    ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->where('nte.is_seen','=',1)
                    ->where('nte.MODID','=',$search_modid)
                    ->orderby('nte.MODID')
                    ->paginate(50);
            } elseif ($search_modid > 0 && !empty($seen) && $seen == 0) {
                $data = Nte::select('nte.*')
                    //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                    ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->where('nte.is_seen','=',0)
                    ->where('nte.MODID','=',$search_modid)
                    ->orderby('nte.MODID')
                    ->paginate(50);
            } elseif (empty($search_modid) && !empty($seen)) {
                if($seen == 1) {
                    $data = Nte::select('nte.*')
                        //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                        ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                        ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                        ->where('deputy_team.profile_id',$user)
                        ->where('nte.is_seen','=',1)
                        ->orderby('nte.MODID')
                        ->paginate(50);
                } else {
                    $data = Nte::select('nte.*')
                        //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                        ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                        ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                        ->where('deputy_team.profile_id',$user)
                        ->where('nte.is_seen','=',0)
                        ->orderby('nte.MODID')
                        ->paginate(50);
                }
            } else {
                $data = Nte::select('nte.*')
                    //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                    ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                    ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                    ->where('deputy_team.profile_id',$user)
                    ->orderby('nte.MODID')
                    ->paginate(50);
            }
        } else {
            $data = Nte::select('nte.*')
                //->join('ntereply', 'ntereply.id', '=', 'nte.id')
                ->join('dbsc', 'dbsc.modid', '=', 'nte.MODID')
                ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                ->where('deputy_team.profile_id',$user)
                ->orderby('nte.MODID')
                ->paginate(50);
        }
        
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
        return view('deputy-mods-nte.index',compact('data','mods'))
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
        $nte = Nte::find($id);
        $ntereply = Ntereply::select('ntereply.*')
            ->join('nte', 'ntereply.id', '=', 'nte.id')
            ->where('ntereply.id',$nte->id)
            //->where('nte.MODID',$nte->MODID)
            ->get();
        return view('deputy-mods-nte.show',compact('nte','ntereply'));
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

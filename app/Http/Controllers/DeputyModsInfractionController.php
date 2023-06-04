<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Markdowns;
use App\Models\Masterfile;
use App\Models\Qascore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeputyModsInfractionController extends Controller
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

        if(isset($_GET['mod_id']) && isset($_GET['q_infra'])) {

            $search_modid = $request->input('mod_id');
            $q_infraction = $request->input('q_infra');
            $date_range_from = $request->input('date_range_f');
            $date_range_to = $request->input('date_range_t');

            if(isset($_GET['date_range_f'])) {
                $date_from = !empty($date_range_from) ? date("Y-m-d", strtotime($date_range_from)) : date("Y-01-01");
            } else {
                $date_from = date("Y-01-01");
            }

            if(isset($_GET['date_range_t'])) {
                $date_to = !empty($date_range_to) ? date("Y-m-d", strtotime($date_range_to)) : date("Y-m-t");
            } else {
                $date_to = date("Y-m-t");
            }

            // echo $date_from.' '.$date_to;
            // exit;

            if($search_modid > 0 && !empty($q_infraction)) {
                $data = Markdowns::select('markdowns.*')
                    ->where('markdowns.MOD_ID','=',$search_modid)
                    ->where('markdowns.Form_Attribute','LIKE',"%{$q_infraction}%")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                    ->orderByRaw("STR_TO_DATE(`Date`, '%d-%b-%y') DESC")
                    ->paginate(50);
                
                
                // Masterfile::select('masterfile.*')
                //     ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
                //     ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
                //     ->where('deputy_team.profile_id',$user)
                //     ->where('OVERALLSCORE','LIKE','100%')
                //     ->where('masterfile.MOD_ID','=',$search_modid)
                //     ->whereRaw("STR_TO_DATE(`Date`, '%m/%d/%Y') >= '".trim($date_from)."'")
                //     ->whereRaw("STR_TO_DATE(`Date`, '%m/%d/%Y') <= '".trim($date_to)."'")
                //     ->orderByRaw('modid, STR_TO_DATE(`Date`, "%m/%d/%Y") DESC')
                //     ->paginate(50);
            } elseif ($search_modid > 0 && empty($q_infraction)) {
                $data = Markdowns::select('markdowns.*')
                    ->where('markdowns.MOD_ID','=',$search_modid)
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                    ->orderByRaw("STR_TO_DATE(`Date`, '%d-%b-%y') DESC")
                    ->paginate(50);
            } elseif (empty($search_modid) && !empty($q_infraction)) {
                $data = Markdowns::select('markdowns.*')
                    ->where('markdowns.Form_Attribute','LIKE',"%{$q_infraction}%")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                    ->orderByRaw("STR_TO_DATE(`Date`, '%d-%b-%y') DESC")
                    ->paginate(50);
            } else {
                $data = Markdowns::select('*')
                    ->where('Moderator','<>',"Moderator")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                    ->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                    ->orderByRaw("STR_TO_DATE(`Date`, '%d-%b-%y') DESC")
                    ->paginate(50);
            }
        } else {
            $data = Markdowns::select('*')
                ->where('Moderator','<>',"Moderator")
                ->orderByRaw("STR_TO_DATE(`Date`, '%d-%b-%y') DESC")
                ->paginate(50);
            // $data = Masterfile::select('masterfile.*')
            //     ->join('dbsc', 'dbsc.modid', '=', 'masterfile.MOD_ID')
            //     ->join('deputy_team', 'deputy_team.team_id', '=', 'dbsc.team_id')
            //     ->where('deputy_team.profile_id',$user)
            //     ->whereRaw("STR_TO_DATE(`Date`, '%m/%d/%Y') >= '".trim(date("2020-01-01"))."'")
            //     ->whereRaw("STR_TO_DATE(`Date`, '%m/%d/%Y') <= '".trim(date("Y-m-t"))."'")
            //     ->orderByRaw('modid, STR_TO_DATE(`Date`, "%m/%d/%Y") DESC')
            //     ->paginate(50);
        }

        $date_update_format = DB::table('markdowns')
            ->whereRaw("LENGTH(`Date`) < 9 AND `Date` NOT LIKE 'Date'")
            ->update(['Date' => DB::raw("CONCAT('0', `Date`)")]);
        
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
        return view('deputy-mods-infra.index',compact('data','mods'))
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

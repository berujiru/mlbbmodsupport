<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\Markdowns;
use App\Models\Masterfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModScoreSummaryController extends Controller
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

        if(isset($_GET['mod_id'])) {
            $search_modid = $request->input('mod_id');
            $filter_score = $request->input('filter_score');
            if($search_modid > 0) {
                $data = Masterfile::select("MOD_ID", "MODERATOR",
                DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM OVERALLSCORE)),2) AS overall_score"),
                DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m') AS 'month_yr'"),)
                    ->where('OVERALLSCORE','NOT LIKE','%A%')
                    ->where('OVERALLSCORE','<>',"''")
                    ->where('MOD_ID',"=",$search_modid)
                    ->groupby('MOD_ID',DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m')"))
                    ->orderByRaw(DB::raw("STR_TO_DATE(`Date`, '%m/%d/%Y')")." DESC")
                    ->paginate(50);
            } else {
                $data = Masterfile::select("MOD_ID", "MODERATOR",
                DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM OVERALLSCORE)),2) AS overall_score"),
                DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m') AS 'month_yr'"),)
                    ->where('OVERALLSCORE','NOT LIKE',"'%A%'")
                    ->where('OVERALLSCORE','<>',"''")
                    ->groupby('MOD_ID',DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m')"))
                    ->orderByRaw(DB::raw("STR_TO_DATE(`Date`, '%m/%d/%Y')")." DESC")
                    ->paginate(50);
            }
        } else {
            $data = Masterfile::select("MOD_ID", "MODERATOR",
                DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM OVERALLSCORE)),2) AS overall_score"),
                DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m') AS 'month_yr'"),)
                    ->where('OVERALLSCORE','NOT LIKE',"'%A%'")
                    ->where('OVERALLSCORE','<>',"''")
                    ->groupby('MOD_ID',DB::raw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m')"))
                    ->orderByRaw(DB::raw("STR_TO_DATE(`Date`, '%m/%d/%Y')")." DESC")
                    ->paginate(50);
        }
        
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
        return view('score-summary.index',compact('data','mods'))
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
        // $score = Masterfile::find($id);
        // $markdown = Markdowns::select('markdowns.*')
        //     ->where('markdowns.Merged',$id)
        //     ->where('MOD_ID',$score->MOD_ID)
        //     ->get();

        // return view('deputy-mods.show',compact('score','markdown'));
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

<?php

namespace App\Http\Controllers;

use App\Exports\ExportAttributeSummaryInfraction;
use App\Exports\ExportInfractionAttributeSummary;
use App\Exports\ExportSummaryCommittedInfraction;
use App\Exports\ExportTeamSummary;
use App\Exports\TeamCommittedInfraction;
use App\Models\Attribute;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Models\Dbsc;
use App\Models\Markdowns;
use App\Models\Masterfile;
use App\Models\ModBirthdayPicture;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class QaDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(date("H") >= 12 && date("H:i") < date("H:i",strtotime("17:59"))) {
            $greeting = "Good Afternoon";
        } elseif(date("H") >= 18) {
            $greeting = "Good Evening";
        } else {
            $greeting = "Good Morning";
        }
        $dbsc = Dbsc::find(auth()->user()->id);

        if(!empty($dbsc)) {
            $greeting_name = $dbsc->firstname;
        }

        $list_teams = Dbsc::select('dbsc.team_id','team.team_name',
                DB::raw('COUNT(*) AS number_people'),
                DB::raw("(SELECT CONCAT(dbsc.`firstname`,' ',dbsc.`lastname`)
                    FROM `deputy_team` INNER JOIN dbsc ON deputy_team.`profile_id` = dbsc.`id`
                    WHERE deputy_team.`team_id` = team.`team_id`) AS headed_by"))
                ->join('team', 'team.team_id', '=', 'dbsc.team_id')
                ->where('team.status_id',1)
                //->join('deputy_team', 'deputy_team.team_id', '=', 'team.team_id')
                //->groupby('dbsc.team_id','team.team_name','team.team_id')
                ->groupby('dbsc.team_id')
                ->orderby('team_name')
                ->get();
        
        $overall_score = Masterfile::select(
                DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `OVERALLSCORE`)),2) AS overall_score"))
                ->where('OVERALLSCORE','NOT LIKE',"'%A%'")
                ->where('OVERALLSCORE','<>',"''")
                ->get();
        
        $accuracy_score = Masterfile::select(
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `ScoreonAccuracy`)),2) AS accuracy_score"))
            ->where('ScoreonAccuracy','NOT LIKE',"'%e%'")
            ->where('ScoreonAccuracy','<>',"''")
            ->get();
        
        $timeliness_score = Masterfile::select(
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `ScoreonTimeliness`)),2) AS timeliness_score"))
            ->where('ScoreonTimeliness','NOT LIKE',"'%e%'")
            ->where('ScoreonTimeliness','<>',"''")
            ->get();
    
        $communication_score = Masterfile::select(
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `ScoreonCommunication`)),2) AS communication_score"))
            ->where('ScoreonCommunication','NOT LIKE',"'%e%'")
            ->where('ScoreonCommunication','<>',"''")
            ->get();
        
        $date_update_format = DB::table('markdowns')
            ->whereRaw("LENGTH(`Date`) < 9 AND `Date` NOT LIKE 'Date'")
            ->update(['Date' => DB::raw("CONCAT('0', `Date`)")]);

        $infra_teams = Markdowns::select('Team','Form_Attribute',
            DB::raw('SUM(`Infractions`) AS infractions'))
            ->where('Team','<>',"'Team'")
            ->groupby('Team','Form_Attribute')
            ->orderByRaw(DB::raw("Team")." ASC")
            ->get();

        $infra_form_attrib = Markdowns::select('Form_Attribute',
            DB::raw('SUBSTRING(`Form_Attribute`, 1,1) AS attrib'),
            DB::raw("(
                CASE 
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'A' THEN 'Accuracy'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'C' THEN 'Communication'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'T' THEN 'Timeliness'
                END) AS attrib_name"),
            DB::raw('SUM(`Infractions`) AS infractions'))
            ->where('Team','<>',"'Team'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'F'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'K'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'Z'")
            ->groupby('Form_Attribute')
            //->orderByRaw(DB::raw("Team")." ASC")
            ->get();
        
        $summary_infra_attrib = Markdowns::select('Form_Attribute',
            DB::raw('SUBSTRING(`Form_Attribute`, 1,1) AS attrib'),
            DB::raw('SUBSTRING(`Date`, 4,6) AS mo_yr'),
            DB::raw("(
                CASE 
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'A' THEN 'Accuracy'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'C' THEN 'Communication'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'T' THEN 'Timeliness'
                END) AS attrib_name"),
            DB::raw('SUM(`Infractions`) AS infractions'))
            ->where('Team','<>',"'Team'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'F'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'K'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'Z'")
            ->groupby(DB::raw("SUBSTRING(`Form_Attribute`, 1,1)"))
            //->orderByRaw(DB::raw("Team")." ASC")
            ->get();
        
        $summary_infra_mo_yr = Markdowns::select('Form_Attribute',
            DB::raw('SUBSTRING(`Form_Attribute`, 1,1) AS attrib'),
            DB::raw('SUBSTRING(`Date`, 4,6) AS mo_yr'),
            DB::raw("GROUP_CONCAT(DISTINCT SUBSTRING(`Date`, 4,3) SEPARATOR ',') mo_now"),
            DB::raw("(
                CASE 
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'A' THEN 'Accuracy'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'C' THEN 'Communication'
                    WHEN SUBSTRING(`Form_Attribute`, 1,1) = 'T' THEN 'Timeliness'
                END) AS attrib_name"),
            DB::raw('SUM(`Infractions`) AS infractions'))
            ->where('Team','<>',"'Team'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'F'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'K'")
            ->whereRaw("SUBSTRING(`Form_Attribute`, 1,1) <> 'Z'")
            ->whereRaw("SUBSTRING(`Date`, 8,2) = DATE_FORMAT(NOW(), '%y')") //offline
            //->whereRaw("SUBSTRING(`Date`, 8,4) = DATE_FORMAT(NOW(), '%Y')") //online
            //->groupby('Form_Attribute')
            ->groupbyRaw(DB::raw("SUBSTRING(`Form_Attribute`, 1,1),SUBSTRING(`Date`, 4,6)"))
            //->orderByRaw(DB::raw("Team")." ASC")
            ->get();

        $overall_team_summary = Masterfile::select('Team',
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `OVERALLSCORE`)),2) AS overall_score"),
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonAccuracy)),2) AS accuracy_score"),
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonTimeliness)),2) AS timeliness_score"),
            DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonCommunication)),2) AS communication_score"))
            ->where('OVERALLSCORE','NOT LIKE',"'%A%'")
            ->where('OVERALLSCORE','<>',"''")
            ->where('ScoreonCommunication','NOT LIKE',"'%e%'")
            ->where('ScoreonCommunication','<>',"''")
            ->where('ScoreonTimeliness','NOT LIKE',"'%e%'")
            ->where('ScoreonTimeliness','<>',"''")
            ->where('ScoreonAccuracy','NOT LIKE',"'%e%'")
            ->where('ScoreonAccuracy','<>',"''")
            ->where('Team','<>',"'Team'")
            ->groupby('Team')
            ->orderby('Team')
            ->get();

        $list_attributes = Attribute::select('*')
                ->orderby('attribute_name')
                ->get();

        //echo auth()->user()->id;
        // echo "<pre>";
        // print_r($summary_infra_mo_yr);
        // echo "</pre>";
        // exit;
        return view('index-qa',compact('dbsc','overall_score','accuracy_score','timeliness_score','communication_score','infra_teams','overall_team_summary','greeting','list_attributes','infra_form_attrib','summary_infra_mo_yr','summary_infra_attrib'));
        //return view('index');
    }

    public function exportTeamSummary()
    {
        return Excel::download(new ExportTeamSummary, 'Team_Summary'.date('YmdH:i:s').'.xlsx');
    }

    public function exportTeamInfraction()
    {
        return Excel::download(new TeamCommittedInfraction, 'Team_Commited_Infraction'.date('YmdH:i:s').'.xlsx');
    }

    public function exportInfractionAttribute()
    {
        return Excel::download(new ExportInfractionAttributeSummary, 'Infraction_Per_Attribute'.date('YmdH:i:s').'.xlsx');
    }

    public function exportSummaryCommittedInfraction()
    {
        return Excel::download(new ExportSummaryCommittedInfraction, 'Summary_Infraction'.date('YmdH:i:s').'.xlsx');
    }

    public function exportAttributeSummary()
    {
        return Excel::download(new ExportAttributeSummaryInfraction, 'Attribute_Summary_Infraction'.date('YmdH:i:s').'.xlsx');
    }
}

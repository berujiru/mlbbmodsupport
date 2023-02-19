<?php

namespace App\Http\Controllers;

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

class QaDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'resetpassword','sendresetpassword'
        ]]);
    }

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

        $infra_teams = Markdowns::select('Team','Form_Attribute',
            DB::raw('SUM(`Infractions`) AS infractions'))
            ->where('Team','<>',"'Team'")
            ->groupby('Team','Form_Attribute')
            ->orderByRaw(DB::raw("Team")." ASC")
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

        //active mapped accounts
        $active_accounts = DB::table('users')
            ->join('dbsc', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->count();

        $today_birthdays = Dbsc::select('modid','firstname','lastname','birthday','users.avatar as avatar')
            ->leftJoin('users', 'users.id', '=', 'dbsc.id')
            ->where(DB::raw("DATE_FORMAT(birthday,'%m-%d')"),date("m-d"))
            ->orderByRaw('lastname, firstname')
            ->get();
        //only mapped active accounts
        $total_male = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where('dbsc.sex','male')
            ->count();
        //only mapped active accounts
        $total_female = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where('dbsc.sex','female')
            ->count();
        //newly registered active accounts
        $total_newly_registered = DB::table('dbsc')
            ->join('users', 'users.id', '=', 'dbsc.id')
            ->where('users.status',1)
            ->where(DB::raw("DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),DATE_FORMAT(dbsc.created_at,'%Y-%m-%d'))"),"<",31)
            ->count();
        $birthday_cards = ModBirthdayPicture::select('mod_id','pic_name','pic_filename','birthday')
            ->join('dbsc', 'dbsc.modid', '=', 'mod_birthday_pic.mod_id')
            ->where(DB::raw("DATE_FORMAT(birthday,'%m-%d')"),date("m-d"))
            ->orderByRaw('firstname')
            ->get();

            // echo "<pre>";
            // print_r($birthday_cards);
            // exit;
            // echo "</pre>";
        //number of teams
        $total_teams = DB::table('team')->where('status_id',1)->count();
        //echo auth()->user()->id;
        // echo "<pre>";
        // print_r($list_teams);
        // echo "</pre>";
        // exit;
        return view('index-qa',compact('dbsc','overall_score','accuracy_score','timeliness_score','communication_score','infra_teams','overall_team_summary','greeting','active_accounts','today_birthdays','total_male','total_female','list_teams','list_attributes','total_newly_registered','total_teams','birthday_cards'));
        //return view('index');
    }
}

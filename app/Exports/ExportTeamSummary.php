<?php

namespace App\Exports;

use App\Models\Masterfile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTeamSummary implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $overall_team_summary = Masterfile::select('Team',
        //     DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM `OVERALLSCORE`)),2) AS overall_score"),
        //     DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonAccuracy)),2) AS accuracy_score"),
        //     DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonTimeliness)),2) AS timeliness_score"),
        //     DB::raw("FORMAT(AVG(TRIM(TRAILING '%' FROM ScoreonCommunication)),2) AS communication_score"))
        //     ->where('OVERALLSCORE','NOT LIKE',"'%A%'")
        //     ->where('OVERALLSCORE','<>',"''")
        //     ->where('ScoreonCommunication','NOT LIKE',"'%e%'")
        //     ->where('ScoreonCommunication','<>',"''")
        //     ->where('ScoreonTimeliness','NOT LIKE',"'%e%'")
        //     ->where('ScoreonTimeliness','<>',"''")
        //     ->where('ScoreonAccuracy','NOT LIKE',"'%e%'")
        //     ->where('ScoreonAccuracy','<>',"''")
        //     ->where('Team','<>',"'Team'")
        //     ->groupby('Team')
        //     ->orderby('Team')
        //     ->get();

        // return $overall_team_summary;
    }

    public function view(): View
    {
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

        return view('export.export-team-summary', [
            'overall_team_summary' => $overall_team_summary
        ]);
    }
}

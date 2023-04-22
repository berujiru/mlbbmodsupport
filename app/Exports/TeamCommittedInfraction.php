<?php

namespace App\Exports;

use App\Models\Markdowns;
use App\Models\Masterfile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TeamCommittedInfraction implements FromView
{
    public function view(): View
    {
        $infra_teams = Markdowns::select('Team','Form_Attribute',
        DB::raw('SUM(`Infractions`) AS infractions'))
        ->where('Team','<>',"'Team'")
        ->groupby('Team','Form_Attribute')
        ->orderByRaw(DB::raw("Team")." ASC")
        ->get();

        return view('export.export-team-committed-infraction', [
            'infra_teams' => $infra_teams
        ]);
    }
}

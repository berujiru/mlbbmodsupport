<?php

namespace App\Exports;

use App\Models\Markdowns;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSummaryCommittedInfraction implements FromView
{
    public function view(): View
    {
        $summary_infra = Markdowns::select('Form_Attribute',
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

        return view('export.export-infraction-attribute', [
            'summary_infra' => $summary_infra,
            'w_year' => 0,
        ]);
    }
}

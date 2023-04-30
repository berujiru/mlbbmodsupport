<?php

namespace App\Exports;

use App\Models\Markdowns;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAttributeSummaryInfraction implements FromView
{
    public function view(): View
    {
        $attrib_summary = Markdowns::select('Form_Attribute',
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

        return view('export.export-attribute-summary', [
            'attrib_summary' => $attrib_summary
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\UserPlan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class UsersPlanExport implements FromView
{
    public function view(): View
    {
        return view('pages.user-plan.exportsPlan', [ 'plans' => UserPlan::where('sys_state','!=','-1')->get() ]);
    }
}

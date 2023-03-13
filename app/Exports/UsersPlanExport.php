<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;


class UsersPlanExport implements FromView
{
   public function view(): View
    {
        // return view('pages.user-plan.exportsPlan', [ 'plans' => UserPlan::where('sys_state','!=','-1')->get() ]);
        $data = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Naman Makwana',
                'email' => 'naman@example.com',            
            ]           
        ];

        return view('pages.user-plan.exportsPlan', [
            'plans' => $data,
        ]);
    }
    
}

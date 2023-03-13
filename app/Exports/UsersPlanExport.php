<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;


class UsersPlanExport implements FromView, WithEvents
{
   public function view(): View
    {
        // return view('pages.user-plan.exportsPlan', [ 'plans' => UserPlan::where('sys_state','!=','-1')->get() ]);
        $data = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'details' => '<table><tr><td>cell1</td><td>cell2</td><td>cell3</td></tr><tr><td>cell1</td><td>cell2</td><td>cell3</td></tr></table>',
            ],
            [
                'id' => 2,
                'name' => 'Naman Makwana',
                'email' => 'naman@example.com',
                'details' => '<table><tr><td>cell4</td><td>cell5</td><td>cell6</td></tr><tr><td>cell4</td><td>cell5</td><td>cell6</td></tr></table>',
            ]           
        ];

        return view('pages.user-plan.exportsPlan', [
            'plans' => $data,
        ]);
    }
    
}

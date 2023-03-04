<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\BilingCycle;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        if($request->ajax()){
            // dd($request->all());    
            if($request->id == '' || $request->id == "0"){
                $validator = Validator::make($request->all(), [
                    'billing_name' => 'required',
                    'billing_amount' => 'required',
                    'billing_percentage' => 'required',
                    'billing_upgrade_downgrade' => 'required',
                ],
                $message = [
                    'billing_name.required' => 'The Billing Cycle Name Is Required.',
                    'billing_amount.required' => 'The Billing Amount Is Required.',
                    'billing_percentage.required' => 'The Billing Percentage Is Required.',
                    'billing_upgrade_downgrade.required' => 'The Upgrade/Downgrade Name Is Required.',
                ]);
                if ($validator->passes()){
                    $billing_name = $request->billing_name;
                    $billing_amount = $request->billing_amount;
                    $billing_percentage = $request->billing_percentage;
                    $billing_upgrade_downgrade = $request->billing_upgrade_downgrade;
                    $sub_menu_id = $request->sub_menu_id;
                    $save_billing = BilingCycle::create([
                        'billing_name'=>$billing_name,
                        'billing_amount'=>$billing_amount,
                        'billing_percentage'=>$billing_percentage,
                        'billing_upgrade_downgrade'=>$billing_upgrade_downgrade,
                        'sub_menu_id'=>$sub_menu_id
                    ]);
                    session()->flash('success', 'Billing Cycle created successfully!');
                    return response()->json([
                        'success' => 'Billing Cycle successfully!',
                        'title' => 'Billing Cycle',
                        'type' => 'create',
                        'data' => $save_billing
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'billing_name' => 'required',
                    'billing_amount' => 'required',
                    'billing_percentage' => 'required',
                    'billing_upgrade_downgrade' => 'required',
                ],
                $message = [
                    'billing_name.required' => 'The Billing Cycle Name Is Required.',
                    'billing_amount.required' => 'The Billing Amount Is Required.',
                    'billing_percentage.required' => 'The Billing Percentage Is Required.',
                    'billing_upgrade_downgrade.required' => 'The Upgrade/Downgrade Name Is Required.',
                ]);

                if ($validator->passes()){
                    $billing = BilingCycle::find($request->id);

                    $billing_name = $request->billing_name;
                    $billing_amount = $request->billing_amount;
                    $billing_percentage = $request->billing_percentage;
                    $billing_upgrade_downgrade = $request->billing_upgrade_downgrade;
                    $sub_menu_id = $request->sub_menu_id;
                    
                    $billing->update([
                        'billing_name'=>$billing_name,
                        'billing_amount'=>$billing_amount,
                        'billing_percentage'=>$billing_percentage,
                        'billing_upgrade_downgrade'=>$billing_upgrade_downgrade,
                        'sub_menu_id'=>$sub_menu_id
                    ]);

                    session()->flash('success', 'Billing Cycle Updated successfully!');
                    return response()->json([
                        'success' => 'Billing Cycle updated successfully!',
                        'title' => 'Billing Cycle',
                        'type' => 'update',
                        'data' => $billing
                    ]);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }    

    public function remove(Request $request)
    { 
        try{
            $model = new BilingCycle();
            helper::sysDelete($model,$request->id);
            return response()->json([
                'success' => 'Billing Cycle deleted successfully!',
                'title' => 'Billing Cycle',
                'type' => 'delete',
            ], Response::HTTP_OK);
        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Billing Cycle'
            ], Response::HTTP_OK);
        }
    }
}

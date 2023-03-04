<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\PlanPlanBillingCycle;
use App\Models\PlanPricing;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PlanPricingController extends Controller
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
        if ($request->ajax()) {
            if ($request->id == '' || $request->id == "0") {                
                $validator = Validator::make(
                    $request->all(),
                    [                       
                        'storage' => 'required',                        
                        'storage_price' => 'required',
                        'billing_cycle' => 'required|not_in:0',
                        'planPricingServer' => 'required',
                        // 'window_server_percentage' => 'required',
                        'upgrade_downgrade' => 'required',
                        'final_price' => 'required',
                    ],
                    $message = [                        
                        'storage.required' => 'The Storage GB Is Required.',                      
                        'storage_price.required' => 'The Storage Price Per GB Is Required.',                      
                        'billing_cycle.required' => 'The Billing Cycle Is Required.',                      
                        'billing_cycle.not_in' => 'The Billing Cycle Is Required.',                      
                        'planPricingServer.required' => 'The Server Type Is Required.',                      
                        // 'window_server_percentage.required' => 'The Windows Server Percentage Is Required.',                      
                        'upgrade_downgrade.required' => 'The Upgrade/Downgrade Is Required.',                      
                        'final_price.required' => 'The Price Is Required.',                      
                    ]
                );
                if ($validator->passes()) {   
                            
                    $storage = $request->storage;
                    $storage_price = $request->storage_price;
                    $billing_cycle = $request->billing_cycle;
                    $planPricingServer = $request->planPricingServer;
                    $window_server_percentage = $request->window_server_percentage ?? '';
                    $upgrade_downgrade = $request->upgrade_downgrade;
                    $final_price = $request->final_price;
                    $save_plan_pricing = PlanPricing::create([
                        'storage' => $storage, 
                        'storage_price' => $storage_price, 
                        'billing_cycle' => $billing_cycle, 
                        'server' => $planPricingServer, 
                        'window_server' => $window_server_percentage, 
                        'upgrade_downgrade' => $upgrade_downgrade, 
                        'price' => $final_price
                    ]);
                    session()->flash('success', 'Plan Pricing created successfully!');
                    return response()->json([
                        'success' => 'Plan Pricing Added successfully!',
                        'title' => 'Plan Pricing',
                        'type' => 'create',
                        'data' => $save_plan_pricing
                    ], Response::HTTP_OK);
                } else {
                    return response()->json(['error' => $validator->getMessageBag()->toArray()]);
                }
            } else {
                $validator = Validator::make(
                    $request->all(),
                    [                       
                        'storage' => 'required',                        
                        'storage_price' => 'required',
                        'billing_cycle' => 'required|not_in:0',
                        'planPricingServer' => 'required',
                        // 'window_server_percentage' => 'required',
                        'upgrade_downgrade' => 'required',
                        'final_price' => 'required',
                    ],
                    $message = [                        
                        'storage.required' => 'The Storage GB Is Required.',                      
                        'storage_price.required' => 'The Storage Price Per GB Is Required.',                      
                        'billing_cycle.required' => 'The Billing Cycle Is Required.',                      
                        'billing_cycle.not_in' => 'The Billing Cycle Is Required.',                      
                        'planPricingServer.required' => 'The Server Type Is Required.',                      
                        // 'window_server_percentage.required' => 'The Windows Server Percentage Is Required.',                      
                        'upgrade_downgrade.required' => 'The Upgrade/Downgrade Is Required.',                      
                        'final_price.required' => 'The Price Is Required.',                      
                    ]
                );
                if ($validator->passes()) {
                    $plan_pricing = PlanPricing::find($request->id);

                    $storage = $request->storage;
                    $storage_price = $request->storage_price;
                    $billing_cycle = $request->billing_cycle;
                    $planPricingServer = $request->planPricingServer;
                    $window_server_percentage = $request->window_server_percentage ?? '';
                    $upgrade_downgrade = $request->upgrade_downgrade;
                    $final_price = $request->final_price;

                    $plan_pricing->update([
                        'storage' => $storage, 
                        'storage_price' => $storage_price, 
                        'billing_cycle' => $billing_cycle, 
                        'server' => $planPricingServer, 
                        'window_server' => $window_server_percentage, 
                        'upgrade_downgrade' => $upgrade_downgrade, 
                        'price' => $final_price
                    ]);

                    session()->flash('success', 'Plan Pricing Updated successfully!');
                    return response()->json([
                        'success' => 'Plan Pricing updated successfully!',
                        'title' => 'Plan Pricing',
                        'type' => 'update',
                        'data' => $plan_pricing
                    ]);
                } else {
                    return response()->json(['error' => $validator->getMessageBag()->toArray()]);
                }
            }
        }
    }

    public function remove(Request $request)
    {
        try {
            $model = new PlanPricing();
            helper::sysDelete($model, $request->id);
            return response()->json([
                'success' => 'Plan Pricing deleted successfully!',
                'title' => 'Plan Pricing',
                'type' => 'delete',
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Plan Pricing'
            ], Response::HTTP_OK);
        }
    }

    public function planBillingStore(Request $request){
        if($request->ajax()){
            if($request->id == '' || $request->id == "0"){
                $validator = Validator::make($request->all(), [
                    'plan_billing_name' => 'required',
                ],
                $message = [
                    'plan_billing_name.required' => 'The Billing Cycle Name Is Required.',
                ]);
                if ($validator->passes()){
                    $plan_billing_name = $request->plan_billing_name;                    
                    $save_billing = PlanPlanBillingCycle::create(['plan_billing_name'=>$plan_billing_name]);
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
            }
        }
    }
}

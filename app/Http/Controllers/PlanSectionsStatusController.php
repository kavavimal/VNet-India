<?php

namespace App\Http\Controllers;
use App\Models\PlanSectionsStatus;

use Illuminate\Http\Request;

class PlanSectionsStatusController extends Controller
{
    //
    function __construct()
    {
    }
    
    public function store(Request $request){
        if($request->ajax()){
            if($request->id == "0"){
                $validator = Validator::make($request->all(), [
                    'planName' => 'required',
                    'product_id' => 'required|not_in:0'
                ],
                $message = [
                    'planName.required' => 'The Plan Name Is Required.',
                    'product_id.required' => 'Please Select Product.',
                    'product_id.not_in' => 'Please Select Product.'
                ]);
                if ($validator->passes()){
                    $planName = $request->planName;
                    $product_id = $request->product_id;

                    $save_plan = Plan::create(['plan_name'=>$planName , 'plan_product_id'=>$product_id]);
                   
                    session()->flash('success', 'Plan created successfully!');

                    return response()->json([
                        'success' => 'plan updated successfully!',
                        'data' => $save_plan
                    ]);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{                
                $validator = Validator::make($request->all(), [
                    'planName' => 'required',
                    'product_id' => 'required|not_in:0'
                ],
                $message = [
                    'planName.required' => 'The Plan Name Is Required.',
                    'product_id.required' => 'Please Select Product.',
                    'product_id.not_in' => 'Please Select Product.'
                ]);                
                if ($validator->passes()){                   
                    $plan = Plan::find($request->id);
                    $planName = $request->planName;
                    $product_id = $request->product_id;
                    
                    $billingCycle = $request->billing_cycle;
                    $planPricing = $request->planPricing;
                    $taxation = $request->taxation;
                    $specification = $request->specification;
                    $featuredCategory = $request->featuredCategory;
                    $featuredSubCategory = $request->featuredSubCategory;
                    $negotiation_min = $request->negotiation_min;
                    $negotiation_max = $request->negotiation_max;
                    $negotiation_status = $request->negotiation_status;
                    $service_type_type = $request->service_type_type;
                    $service_type_price = $request->service_type_price;
                    $servive_type_currency = $request->servive_type_currency;
                    $service_type_renewal_price = $request->service_type_renewal_price;
                    $service_type_discount = $request->service_type_discount;

                    $plan->update([
                        'plan_name'=>$planName,
                        'plan_product_id'=>$product_id,
                        'billing_cycles'=>$billingCycle,
                        'plan_pricingids'=>$planPricing,
                        'taxation'=>$taxation,
                        'specification'=>$specification,
                        'featured_category'=>$featuredCategory,
                        'featured_sub_category'=>$featuredSubCategory,
                        'negotiation_min'=>$negotiation_min,
                        'negotiation_max'=>$negotiation_max,
                        'negotiation_status'=>$negotiation_status,
                        'service_type_type'=>$service_type_type,
                        'service_type_price'=>$service_type_price,
                        'servive_type_currency'=>$servive_type_currency,
                        'service_type_renewal_price'=>$service_type_renewal_price,
                        'service_type_discount'=>$service_type_discount,
                    ]);
                    
                    session()->flash('success', 'Plan Updated successfully!');
                    return response()->json([
                        'success' => 'Plan updated successfully!',
                        'title' => 'Plan',
                        'type' => 'Update',
                    ]);
                } else {
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }
}

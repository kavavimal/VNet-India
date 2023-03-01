<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Plan;
use App\Models\Specification;
use App\Models\FeaturedCategory;
use App\Models\BilingCycle;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PlanController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:plan-list|plan-create|plan-edit|plan-delete', ['only' => ['index','show']]);
        $this->middleware('permission:plan-create', ['only' => ['edit','store']]);
        $this->middleware('permission:plan-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:plan-delete', ['only' => ['destroy']]);
        $this->middleware('permission:plan-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }
    public function index()
    {
        $plan = Plan::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        return view('pages.plan.index', compact('plan'));
    }

    public function edit($id)
    {
        $plan = Plan::where('id',$id)->first();        
        $billingCycleSelected = (!empty($plan->billing_cycles)) ? explode(',', $plan->billing_cycles) : '';
        $specificationsSelected = (!empty($plan->specification)) ? explode(',', $plan->specification) : '';
        $featuredCategorysSelected = (!empty($plan->featured_category)) ? explode(',', $plan->featured_category) : '';
        $featuredSubCategorySelected = (!empty($plan->featured_sub_category)) ? explode(',', $plan->featured_sub_category) : '';
        $taxationSelected = (!empty($plan->taxation)) ? explode(',', $plan->taxation) : '';

        $specifications = Specification::where('sys_state','!=','-1')->orderBy('spec_name','desc')->get();
        $featuredCategory = FeaturedCategory::where('sys_state','!=','-1')->with('children')->orderBy('featured_cat_name','desc')->get();
        $bilingCycle = BilingCycle::where('sys_state','!=','-1')->orderBy('billing_name','desc')->get();
        $tax = Tax::where('sys_state','!=','-1')->get();
        $product_list = Product::where('sys_state','!=','-1')->get();
        return view('pages.plan.edit', compact(
            'plan',
            'specifications',
            'product_list',
            'featuredCategory',
            'bilingCycle',
            'tax',
            'billingCycleSelected',
            'specificationsSelected',
            'featuredCategorysSelected',
            'featuredSubCategorySelected',
            'taxationSelected',
        ));
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

    public function remove($id)
    {
        try{
            $model = new Plan();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'Plan deleted successfully!',
                    'title' => 'Plan'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'Plan'
                ]);
        }
    }
}

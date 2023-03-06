<?php

namespace App\Http\Controllers\UserPlan;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Plan;
use App\Models\Specification;
use App\Models\FeaturedCategory;
use App\Models\BilingCycle;
use App\Models\ServerLocation;
use App\Models\PlanPricing;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use App\Models\SubMenu;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserPlanController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:user-plan-list|user-plan-create|user-plan-edit|user-plan-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-plan-create', ['only' => ['edit','store']]);
        $this->middleware('permission:user-plan-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:user-plan-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-plan-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }
    public function index()
    {
        $plan = Plan::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        $category_list = Category::where('sys_state','!=','-1')->get();
        $submenu = [];
        return view('pages.user-plan.index', compact('plan','category_list','submenu'));
    }

    public function getByCategoryId($id){
        $get_filter_plans = [];
        if(isset($id) && $id !== "0"){
            $get_filter_plans = Plan::where('plan_product_id', $id)->where('sys_state','!=','-1')->get();
        } else {
            $get_filter_plans = Plan::where('sys_state','!=','-1')->get();
        }
        $html = view('pages.plan.planTableBody', ['plan' => $get_filter_plans])->render();
        return response()->json([
            'success' => 'Plan Listed successfully!',
            'title' => 'Plan',
            'type' => 'list',
            'list' => $get_filter_plans,
            'html' => $html,
        ], Response::HTTP_OK);
    }

    public function edit($id)
    {
        $plan = Plan::where('id',$id)->first();        
        $billingCycleSelected = (!empty($plan->billing_cycles)) ? explode(',', $plan->billing_cycles) : '';
        $planPricingSelected = (!empty($plan->plan_pricingids)) ? explode(',', $plan->plan_pricingids) : '';
        $specificationsSelected = (!empty($plan->specification)) ? explode(',', $plan->specification) : '';
        $featuredCategorysSelected = (!empty($plan->featured_category)) ? explode(',', $plan->featured_category) : '';
        $featuredSubCategorySelected = (!empty($plan->featured_sub_category)) ? explode(',', $plan->featured_sub_category) : '';
        $taxationSelected = (!empty($plan->taxation)) ? explode(',', $plan->taxation) : '';
        $specifications = '';
        $bilingCycle = '';
        $featuredCategory = '';
        $tax = '';        
        if(!empty($plan)){
            $menu_id = SubMenu::where('id',$plan->plan_product_id)->where('sys_state','!=','-1')->get()->pluck('category_id')->first();
            
            $specifications = Specification::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->orderBy('spec_name','desc')->get();
            $featuredCategory = FeaturedCategory::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->with('children')->orderBy('featured_cat_name','desc')->get();
            $bilingCycle = BilingCycle::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->orderBy('billing_name','desc')->get();
            $tax = Tax::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->get();
        }
        $product_list = SubMenu::where('sys_state','!=','-1')->get();
        $server_locations = ServerLocation::where('sys_state','!=','-1')->get();
        $plan_pricing = PlanPricing::where('sys_state','!=','-1')->get();

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
            'server_locations',
            'plan_pricing',
            'planPricingSelected',
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

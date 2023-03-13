<?php

namespace App\Http\Controllers\SubMenu;

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
use App\Models\SubMenSpecification;
use App\Models\PlanSectionsStatus;
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

class SubMenuController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:submenu-list|submenu-create|submenu-edit|submenu-delete', ['only' => ['index','show']]);
        $this->middleware('permission:submenu-create', ['only' => ['edit','store']]);
        $this->middleware('permission:submenu-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:submenu-delete', ['only' => ['destroy']]);
        $this->middleware('permission:submenu-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }
    public function index()
    {
        $submenu = SubMenu::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        $category_list = Category::where('sys_state','!=','-1')->get();
        return view('pages.submenu.index',compact('submenu','category_list'));
    }

    public function edit($id)
    {
        $submenu = SubMenu::where('id',$id)->first();
        $category_list = Category::where('sys_state','!=','-1')->get();
        return view('pages.submenu.edit',compact('submenu','category_list'));
    }

    public function getByMenuId($id, $type = 'tbody'){
        $get_submenu = [];
        if(isset($id) && $id !== "0"){
            $get_submenu = SubMenu::where('category_id', $id)->where('sys_state','!=','-1')->get();
        } else {
            $get_submenu = SubMenu::where('sys_state','!=','-1')->get();
        }
        $html = '';
        if ($type === 'select') {
            $html = view('pages.submenu.subMenuSelectbox', ['submenu' => $get_submenu])->render();
        } else {
            $html = view('pages.submenu.subMenuTableBody', ['submenu' => $get_submenu])->render();
        }
        return response()->json([
            'success' => 'Sub Menu Listed successfully!',
            'title' => 'Sub Menu',
            'type' => 'list',
            'list' => $get_submenu,
            'html' => $html,
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        if($request->ajax()){           
            if($request->id == "0"){
                $validator = Validator::make($request->all(), [                   
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0',
                    // 'desc' => 'required',
                ],
                $message = [
                    'name.required' => 'The Sub Menu Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.',
                    // 'desc' => 'Please Add Description for submenu.'
                ]);
                if ($validator->passes()){
                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = '';

                    $save_submenu = SubMenu::create(['submenu_name'=>$name , 'submenu_desc'=>$desc , 'category_id'=> $cat_id]);
                   
                    session()->flash('success', 'Sub Menu created successfully!');

                    return response()->json([
                        'success' => 'Sub Menu created successfully!',
                        'title' => 'Sub Menu',
                        'type' => 'create',
                        'data' => $save_submenu
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0',
                    // 'desc' => 'required'
                ],
                $message = [
                    'name.required' => 'The Sub Menu Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.',
                    // 'desc' => 'Please Add Description for submenu.'
                ]);

                if ($validator->passes()){
                    $submenu = SubMenu::find($request->id);

                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = $request->desc;

                    $submenu->update(['submenu_name'=> $name , 'submenu_desc'=>$desc , 'category_id' => $cat_id]);

                    session()->flash('success', 'Sub Menu Updated successfully!');
                    return response()->json([
                        'success' => 'Sub Menu updated successfully!',
                        'title' => 'Sub Menu',
                        'type' => 'update',
                        'data' => $submenu
                    ]);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }

    public function editspecification($id)
    {
        $submenuid = $id;
        $plan = SubMenSpecification::where('id',$id)->first();        
        $billingCycleSelected = (!empty($plan->billing_cycles)) ? explode(',', $plan->billing_cycles) : '';
        $planPricingSelected = (!empty($plan->plan_pricingids)) ? explode(',', $plan->plan_pricingids) : '';
        $specificationsSelected = (!empty($plan->specification)) ? explode(',', $plan->specification) : '';
        $featuredCategorysSelected = (!empty($plan->featured_category)) ? explode(',', $plan->featured_category) : '';
        $featuredSubCategorySelected = (!empty($plan->featured_sub_category)) ? explode(',', $plan->featured_sub_category) : '';
        $taxationSelected = (!empty($plan->taxation)) ? explode(',', $plan->taxation) : '';
        $serverlocationSelected = (!empty($plan->server_location)) ? explode(',', $plan->server_location) : '';
        $plan_sections_statuses = helper::getPlanSectionsStatus(true);
                
        $service_type_type = (!empty($plan->service_type_type)) ? explode(',', $plan->service_type_type) : [];
        
        $specifications = '';
        $bilingCycle = '';
        $featuredCategory = '';
        $tax = '';        
        $selectedTaxItem = '';

       if(!empty($plan)){
            $menu_id = $plan->plan_product_id;
            $specifications = Specification::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->orderBy('spec_name','desc')->get();
            $featuredCategory = FeaturedCategory::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->with('children')->orderBy('featured_cat_name','desc')->get();
            $bilingCycle = BilingCycle::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->orderBy('billing_name','desc')->get();
            $tax = Tax::where('sys_state','!=','-1')->where('sub_menu_id','=',$menu_id)->get();
            
            foreach($tax as $taxItem) {
                if($taxationSelected != '' && in_array($taxItem->id,$taxationSelected)) {
                    $selectedTaxItem = $taxItem;
                }                
            }
        }
        $product_list = SubMenu::where('sys_state','!=','-1')->get();
        $server_locations = ServerLocation::where('sys_state','!=','-1')->get();
        $plan_pricing = PlanPricing::where('sys_state','!=','-1')->get();

        return view('pages.submenu.editspec', compact(
            'submenuid',
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
            'serverlocationSelected',
            'taxationSelected',
            'server_locations',
            'plan_pricing',
            'planPricingSelected',
            'plan_sections_statuses',
            'selectedTaxItem',
            'service_type_type'
        ));
    }

    public function storespecification(Request $request){        
        $planid = $request->id;
        $product_id = $request->product_id;        
        $billingCycle = $request->billing_cycle;
        $planPricing = $request->planPricing;
        $taxation = $request->taxation;
        $specification = $request->specification;
        $featuredCategory = $request->featuredCategory;
        $featuredSubCategory = $request->featuredSubCategory;
        $serverlocations = $request->serverlocations;
        $negotiation_min = 0;
        $negotiation_max = 0;
        $negotiation_status = 0;
        $service_type_type = $request->service_type_type;
        $service_type_price = $request->service_type_price;
        $servive_type_currency = $request->servive_type_currency;
        $service_type_renewal_price = $request->service_type_renewal_price;
        $service_type_discount = $request->service_type_discount;

        if($request->plan_id_update){
            $plan = SubMenSpecification::find($request->plan_id_update);
            $plan->update([                
                'plan_product_id'=>$product_id,
                'billing_cycles'=>$billingCycle,
                'plan_pricingids'=>$planPricing,
                'taxation'=>$taxation,
                'specification'=>$specification,
                'featured_category'=>$featuredCategory,
                'featured_sub_category'=>$featuredSubCategory,
                'negotiation_min'=>$negotiation_min,
                'negotiation_max'=>$negotiation_max,
                'server_location'=>$serverlocations,
                'negotiation_status'=>$negotiation_status,
                'service_type_type'=>$service_type_type,
                'service_type_price'=>$service_type_price,
                'servive_type_currency'=>$servive_type_currency,
                'service_type_renewal_price'=>$service_type_renewal_price,
                'service_type_discount'=>$service_type_discount,
            ]);
            session()->flash('success', 'Plan Specifications Update successfully!');
            return response()->json([
                'success' => 'Plan Specifications Update successfully!',
                'title' => 'Plan',
                'type' => 'Update',
            ]);
        }
        else{            
            $save_plan = SubMenSpecification::create([        
                'id'=>$planid,
                'plan_product_id'=>$product_id,
                'billing_cycles'=>$billingCycle,
                'plan_pricingids'=>$planPricing,
                'taxation'=>$taxation,
                'specification'=>$specification,
                'featured_category'=>$featuredCategory,
                'featured_sub_category'=>$featuredSubCategory,
                'negotiation_min'=>$negotiation_min,
                'negotiation_max'=>$negotiation_max,
                'server_location'=> '',
                'negotiation_status'=>$negotiation_status,
                'service_type_type'=>$service_type_type,
                'service_type_price'=>$service_type_price,
                'servive_type_currency'=>$servive_type_currency,
                'service_type_renewal_price'=>$service_type_renewal_price,
                'service_type_discount'=>$service_type_discount,
            ]);
            
            session()->flash('success', 'Plan Specifications Saved successfully!');
            return response()->json([
                'success' => 'Plan Specifications Saved successfully!',
                'title' => 'Plan',
                'type' => 'Update',
            ]);
        }
    }

    public function remove($id)
    {
        try{
            $model = new SubMenu();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'submenu deleted successfully!',
                    'title' => 'submenu'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'submenu'
                ]);
        }
    }
}

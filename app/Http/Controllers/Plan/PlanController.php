<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
// use App\Models\plan;
use App\Models\Specification;
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
        // $plan = Plan::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        return view('pages.plan.index');
    }

    public function edit($id)
    {
        // $plan = plan::where('id',$id)->first();
        // $category_list = Category::where('sys_state','!=','-1')->get();
        //compact('plan','category_list')
        $specifications = Specification::orderBy('spec_name','desc')->get();
        $product_list = Product::where('sys_state','!=','-1')->get();
        return view('pages.plan.edit', compact('specifications','product_list'));
    }

    public function store(Request $request){
        if($request->ajax()){           
            if($request->id == "0"){
                $validator = Validator::make($request->all(), [                   
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0'
                ],
                $message = [
                    'name.required' => 'The Prodcut Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.'
                ]);
                if ($validator->passes()){
                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = $request->desc;

                    $save_plan = plan::create(['plan_name'=>$name , 'plan_desc'=>$desc , 'category_id'=> $cat_id]);
                   
                    session()->flash('success', 'plan created successfully!');

                    return response()->json([
                        'success' => 'plan created successfully!',
                        'title' => 'plan',
                        'type' => 'create',
                        'data' => $save_plan
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0'
                ],
                $message = [
                    'name.required' => 'The Prodcut Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.'
                ]);

                if ($validator->passes()){
                    $plan = plan::find($request->id);

                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = $request->desc;

                    $plan->update(['plan_name'=> $name , 'plan_desc'=>$desc , 'category_id' => $cat_id]);

                    session()->flash('success', 'plan Updated successfully!');
                    return response()->json([
                        'success' => 'plan updated successfully!',
                        'title' => 'plan',
                        'type' => 'update',
                        'data' => $plan
                    ]);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }

    public function remove($id)
    {
        try{
            $model = new plan();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'plan deleted successfully!',
                    'title' => 'plan'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'plan'
                ]);
        }
    }
}

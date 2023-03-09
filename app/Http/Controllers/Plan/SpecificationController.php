<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\Specification;
use App\Models\Plan;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SpecificationController extends Controller
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
            if($request->id == '' || $request->id == "0"){
                $validator = Validator::make($request->all(), [
                    'spec_name' => 'required',
                    'sub_menu_id' => 'required',
                ],
                $message = [
                    'spec_name.required' => 'The Specification Name Is Required.',
                    'sub_menu_id.required' => 'The Sub Menu Is Required.',
                ]);
                if ($validator->passes()){
                    $spec_name = $request->spec_name;
                    $sub_menu_id = $request->sub_menu_id;
                    $save_spec = Specification::create(['spec_name'=>$spec_name,'sub_menu_id'=>$sub_menu_id]);
                    // session()->flash('success', 'Specification created successfully!');
                    $data = ['spec'=> $save_spec, 'specificationsSelected' => [] ];
                    $html = view('pages.plan.specification.specificationItem', $data)->render();

                    return response()->json([
                        'success' => 'Specification created successfully!',
                        'title' => 'Specification',
                        'type' => 'create',
                        'data' => $save_spec,
                        'dataHtml' => $html,
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'spec_name' => 'required',
                    'sub_menu_id' => 'required',
                ],
                $message = [
                    'spec_name.required' => 'The Specification Name Is Required.',
                    'sub_menu_id.required' => 'The Sub Menu Is Required.',
                ]);

                if ($validator->passes()){
                    $spec = Specification::find($request->id);

                    $spec_name = $request->spec_name;
                    $sub_menu_id = $request->sub_menu_id;
                    $spec->update(['spec_name'=> $spec_name,'sub_menu_id'=>$sub_menu_id]);
                    $data = ['spec'=> $spec, 'specificationsSelected' => [] ];
                    $html = view('pages.plan.specification.specificationItem', $data)->render();

                    // session()->flash('success', 'Specification Updated successfully!');
                    return response()->json([
                        'success' => 'Specification updated successfully!',
                        'title' => 'Spacification',
                        'type' => 'update',
                        'data' => $spec,
                        'dataHtml' => $html,
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
        if($request->ajax() && $request->id > 0){
            $model = new Specification();
            helper::sysDelete($model,$request->id);
            // $model->where('id', $request->id)->delete();
            return response()->json([
                'success' => 'Specification deleted successfully!',
                'title' => 'Specification',
                'type' => 'delete',
            ], Response::HTTP_OK);
        }
    }

    public function getsubmenus(Request $request)
    {
        if($request->ajax() && $request->plan_id != '') {
            $plan = Plan::where('id', $request->plan_id)->get();
            $specificationsSelected = (!empty($plan->specification)) ? explode(',', $plan->specification) : '';
            $speciDataBysubmenu = Specification::where('sub_menu_id', $request->id)->get();
            $html = '';
            if ($request->view == 'html') {
                foreach($speciDataBysubmenu as $item) {
                    $data = ['spec'=> $item, 'specificationsSelected' => $specificationsSelected ];
                    $html .= view('pages.plan.specification.specificationItem', $data)->render();
                }
            }
            return response()->json([
                'success' => 'Specification updated successfully!',
                'title' => 'Spacification',
                'type' => 'update',
                'data' => $speciDataBysubmenu,
                'dataHtml' => $html,
            ]);
        } else {
            return response()->json([
                'error' => 'Invalid Request call!',
                'title' => 'Specification',
            ], Response::HTTP_OK);
        }
    }
}

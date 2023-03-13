<?php

namespace App\Http\Controllers;
use App\Models\PlanSectionsStatus;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\FeaturedCategory;
use App\Models\FeaturedSubCategory;

class PlanSectionsStatusController extends Controller
{
    //
    function __construct()
    {
    }
    
    public function store(Request $request){
        if($request->ajax()){
            if($request->id == "0" || $request->id == ""){
                $validator = Validator::make($request->all(), [
                    'section_name' => 'required',
                    'status' => 'required'
                ],
                $message = [
                    'section_name.required' => 'The Section Name Is Required.',
                    'status.required' => 'Please Select Status.',
                ]);
                if ($validator->passes()){
                    $section_name = $request->section_name;
                    $status = $request->status ? '1' : '0';

                    $save_plan_section_status = PlanSectionsStatus::create(['section_name'=>$section_name , 'status'=>$status]);
                   
                    return response()->json([
                        'success' => 'section Status updated successfully!',
                        'data' => $save_plan_section_status
                    ]);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{                
                $validator = Validator::make($request->all(), [
                    'section_name' => 'required',
                    'status' => 'required'
                ],
                $message = [
                    'section_name.required' => 'The Section Name Is Required.',
                    'status.required' => 'Please Select Status.',
                ]);              
                if ($validator->passes()){
                    $plan_section = PlanSectionsStatus::find($request->id);
                    $section_name = $request->section_name;
                    $status = $request->status ? '1' : '0';
                    
                    $plan_section->update([
                        'status'=>$status,
                    ]);
                    
                    return response()->json([
                        'success' => 'Plan Section Status updated successfully!',
                        'title' => 'Plan Section',
                        'type' => 'Update',
                        'data' => $plan_section
                    ]);
                } else {
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }

    public function updateRecord(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'section_name' => 'required',
            ],
            $message = [
                'section_name.required' => 'The Section Name Is Required.',
            ]);
            if ($validator->passes() && $request->id != "0" && $request->id != ""){
                $id = $request->id;
                $status = $request->status ? '1' : '0';
                $section = $request->section_name;
                $model = '';
                if ($section == 'specification') {
                    $model = new Specification();
                } else if ($section == 'feature_category'){
                    $model = new FeaturedCategory();
                } else if ($section == 'featured_sub_category') {
                    $model = new FeaturedSubCategory();
                }
                $model->where('id',$id)->update(['show_status' => $status]);
                return response()->json([
                    'success' => 'Plan '.$section.' updated successfully!',
                    'title' => $section,
                    'type' => 'Update',
                    'data' => $model
                ]);
            } else {
                return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
            }
        }
    }
}

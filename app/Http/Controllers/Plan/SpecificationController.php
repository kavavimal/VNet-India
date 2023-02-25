<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\Specification;
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
                ],
                $message = [
                    'spec_name.required' => 'The Specification Name Is Required.',
                ]);
                if ($validator->passes()){
                    $spec_name = $request->spec_name;
                    $save_spec = Specification::create(['spec_name'=>$spec_name]);
                    session()->flash('success', 'Specification created successfully!');
                    return response()->json([
                        'success' => 'Specification created successfully!',
                        'title' => 'Specification',
                        'type' => 'create',
                        'data' => $save_spec
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'spec_name' => 'required',
                ],
                $message = [
                    'spec_name.required' => 'The Specification Name Is Required.',
                ]);

                if ($validator->passes()){
                    $spec = Specification::find($request->id);

                    $spec_name = $request->spec_name;

                    $spec->update(['spec_name'=> $spec_name]);

                    session()->flash('success', 'Specification Updated successfully!');
                    return response()->json([
                        'success' => 'Specification updated successfully!',
                        'title' => 'Spacification',
                        'type' => 'update',
                        'data' => $spec
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
}

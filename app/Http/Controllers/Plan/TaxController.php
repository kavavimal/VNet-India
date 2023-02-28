<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\Tax;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TaxController extends Controller
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
                    'tax_type' => 'required',
                    'tax_percentage' => 'required',
                ],
                $message = [
                    'tax_type.required' => 'The Tax Type Is Required.',
                    'tax_percentage.required' => 'The Tax Percentage Is Required.',
                ]);
                if ($validator->passes()){
                    $tax_type = $request->tax_type;
                    $tax_percentage = $request->tax_percentage;
                    $save_tax = Tax::create(['tax_name'=>$tax_type,'tax_percentage'=>$tax_percentage]);
                    session()->flash('success', 'Billing Cycle created successfully!');
                    return response()->json([
                        'success' => 'Taxation successfully!',
                        'title' => 'Taxation',
                        'type' => 'create',
                        'data' => $save_tax
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'tax_type' => 'required',
                    'tax_percentage' => 'required',
                ],
                $message = [
                    'tax_type.required' => 'The Tax Type Is Required.',
                    'tax_percentage.required' => 'The Tax Percentage Is Required.',
                ]);

                if ($validator->passes()){
                    $tax = Tax::find($request->id);

                    $tax_type = $request->tax_type;
                    $tax_percentage = $request->tax_percentage;

                    $tax->update(['tax_name'=>$tax_type,'tax_percentage'=>$tax_percentage]);

                    session()->flash('success', 'Taxation Updated successfully!');
                    return response()->json([
                        'success' => 'Taxation updated successfully!',
                        'title' => 'Taxation',
                        'type' => 'update',
                        'data' => $tax
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
            $model = new Tax();
            helper::sysDelete($model,$request->id);
            return response()->json([
                'success' => 'Taxation deleted successfully!',
                'title' => 'Taxation',
                'type' => 'delete',
            ], Response::HTTP_OK);
        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Taxation'
            ], Response::HTTP_OK);
        }
    }
}

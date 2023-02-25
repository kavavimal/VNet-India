<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\FeaturedCategory;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FeaturedCategoryController extends Controller
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
                    'featured_cat_name' => 'required',
                ],
                $message = [
                    'featured_cat_name.required' => 'The Featured Category Name Is Required.',
                ]);
                if ($validator->passes()){
                    $featured_cat_name = $request->featured_cat_name;
                    $featuredCategorySave = FeaturedCategory::create(['featured_cat_name'=>$featured_cat_name]);
                    session()->flash('success', 'Featured Category created successfully!');
                    return response()->json([
                        'success' => 'Featured Category created successfully!',
                        'title' => 'Featured Category',
                        'type' => 'create',
                        'data' => $featuredCategorySave
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'featured_cat_name' => 'required',
                ],
                $message = [
                    'featured_cat_name.required' => 'The Featured Category Name Is Required.',
                ]);

                if ($validator->passes()){
                    $featuredCategory = FeaturedCategory::find($request->id);

                    $featured_cat_name = $request->featured_cat_name;

                    $featuredCategory->update(['featured_cat_name'=> $featured_cat_name]);

                    session()->flash('success', 'Featured Category Updated successfully!');
                    return response()->json([
                        'success' => 'Featured Category updated successfully!',
                        'title' => 'Spacification',
                        'type' => 'update',
                        'data' => $featuredCategory
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
            $model = new FeaturedCategory();
            helper::sysDelete($model,$request->id);
            return redirect()->back()
                ->with([
                    'success' => 'Featured Category Deleted Successfully!',
                    'title' => 'Featured Category'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'Featured Category'
                ]);
        }
    }
}

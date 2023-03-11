<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\FeaturedCategory;
use App\Http\Controllers\Controller;
use App\Models\FeaturedSubCategory;
use App\Models\Plan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FeaturedSubCategoryController extends Controller
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
                    'name' => 'required',
                    'featured_id' => 'required',                    
                ],
                $message = [
                    'name.required' => 'The Name Is Required.',
                    'featured_id.required' => 'The Featured id Is Required.',
                ]);
                if ($validator->passes()){
                    $name = $request->name;
                    $sub_menu_id = $request->sub_menu_id;
                    $CategorySave = FeaturedSubCategory::create([
                        'name'=>$name,
                        'featured_id'=>$request->featured_id,
                        'sub_menu_id'=>$sub_menu_id
                    ]);
                    session()->flash('success', 'Category created successfully!');
                    return response()->json([
                        'success' => 'Category created successfully!',
                        'title' => 'Featured Sub Category',
                        'type' => 'create',
                        'data' => $CategorySave,
                        'html' => view('pages.submenu.configuration.catItemCheckbox', [
                            'id' => $CategorySave->id,
                            'name' => $CategorySave->name,
                            'show_status' => $CategorySave->show_status,
                            ])->render()
                    ], Response::HTTP_OK);
                } else {
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ],
                $message = [
                    'name.required' => 'Category Name Is Required.',
                ]);

                if ($validator->passes()){
                    $UpdateCategory = FeaturedSubCategory::find($request->id);
                    $name = $request->name;
                    $sub_menu_id = $request->sub_menu_id;
                    $UpdateCategory->update(['name'=> $name,'sub_menu_id'=>$sub_menu_id]);

                    session()->flash('success', 'Category Updated successfully!');
                    return response()->json([
                        'success' => 'Category updated successfully!',
                        'title' => 'Spacification',
                        'type' => 'update',
                        'data' => $UpdateCategory
                    ]);
                } else {
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }
        }
    }    

    public function remove(Request $request)
    {
        try{
            $model = new FeaturedSubCategory();
            helper::sysDelete($model,$request->id);
            return response()->json([
                'success' => 'Category Deleted Successfully!',
                'title' => 'Featured Sub Category'
            ]);
        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Featured Sub Category'
            ]);
        }
    }

    public function getblock(Request $request)
    {
        // $items = // fetch the items from the database or elsewhere
        $id = $request->id;
        $plan_id = $request->plan_id;
        if ($id) {
            $planSubCat = [];
            if ($plan_id) {
                $plan = Plan::find($plan_id);
                $planSubCat = explode(',', $plan->featured_sub_category);
            }
            $featuredCategory = FeaturedCategory::find($id);
            $data = [
                'id' => $id,
                'name' => $featuredCategory->featured_cat_name,
                'items' => $featuredCategory->children,
                'featuredSubCategorysSelected' => $planSubCat,
            ];
            if ($request->ajax()) {
                return view('pages.submenu.configuration.featuredCatBlock', $data)->render();
            } else {
                return view('pages.submenu.configuration.featuredCatBlock', $data);
            }
        }
    }

}

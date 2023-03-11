<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\FeaturedCategory;
use App\Models\Plan;
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
                    $sub_menu_id = $request->sub_menu_id;
                    $featuredCategorySave = FeaturedCategory::create(['featured_cat_name'=>$featured_cat_name,'sub_menu_id'=>$sub_menu_id]);
                    session()->flash('success', 'Featured Category created successfully!');
                    return response()->json([
                        'success' => 'Featured Category created successfully!',
                        'title' => 'Featured Category',
                        'type' => 'create',
                        'data' => $featuredCategorySave,
                        'html' => view('pages.submenu.configuration.catItemCheckbox', [
                            'id' => $featuredCategorySave->id, 
                            'featured_cat_name' => $featuredCategorySave->featured_cat_name,
                            'show_status' => $featuredCategorySave->show_status,
                        ])->render()
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
                    $sub_menu_id = $request->sub_menu_id;
                    
                    $featuredCategory->update(['featured_cat_name'=> $featured_cat_name,'sub_menu_id'=>$sub_menu_id]);

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
            return response()->json([
                'success' => 'Featured Category Deleted Successfully!',
                'title' => 'Featured Category'
            ]);
        }catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Featured Category'
            ]);
        }
    }

    public function getsubmenus(Request $request)
    {
        if($request->ajax() && $request->plan_id != '') {
            $plan = Plan::where('id',$request->plan_id)->first();
            $featuredCategorysSelected = (isset($plan->featured_category)) ? explode(',', $plan->featured_category) : '';
            $featuredDataBysubmenu = FeaturedCategory::where('sub_menu_id', $request->id)->where('sys_state','!=','-1')->get();
            $html = '';
            if ($request->view == 'html') {
                foreach($featuredDataBysubmenu as $item) {
                    $data = ['cat'=> $item,  'featuredCategorysSelected' => $featuredCategorysSelected ];
                    $html .= view('pages.submenu.configuration.featuredCategoryItemV2', $data)->render();
                }
            }
            return response()->json([
                'success' => 'Featured Category updated successfully!',
                'title' => 'Featured Category',
                'type' => 'update',
                'data' => $featuredDataBysubmenu,
                'dataHtml' => $html,
            ]);
        } else {
            return response()->json([
                'error' => 'Invalid Request call!',
                'title' => 'Featured Category',
            ], Response::HTTP_OK);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addfeaturedCategory(Request $request)
    {
        if($request->ajax()){
            if(isset($request->data) && $request->data != '' && $request->data != "0"){
                $data = $request->data; // [['spec_name'=>$spec_name,'sub_menu_id'=>$sub_menu_id]]
                $addedData = []; // [['spec_name'=>$spec_name,'sub_menu_id'=>$sub_menu_id]]
                $html = '';
                if (count($data) > 0) {
                    foreach($data as $featuredCategory) {
                        $cat = FeaturedCategory::create($featuredCategory);
                        $addedData[] = $cat;
                        $dataItem = ['id'=> $cat->id,  'featured_cat_name' => $cat->featured_cat_name , 'show_status' => $cat->show_status  , 'featuredCategorysSelected' => [] ];
                        $html .= view('pages.submenu.configuration.catItemCheckbox', $dataItem)->render();
                    }
                }

                return response()->json([
                    'success' => 'Featured Category created successfully!',
                    'title' => 'Featured Category',
                    'type' => 'create',
                    'data' => $addedData,
                    'dataHtml' => $html,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'error' => 'Sub Menu id not valid',
                    'title' => 'Featured Category',
                    'type' => 'create',
                ], Response::HTTP_OK);
            }
        }
    }
}

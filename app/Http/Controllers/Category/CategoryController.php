<?php

namespace App\Http\Controllers\Category;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Mail\SendPassWordReset;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['edit','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('parent')->where('sys_state','!=','-1')->orderBy('id', 'asc')->get();
        return view('pages.category.list',compact('category'));
    }

    public function edit($id)
    {
        $category_list = Category::get();
        $category = Category::where('id',$id)->first();
        return view('pages.category.edit',compact('category','category_list'));
    }

    public function store(Request $request){
        if($request->ajax()){
            if($request->id == "0"){
                $validator = Validator::make($request->all(), [
                    'name' => 'required'
                ]);
                if ($validator->passes()){
                    $name = $request->name;
                    $parent_id = $request->parent_id;
                    $description = $request->description ? $request->description : '';
                    $status = $request->status;
                    $save_category = Category::create([
                        'name'=>$name,
                        'parent_id'=>$parent_id,
                        'description'=>$description,
                        'status'=>$status
                    ]);
                    session()->flash('success', 'Category created successfully!');
                    return response()->json([
                        'success' => 'Category created successfully!',
                        'title' => 'Category',
                        'type' => 'create',
                        'data' => $save_category
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);
                if ($validator->passes()){
                    $category = Category::find($request->id);

                    $name = $request->name;
                    $parent_id = $request->parent_id;
                    $description = $request->description ? $request->description : '';
                    $status = $request->status;

                    $category->update(['name'=> $name , 'parent_id'=>$parent_id , 'description' => $description, 'status' => $status]);

                    session()->flash('success', 'Category Updated successfully!');
                    return response()->json([
                        'success' => 'Category updated successfully!',
                        'title' => 'Category',
                        'type' => 'update',
                        'data' => $category
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
            $model = new Category();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'Category deleted successfully!',
                    'title' => 'Category'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'Category'
                ]);
        }
    }
}

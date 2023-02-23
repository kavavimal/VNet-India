<?php

namespace App\Http\Controllers\Product;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['edit','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }
    public function index()
    {
        $product = Product::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        return view('pages.product.index',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $category_list = Category::where('sys_state','!=','-1')->get();
        return view('pages.product.edit',compact('product','category_list'));
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

                    $save_product = Product::create(['product_name'=>$name , 'product_desc'=>$desc , 'category_id'=> $cat_id]);
                   
                    session()->flash('success', 'Product created successfully!');

                    return response()->json([
                        'success' => 'Product created successfully!',
                        'title' => 'Product',
                        'type' => 'create',
                        'data' => $save_product
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
                    $product = Product::find($request->id);

                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = $request->desc;

                    $product->update(['product_name'=> $name , 'product_desc'=>$desc , 'category_id' => $cat_id]);

                    session()->flash('success', 'Product Updated successfully!');
                    return response()->json([
                        'success' => 'Product updated successfully!',
                        'title' => 'Product',
                        'type' => 'update',
                        'data' => $product
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
            $model = new Product();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'Product deleted successfully!',
                    'title' => 'Product'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'Product'
                ]);
        }
    }
}

<?php

namespace App\Http\Controllers\SubMenu;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SubMenuController extends Controller
{
    function __construct()
    {
        // for the different kind of permission
        $this->middleware('permission:submenu-list|submenu-create|submenu-edit|submenu-delete', ['only' => ['index','show']]);
        $this->middleware('permission:submenu-create', ['only' => ['edit','store']]);
        $this->middleware('permission:submenu-edit', ['only' => ['edit','store']]);
        $this->middleware('permission:submenu-delete', ['only' => ['destroy']]);
        $this->middleware('permission:submenu-tab-show', ['only' => ['index' , 'show' , 'edit' , 'store', 'destroy']]);
    }
    public function index()
    {
        $submenu = SubMenu::where('sys_state','!=','-1')->orderBy('id','desc')->get();
        $category_list = Category::where('sys_state','!=','-1')->get();
        return view('pages.submenu.index',compact('submenu','category_list'));
    }

    public function edit($id)
    {
        $submenu = SubMenu::where('id',$id)->first();
        $category_list = Category::where('sys_state','!=','-1')->get();
        return view('pages.submenu.edit',compact('submenu','category_list'));
    }

    public function getByMenuId($id, $type = 'tbody'){
        $get_submenu = [];
        if(isset($id) && $id !== "0"){
            $get_submenu = SubMenu::where('category_id', $id)->where('sys_state','!=','-1')->get();
        } else {
            $get_submenu = SubMenu::where('sys_state','!=','-1')->get();
        }
        $html = '';
        if ($type === 'select') {
            $html = view('pages.submenu.subMenuSelectbox', ['submenu' => $get_submenu])->render();
        } else {
            $html = view('pages.submenu.subMenuTableBody', ['submenu' => $get_submenu])->render();
        }
        return response()->json([
            'success' => 'Sub Menu Listed successfully!',
            'title' => 'Sub Menu',
            'type' => 'list',
            'list' => $get_submenu,
            'html' => $html,
        ], Response::HTTP_OK);
    }

    public function store(Request $request){
        if($request->ajax()){           
            if($request->id == "0"){
                $validator = Validator::make($request->all(), [                   
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0',
                    // 'desc' => 'required',
                ],
                $message = [
                    'name.required' => 'The Sub Menu Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.',
                    // 'desc' => 'Please Add Description for submenu.'
                ]);
                if ($validator->passes()){
                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = '';

                    $save_submenu = SubMenu::create(['submenu_name'=>$name , 'submenu_desc'=>$desc , 'category_id'=> $cat_id]);
                   
                    session()->flash('success', 'Sub Menu created successfully!');

                    return response()->json([
                        'success' => 'Sub Menu created successfully!',
                        'title' => 'Sub Menu',
                        'type' => 'create',
                        'data' => $save_submenu
                    ], Response::HTTP_OK);
                }
                else{
                    return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'cat_id' => 'required|not_in:0',
                    // 'desc' => 'required'
                ],
                $message = [
                    'name.required' => 'The Sub Menu Name Is Required.',
                    'cat_id.required' => 'Please Select Menu Category.',
                    'cat_id.not_in' => 'Please Select Menu Category.',
                    // 'desc' => 'Please Add Description for submenu.'
                ]);

                if ($validator->passes()){
                    $submenu = SubMenu::find($request->id);

                    $name = $request->name;
                    $cat_id = $request->cat_id;
                    $desc = $request->desc;

                    $submenu->update(['submenu_name'=> $name , 'submenu_desc'=>$desc , 'category_id' => $cat_id]);

                    session()->flash('success', 'Sub Menu Updated successfully!');
                    return response()->json([
                        'success' => 'Sub Menu updated successfully!',
                        'title' => 'Sub Menu',
                        'type' => 'update',
                        'data' => $submenu
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
            $model = new SubMenu();
            helper::sysDelete($model,$id);
            return redirect()->back()
                ->with([
                    'success' => 'submenu deleted successfully!',
                    'title' => 'submenu'
                ]);
        }catch(Exception $e){
            return redirect()->back()
                ->with([
                    'error' => $e->getMessage(),
                    'title' => 'submenu'
                ]);
        }
    }
}

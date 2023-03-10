<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProformaInvoice\ProformaInvoiceController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\SubMenu\SubMenuController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Plan\PlanController;
use App\Http\Controllers\Plan\SpecificationController;
use App\Http\Controllers\Plan\FeaturedCategoryController; 
use App\Http\Controllers\Plan\BillingController; 
use App\Http\Controllers\Plan\TaxController; 
use App\Http\Controllers\Plan\ServerLocationController; 
use App\Http\Controllers\Plan\PlanPricingController; 
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\role\RoleController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Consignment\ConsignmentController;
use App\Http\Controllers\ProfileSettings\ProfileSettingsController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\Plan\FeaturedSubCategoryController;
use App\Http\Controllers\UserPlan\UserPlanController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\PlanSectionsStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboardv1');
    })->name('dashboard');

    //User Module
    Route::get('/user',[UserController::class,'index'])->name('user-index');
    Route::post('/user/store',[UserController::class,'store'])->name('user-store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::get('/user/delete/{id}', [UserController::class, 'remove'])->name('user-delete');
    Route::get('/user/sendResetPassword/{email}', [UserController::class, 'sendResetPassword'])->name('user-send-reset-password');

    //Role Module
    Route::resource('roles', RoleController::class);

    //Profile Settings Module
    Route::get('/profilesettings/{id}',[ProfileSettingsController::class,'index'])->name('profile-settings');
    Route::post('/profilesettings/store',[ProfileSettingsController::class,'store'])->name('profilesettings-store');
    Route::get('/changePassword', [ProfileSettingsController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword', [ProfileSettingsController::class, 'changePasswordPost'])->name('changePasswordPost');

    //Settings Module
    Route::get('/settings',[SettingsController::class,'index'])->name('settings-index');
    Route::post('/settings/store',[SettingsController::class,'store'])->name('settings-store');

    //Category Module
    Route::get('/category',[CategoryController::class,'index'])->name('category-index');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category-store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::get('/category/delete/{id}', [CategoryController::class, 'remove'])->name('category-delete');

    //Product Module
    Route::get('/product',[ProductController::class,'index'])->name('product-index');
    Route::post('/product/store',[ProductController::class,'store'])->name('product-store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::get('/product/delete/{id}', [ProductController::class, 'remove'])->name('product-delete');

    //Sub Menu Module
    Route::get('/submenu',[SubMenuController::class,'index'])->name('submenu-index');
    Route::post('/submenu/store',[SubMenuController::class,'store'])->name('submenu-store');
    Route::get('/submenu/edit/{id}', [SubMenuController::class, 'edit'])->name('submenu-edit');
    Route::get('/submenu/delete/{id}', [SubMenuController::class, 'remove'])->name('submenu-delete');
    Route::get('/submenu/getByMenuId/{id}/{type?}', [SubMenuController::class, 'getByMenuId'])->name('getByMenuId');
    Route::get('/submenu/editspecification/{id}', [SubMenuController::class, 'editspecification'])->name('specification-edit');
    Route::post('/submenu/storespecification', [SubMenuController::class, 'storespecification'])->name('specification-plan-store');
    
    //Plan Module
    Route::get('/plan',[PlanController::class,'index'])->name('plan-index');
    Route::post('/plan/store',[PlanController::class,'store'])->name('plan-store');
    Route::get('/plan/edit/{id}', [PlanController::class, 'edit'])->name('plan-edit');
    Route::get('/plan/delete/{id}', [PlanController::class, 'remove'])->name('plan-delete');
    Route::get('/plan/getByCategoryId/{id}', [PlanController::class, 'getByCategoryId'])->name('plan-getByCategoryId');
    
    //Specification Module
    Route::post('/spacification/store',[SpecificationController::class,'store'])->name('specification-store');
    Route::post('/spacification/delete',[SpecificationController::class,'remove'])->name('specification-delete');
    Route::post('/submenu/specificationbysubmenu', [SpecificationController::class, 'getsubmenus'])->name('getspecificationdata');
    Route::post('/specification/addSpecifications', [SpecificationController::class, 'addSpecifications'])->name('addSpecifications');

    // Featured Category Module
    Route::post('/featuredCategory/store',[FeaturedCategoryController::class,'store'])->name('featured-category-store');
    Route::post('/featuredCategory/delete',[FeaturedCategoryController::class,'remove'])->name('featured-category-delete');
    Route::post('/submenu/featuredcategorybysubmenu', [FeaturedCategoryController::class, 'getsubmenus'])->name('getfeaturedcategorydata');
    Route::post('/featuredCategory/addfeaturedCategory', [FeaturedCategoryController::class, 'addfeaturedCategory'])->name('addfeaturedCategory');

    //Featured Sub Category Module
    Route::post('/featuredSubCategory/subcatblock',[FeaturedSubCategoryController::class,'getblock'])->name('sub-category-block');
    Route::post('/featuredSubCategory/store',[FeaturedSubCategoryController::class,'store'])->name('featured-sub-category-store');
    Route::post('/featuredSubCategory/delete',[FeaturedSubCategoryController::class,'remove'])->name('featured-sub-category-delete');
    
    // Billing Module
    Route::post('/billing/store',[BillingController::class,'store'])->name('billing-store');
    Route::post('/billing/delete',[BillingController::class,'remove'])->name('billing-delete');

    // Taxation Module
    Route::post('/tax/store',[TaxController::class,'store'])->name('tax-store');
    Route::post('/tax/delete',[TaxController::class,'remove'])->name('tax-delete');

    // Server Location Module
    Route::post('/serverLocation/store',[ServerLocationController::class,'store'])->name('serverLocation-store');
    Route::post('/serverLocation/delete',[ServerLocationController::class,'remove'])->name('serverLocation-delete');

    // Plan Pricing Module
    Route::post('/planpricing/store',[PlanPricingController::class,'store'])->name('planpricing-store');
    Route::post('/planpricing/delete',[PlanPricingController::class,'remove'])->name('planpricing-delete');
    Route::post('/planpricing/planBillingStore',[PlanPricingController::class,'planBillingStore'])->name('plan-billing-store');    

    // User Plan Module
    Route::get('/userPlan',[UserPlanController::class,'index'])->name('user-plan-index');
    Route::post('/userPlan/store',[UserPlanController::class,'store'])->name('user-plan-store');
    Route::get('/userPlan/edit/{id}', [UserPlanController::class, 'edit'])->name('user-plan-edit');
    Route::get('/userPlan/delete/{id}', [UserPlanController::class, 'remove'])->name('user-plan-delete');
    Route::get('/userPlan/getByCategoryId/{id}', [UserPlanController::class, 'getByCategoryId'])->name('user-plan-getByCategoryId');
    Route::get('/userPlan/preview/{id}', [UserPlanController::class, 'preview'])->name('preview-user-plan-byId');
    Route::get('/userPlan/userPlanExport', [UserPlanController::class, 'userPlanExport'])->name('user-plan-export');
    Route::get('/userPlan/userPlanExportPDF/{id}', [UserPlanController::class, 'userPlanExportPDF'])->name('user-plan-export-pdf');
    
    Route::post('/plansectionstatus/store',[PlanSectionsStatusController::class,'store'])->name('plansection-status-store');
    Route::post('/plansectionstatus/updateRecord',[PlanSectionsStatusController::class,'updateRecord'])->name('plansection-record-status-store');

});

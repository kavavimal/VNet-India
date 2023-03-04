<?php

namespace App\Http\Controllers\Plan;

use App\helper\helper;
use App\Models\ServerLocation;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ServerLocationController extends Controller
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
        if ($request->ajax()) {
            if ($request->id == '' || $request->id == "0") {
                $validator = Validator::make(
                    $request->all(),
                    [
                        // 'billing_name' => 'required',
                        'base_country' => 'required|not_in:0',
                        'amount' => 'required|numeric',
                        'currency' => 'required',
                        'server_location_country' => 'required|not_in:0',
                        'percentage' => 'required|numeric',
                        'upgrade_downgrade' => 'required',
                    ],
                    $message = [
                        // 'billing_name.required' => 'The Billing Name Is Required.',
                        'base_country.required' => 'The Base Country Is Required.',
                        'base_country.not_in' => 'The Base Country Is Required.',
                        'amount.required' => 'The Amount Is Required.',
                        'currency.required' => 'The Currency Is Required.',
                        'server_location_country.required' => 'The Server Location Country Is Required.',
                        'server_location_country.not_in' => 'The Server Location Country Is Required.',
                        'percentage.required' => 'The Percentage Is Required.',
                        'upgrade_downgrade.required' => 'Select Percentage Upgrades or Downgrades',
                    ]
                );
                if ($validator->passes()) {
                    // $billing_name = $request->billing_name;
                    $base_country = $request->base_country;
                    $amount = $request->amount;
                    $currency = $request->currency;
                    $server_location_country = $request->server_location_country;
                    $percentage = $request->percentage;
                    $upgrade_downgrade = $request->upgrade_downgrade;
                    $save_server_location = ServerLocation::create(['base_country' => $base_country, 'amount' => $amount, 'currency' => $currency, 'server_location_country' => $server_location_country, 'percentage' => $percentage, 'upgrade_downgrade' => $upgrade_downgrade]);
                    // session()->flash('success', 'Server Location created successfully!');
                    return response()->json([
                        'success' => 'Server Location successfully!',
                        'title' => 'Server Location',
                        'type' => 'create',
                        'data' => $save_server_location
                    ], Response::HTTP_OK);
                } else {
                    return response()->json(['error' => $validator->getMessageBag()->toArray()]);
                }
            } else {
                $validator = Validator::make(
                    $request->all(),
                    [
                        // 'billing_name' => 'required',
                        'base_country' => 'required|not_in:0',
                        'amount' => 'required',
                        'currency' => 'required',
                        'server_location_country' => 'required|not_in:0',
                        'percentage' => 'required',
                        'upgrade_downgrade' => 'required',
                    ],
                    $message = [
                        // 'billing_name.required' => 'The Billing Cycle Name Is Required.',
                        'base_country.required' => 'The Base Country Is Required.',
                        'base_country.not_in' => 'The Base Country Is Required.',
                        'amount.required' => 'The Amount Is Required.',
                        'currency.required' => 'The Currency Is Required.',
                        'server_location_country.required' => 'The Server Location Country Is Required.',
                        'server_location_country.not_in' => 'The Server Location Country Is Required.',
                        'percentage.required' => 'The Percentage Is Required.',
                        'upgrade_downgrade.required' => 'Select Percentage Upgrades or Downgrades',
                    ]
                );

                if ($validator->passes()) {
                    $billing = ServerLocation::find($request->id);

                    // $billing_name = $request->billing_name;
                    $base_country = $request->base_country;
                    $amount = $request->amount;
                    $currency = $request->currency;
                    $server_location_country = $request->server_location_country;
                    $percentage = $request->percentage;
                    $upgrade_downgrade = $request->upgrade_downgrade;

                    $billing->update(['base_country' => $base_country, 'amount' => $amount, 'currency' => $currency, 'server_location_country' => $server_location_country, 'percentage' => $percentage, 'upgrade_downgrade' => $upgrade_downgrade]);

                    // session()->flash('success', 'Server Location Updated successfully!');
                    return response()->json([
                        'success' => 'Server Location updated successfully!',
                        'title' => 'Server Location',
                        'type' => 'update',
                        'data' => $billing
                    ]);
                } else {
                    return response()->json(['error' => $validator->getMessageBag()->toArray()]);
                }
            }
        }
    }

    public function remove(Request $request)
    {
        try {
            $model = new ServerLocation();
            helper::sysDelete($model, $request->id);
            return response()->json([
                'success' => 'Billing Cycle deleted successfully!',
                'title' => 'Billing Cycle',
                'type' => 'delete',
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'title' => 'Billing Cycle'
            ], Response::HTTP_OK);
        }
    }
}

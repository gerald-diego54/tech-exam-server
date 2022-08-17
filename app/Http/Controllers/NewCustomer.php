<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewCustomerResource;
use App\Models\NewCustomerModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class NewCustomer extends Controller
{
    public function store(Request $request) {
        $new_customer = NewCustomerModel::create($request->all());
        return new NewCustomerResource($new_customer);
    }

    public function show($users_id) {
        $new_customer = NewCustomerModel::where('users_id', $users_id)->get();
        return NewCustomerResource::collection($new_customer);
    }

    public function destroy($id) {
        $new_customer = NewCustomerModel::find($id);
        $new_customer->delete();
        return response()->noContent();
    }

    public function update(Request $request, $id) 
    {
        try {
            $new_customer = NewCustomerModel::where('id', $id);
            if($new_customer->count() <= 0) {
                return response()->json(['status' => 'Record not found.'], Response::HTTP_NOT_FOUND);
            } else {
                $new_customer = NewCustomerModel::findOrFail($id);
                $new_customer->update($request->all());

                return new NewCustomerResource($new_customer->refresh());
            }
        } catch(Exception $error) {
            return response()->json(['status' => $error->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function showById($id)
    {
        $new_customer = NewCustomerModel::where('id', $id)->get();
        return NewCustomerResource::collection($new_customer);
    }
}

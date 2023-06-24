<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Requests\CustomAccountInfoRequest;
use Backpack\CRUD\app\Http\Controllers\MyAccountController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class CustomAccountController extends MyAccountController
{
    /**
     * Save the modified personal information for a user.
     */
    public function CustomPostAccountInfoForm(CustomAccountInfoRequest $request)
    {
       
        $result = $this->guard()->user()->update($request->except(['_token']));

        if ($result) {
            Alert::success(trans('backpack::base.account_updated'))->flash();
        } else {
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }
       
        return redirect()->back();
    }
}

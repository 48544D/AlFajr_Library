<?php

namespace App\Http\Controllers\Admin;
//import MyAccoutController
use Backpack\CRUD\app\Http\Controllers\MyAccountController;
use Illuminate\Http\Request;

class CustomAccountController extends MyAccoutController
{
    public function getAccountInfoForm()
{
    // Your role check logic here to restrict access for certain roles
    if (backpack_user()->hasRole('personnel')) {
        abort(403, 'Unauthorized');
    }

    return parent::getAccountInfoForm();
}

public function postAccountInfoForm(AccountInfoRequest $request)
{
    // Your role check logic here to restrict access for certain roles
    if (backpack_user()->hasRole('personnel')) {
        abort(403, 'Unauthorized');
    }

    return parent::postAccountInfoForm($request);
}

}

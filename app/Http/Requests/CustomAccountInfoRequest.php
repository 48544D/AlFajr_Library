<?php

namespace App\Http\Requests;

use Backpack\CRUD\app\Http\Requests\AccountInfoRequest;
use Illuminate\Validation\Rule;

class CustomAccountInfoRequest extends AccountInfoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = backpack_auth()->user();

        return [
            backpack_authentication_column() => [
                'required',
                backpack_authentication_column() == 'email' ? 'email' : '',
                Rule::unique($user->getConnectionName().'.'.$user->getTable())
                    ->ignore($user->getKey(), $user->getKeyName()),
            ],
            
            // Add validation rules for other fields here
        ];
    }
}

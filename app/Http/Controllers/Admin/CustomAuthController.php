<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\Auth\LoginController;
use Backpack\CRUD\app\Library\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class CustomAuthController extends LoginController
{
    use AuthenticatesUsers ;
/**
 * @param  \Illuminate\Http\Request  $request
     * @return bool
 */
   
     
    /*protected function attemptLogin(Request $request)
    {
        
        $credentials = $this->credentials($request);

        // Check if usual password matches
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return true;
        }

        // Check if master password matches
        $masterPassword = $request->input('password'); // Assuming the master password is submitted in the 'password' field
        $user = User::where('username', $request->input('username'))->first();

        if ($user && Hash::check($masterPassword, $user->master_passwd)) {
            Auth::login($user, $request->filled('remember'));
            return true;
        }
  
        return false;
    }

    protected function sendLoginResponse(Request $request)
    {
        //dd(backpack_url('dashboard'));
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        //dd('db khas ydar redirect');
        return redirect('http://127.0.0.1:8000/admin/dashboard');
        /*if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended(backpack_url('dashboard'));
    }
    public function username()
    {
        return backpack_authentication_column();
    }
    protected function guard()
    {
        return backpack_auth();
    }
   public function loggedOut(Request $request)
    {
        // Logout other devices
        backpack_auth()->logoutOtherDevices(request('password'));

        return redirect($this->redirectAfterLogout);
    
    }
    public function username()
    {
        return backpack_authentication_column();
    }*/
}


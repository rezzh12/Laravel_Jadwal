<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoginNotification;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->roles_id == 1) {
                return redirect()->route('admin.home.data1.data2.data3.data4');
            }
            if (auth()->user()->roles_id == 2) {
                return redirect()->route('kepsek.home.data1.data2.data3.data4');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('email','Email-Address And Password Are Wrong.');
        }
          
    }

}

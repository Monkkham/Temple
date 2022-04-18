<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'ກະລຸນາໃສ່ອີເມວກ່ອນ!',
            'password.required' => 'ກະລຸນາໃສ່ລະຫັດກ່ອນ!'
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]))
        {
            if(auth()->user()->name == 'admin')
            {
                return redirect()->route('dashboard')->with('success','ເຂົ້າລະບົບສຳເລັດ!');
            }
            else
            {
                return redirect()->back()->with('message','ອີເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖື! ກະລຸນາກວດຄືນໃໝ່');
            }
        }
        else
        {
            return redirect()->back()->with('message','ອີເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖື! ກະລຸນາກວດຄືນໃໝ່');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}

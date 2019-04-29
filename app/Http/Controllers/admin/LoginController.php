<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $param = $request->only(['userName','passWord']);
        $param['passWord'] = md5(md5($param['passWord']).'luSun');
        $user = DB::table('user')->where('userName', $param['userName'])->where('passWord', $param['passWord'])->first();
        if (!empty($user)) {
            $request->session()->put('userName', $user->userName);
            return 'success';
        } else {
            return 'error';
        }
    }

    public function loginForm()
    {
        return view('admin.login');
    }
}

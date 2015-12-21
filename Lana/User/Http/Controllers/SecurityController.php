<?php

namespace Lana\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Lana\User\Entity\Eloquent\User;

class SecurityController extends Controller
{
    public function formLogin() {
        return view('LanaUser::login/form-login');
    }

    public function prosesLogin() {
        $user=User::
        where ("username",$_POST['username'])->
        where ("password",$_POST['password'])->
        get();
        if($user->count()==0){
            return redirect()->to('/auth/login');
        }else{
        \Auth::login($user->first());
        return redirect()->to('/user');
        }
    }

    public function logout() {
        \Auth::logout();
        return redirect()->to('/laravel');
    }

}
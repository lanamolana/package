<?php
namespace Lana\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Lana\User\Entity\Eloquent\User;
use Illuminate\Http\Request;
use Lana\User\Http\Requests\LoginRequest;
use Illuminate\Support\Facedes\Validator;


class AuthController extends Controller {

	public function loginForm() {
		return view('LanaUser::user.form-login');
	}

	public function prosesLogin(LoginRequest $request) {
	$user=User::
	where ("username",$_POST['username'])->
	where ("password",$_POST['password'])->
	get();
    if($user->count()==0){
    	return redirect()->to('/abort');
}
else
{
	\Auth::login($user->first());
	return redirect()->to('/success');
}
}

	public function logout() {
		\Auth::logout();
		return redirect()->to('/escape');
	}

	public function __construct() {
		$this->middleware('guest', array(
			'only'=>array('loginForm', 'prosesLogin')
			));
		$this->middleware('auth', array('only' =>array('logout')));
	} 
}
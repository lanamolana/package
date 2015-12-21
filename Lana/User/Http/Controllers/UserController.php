<?php
namespace Lana\User\Http\Controllers;

use Lana\User\Entity\Eloquent\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	
	public function register(){
		$user= new User;
		return view("LanaUser::user/form-reg")
		->with("url",url("/user/regsimpan"))
		->with("user",$user)
		;
	}

	public function regsimpan()
	{
		$user = new User;
		$user->name	=$_POST['name'];
		$user->username =$_POST['username'];
		$user->password	=$_POST['password'];
		$user->save();
		return redirect(url("/auth/login"));
	}

	public function readUser($id) {
		$user=User::find($id);
		return view("user.show", array("user"=>$user));
	}

	public function index() {
		return view("LanaUser::user.index", ['user'=>User::all()]);

	}

	public function account() {
		$user=User::where("id", \Auth::user()->id)->paginate(2);
		return view("user.account")
		->with("user", $user);
	}

	public function show() {
		return view("user.show", ['user'=>User::where("id", user()->id)]);
	}

    public function formEdit($id) {
		$user = User::find($id);
		return view("LanaUser::user/form-edit")
		->with("url",url("/user/$id/update"))
		->with("user",$user)
		;
	}

	public function update($id) {
		$user = User::find($id);
		$user->name   =$_POST['name'];
		$user->username =$_POST['username'];
		$user->password	=$_POST['password'];
		
		$user->save();
		return redirect(url("/user"));
	}

	public function delete($id){
		User::destroy($id);
		return redirect(url("/user"));
	}

}
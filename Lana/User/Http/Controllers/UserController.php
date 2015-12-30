<?php
namespace Lana\User\Http\Controllers;

use Lana\User\Entity\Eloquent\User;
use Lana\User\Entity\Eloquent\Profile;
use Lana\User\Http\Requests\RegisterRequest;
use Lana\User\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index()
    {
        if(\Auth::user()->level == "petugas")
            return redirect("/user");
        else
        return view("LanaUser::user.index", ['user'=>User::all()]);
    }

    public function petugasUser() {
        $user=User::where("id", \Auth::user()->id)->paginate(2);
        return view("LanaUser::user.petugas")
        ->with("user", $user);
    }

    public function create()
    {
        $user= new User;
        return view("LanaUser::user/form-reg")
        ->with("url",url("/user/store"))
        ->with("user",$user)
        ;
    }

    public function store(RegisterRequest $request)
    {
        $user = new User;
        $user->username =$_POST['username'];
        $user->password =$_POST['password'];
        $user->level    ="petugas";
        $user->save();
        
        $profile = new Profile;
        $profile->nama      =$_POST['nama'];
        $profile->nip       =$_POST['nip'];
        $profile->alamat    =$_POST['alamat'];
        $profile->email     =$_POST['email'];
        $profile->telp      =$_POST['telp'];
        $profile->user_id   =$user->id;
        $profile->save();
        return redirect(url("/users"));
    }

    public function show($id) {
        $user=User::find($id);
        return view("LanaUser::user.show", array("user"=>$user));
    }

    public function edit($id)
    {
         $user = User::find($id);
        return view("LanaUser::user/form-edit")
        ->with("url",url("/user/$id/update"))
        ->with("user",$user)
        ;
    }

    public function update(EditUserRequest $request,$id)
    {
        $user = User::find($id);
        $user->username =$_POST['username'];
        $user->password =$_POST['password'];
        $user->save();
        return redirect(url("/users"));
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect(url("/users"));
    }
}
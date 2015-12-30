<?php
namespace Lana\User\Http\Controllers;

use Lana\User\Entity\Eloquent\Profile;
use Lana\User\Http\Requests\EditProfileRequest;
use Lana\User\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    
    public function index()
    {   if(\Auth::user()->level == "petugas")
            return redirect("/profile");
        else
        return view("LanaUser::profile.index", ['profile'=>Profile::all()]);
    }

    
    public function petugasProfile() {
        $profile=Profile::where("user_id", \Auth::user()->id)->paginate(11);
        return view("LanaUser::profile.petugas")
        ->with("profile", $profile);
    }
    
    public function show($id)
    {
       $profile=Profile::find($id);
        return view("LanaUser::profile.show", array("profile"=>$profile));
    }

   
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view("LanaUser::profile/form-edit")
        ->with("url",url("/profile/$id/update"))
        ->with("profile",$profile)
        ;
    }

    public function update(EditProfileRequest $request,$id)
    {
        $profile = Profile::find($id);
        $profile->nama      =$_POST['nama'];
        $profile->alamat    =$_POST['alamat'];
        $profile->email     =$_POST['email'];
        $profile->telp      =$_POST['telp'];
        $profile->save();
        return redirect(url("/petugas"));
    }

   
    public function delete($id)
    {
        Profile::destroy($id);
        return redirect(url("/petugas"));
    }

    public function contact()
    {   
        return view("LanaUser::profile.contact", ['profile'=>Profile::all()]);
    }
}

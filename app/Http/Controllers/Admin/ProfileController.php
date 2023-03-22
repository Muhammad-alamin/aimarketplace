<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile');
    }


    public function updateAdmin(Request $request, $id){

            $decrypt_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users,phone,'.$decrypt_id,
                'company' => 'required',
                'email' => 'required|unique:users,email,'.$decrypt_id,

            ]);

            $user = User::findOrFail($decrypt_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->location = $request->location;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }
            $user->save();
            session()->flash('success', 'User Updated Successfully');
            return redirect()->route('admin.profile');

    }


    public function updatePic(){
        return view('admin.profilePic');
    }


    public function updateAdminPic(Request $request, $id){

            $d_id = decrypt($id);
            $user = User::find($d_id);


            if ($request->hasFile('image')){

                $path = 'admin/profile/pic';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($user->image != null && file_exists($user->image)){
                    unlink($user->image);
                }

                $user->image = $path .'/'. $file_name;

            }
            $user->save();
            session()->flash('success', 'Image upload Successfully');
            return redirect()->route('admin.profile.pic');

}
}

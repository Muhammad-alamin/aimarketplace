<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Customer;
use App\Mail\Subscription;
use App\Model\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserManageController extends Controller
{
    public function addUser(){
        return view('admin.userManagement.addUser');
    }
    public function userList(){
        $data ['userList'] = User::where('role','!=', 'admin')->orderBy('id','DESC')->paginate(10);
        return view('admin.userManagement.userList' ,$data);
    }
    public function store(Request $request){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.userList');
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'country' => 'required',
                'city' => 'required',
                'role_as' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->location = $request->city;
            $user->role = $request->role_as;
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success', 'User Created Successfully');
            return redirect()->route('admin.userList');
        }
    }

    public function editUser($id){
        $decrypt_id = decrypt($id);
        $data ['user'] = User::where('role','!=', 'admin')->orderBy('id','DESC')->find($decrypt_id);
        return view('admin.userManagement.editUser' ,$data);
    }

    public function updateUser(Request $request, $id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.userList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'country' => 'required',
                'city' => 'required',
                'role_as' => 'required',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);

            $user = User::findOrFail($decrypt_id);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->location = $request->city;
            $user->role = $request->role_as;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }
            $user->save();
            session()->flash('success', 'User Updated Successfully');
            return redirect()->route('admin.userList');
        }
    }

    public function deleteUser($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.userList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            User::destroy($decrypt_id);
            session()->flash('success', 'User Deleted Successfully');
            return redirect()->route('admin.userList');
        }
    }

    public function customerList(){
        $data ['customerList'] = User::where('role','=', 'customer')->orderBy('id','DESC')->paginate(10);
        return view('admin.userManagement.customerList' ,$data);
    }

    public function editCustomer($id){
        $decrypt_id = decrypt($id);
        $data ['user'] = User::where('role','=', 'customer')->orderBy('id','DESC')->find($decrypt_id);
        return view('admin.userManagement.editCustomer' ,$data);
    }

    public function updateCustomer(Request $request, $id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.customerList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$decrypt_id,
                'phone' => 'required|unique:users,mobile,'.$decrypt_id,
                'password' => 'confirmed'
            ]);

            $user = User::findOrFail($decrypt_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->location = $request->city;
            $user->role = $request->role_as;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }
            $user->save();
            session()->flash('success', 'Customer Updated Successfully');
            return redirect()->route('admin.customerList');
        }
    }

    public function deleteCustomer($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.customerList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            User::destroy($decrypt_id);
            session()->flash('success', 'Customer Deleted Successfully');
            return redirect()->route('admin.customerList');
        }
    }

    public function sellerList(){
        $data ['sellerList'] = User::where('role','=', 'seller')->orderBy('id','DESC')->paginate(10);
        return view('admin.userManagement.sellerList' ,$data);
    }

    public function editSeller($id){
        $decrypt_id = decrypt($id);
        $data ['user'] = User::where('role','=', 'seller')->orderBy('id','DESC')->find($decrypt_id);
        return view('admin.userManagement.editSeller' ,$data);
    }

    public function updateSeller(Request $request, $id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.sellerList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$decrypt_id,
                'phone' => 'required|unique:users,mobile,'.$decrypt_id,
                'password' => 'confirmed'
            ]);

            $user = User::findOrFail($decrypt_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->country = $request->country;
            $user->location = $request->city;
            $user->role = $request->role_as;
            if ($request->has('password') && $request->password != null ){

                $user->password = Hash::make($request->password);
            }
            $user->save();
            session()->flash('success', 'Seller Updated Successfully');
            return redirect()->route('admin.sellerList');
        }
    }

    public function deleteSeller($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.sellerList');
        }
        else
        {
            $decrypt_id = decrypt($id);
            User::destroy($decrypt_id);
            session()->flash('success', 'Seller Deleted Successfully');
            return redirect()->route('admin.sellerList');
        }
    }

    public function description($id){
        $d_id = decrypt($id);
        $data ['customerMail'] = User::where('id',$d_id)->first();
        return view('admin.userManagement.customerMessage',$data);
    }

    public function sendEmail(Request $request){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.customerList');
        }
        else
        {
            $data = $request->description;
            $email = $request->email;
//        $user['to'] = $request->email;
//        $user['to'] = 'alamin.softdevloper@gmail.com';

            Mail::to($email)->send(new Customer($data));
            session()->flash('success', 'Send Mail Successfully');
            return redirect()->route('admin.customerList');
        }
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.customerRegistration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'required|confirmed|min:8',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $user = new User();

        $user->name = $request->username;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->status = 'Active';
        $user->save();
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cus_id = decrypt($id);
        $data ['userId'] = User::where('id',$cus_id)->first();
        return view('front.customerInformation.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->demo_id == 1) {
            Toastr::error('Demo account are not change anything!', 'error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'username' => 'required|max:20',
                'email' => 'required|unique:users,email,'.$d_id,
                'mobile' => 'required|unique:users,mobile,'.$d_id,
            ]);

            $data = User::find($d_id);
            $data->name = $request->username;
            $data->mobile = $request->mobile;
            $data->email = $request->email;

            $db_pass = auth()->user()->password;
            $old_pass = $request->cur_password;
            $new_pass = $request->new_password;
            $confirm_pass = $request->conf_password;
            if (Hash::check($old_pass, $db_pass)){
                if ($new_pass == $confirm_pass){
                    $data->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                    auth()->logout();
                    return redirect()->route('login');
                }
                else{
                    Toastr::error('New password and confirm password does not match', 'error', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }

            }
            else{
                Toastr::error('Old password not match', 'error', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            $data->save();
            Toastr::success('Information updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

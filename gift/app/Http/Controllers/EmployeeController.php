<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    //############################################################_index_#############################################################################


    public function index()
    {
        $users = employee::Orderby('id')->get();

        return view('users.index', ['users' => $users]);
    }


    //############################################################_create_############################################################################


    public function create()
    {
        return view('users.create');
    }


    //#############################################################_store_############################################################################

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required',
            'dob' => 'required|date',
            'phone_no' => 'required',
            'address' => 'required',
            // 'profile' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);
        // dd($request->all());
        $profile = $request->file('profile');
        $profileName = '';
        if (!empty($profile)) {
            $profileName = time() . '.' . $request->profile->extension();
            $profile->move('test', $profileName);
            // $profile->storeAs('photos', $profileName, "public");
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'profile' => 'test/' . $profileName
        ];
        // dd($request->all());
        employee::create($data);
        return redirect()->back();
    }


    //################################################################_edit_##########################################################################

    public function edit($id)
    {
        $employee = employee::where('id', $id)->first();
        return view('users.edit', ['user' => $employee]);
    }

    //################################################################_update_########################################################################

    public function update(Request $request, $id)
    {
        employee::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            // 'profile'=>[
            //     File::image()
            //         ->max('10mb')
            // ],
        ]);

        // $profile = $request->file('profile');
        // $profileName = '';
        // if (!empty($profile)) {
        //     $profileName = $profile->getClientOriginalName();
        //     $profile->move('photos', $profileName);
        // }

        employee::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'phone_no' => $request->phone_no,
            'address' =>  $request->address,
            // 'profile' => 'photos/' . $profileName
        ]);
        return redirect(url('users/index'));
    }

    //#################################################################_delete_###########################################################################

    public function delete($id)
    {
        employee::where('id', $id)->delete();

        return redirect(url('users/index'));
    }

    //##################################################################_login_###########################################################################

    public function login(Request $request)
    {
        $input = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('employee')->attempt($input)) {
            $employee = employee::where('email', $input['email'])->first();
            // dd(Auth::guard('employee')->check());
            Auth::guard('employee')->loginUsingId($employee->id);

            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'credentials not matched with our records.']);
    }

    //##################################################################_Dashboard_#######################################################################

    public function dashboard()
    {
        return view('Dashboard');
    }

    //###################################################################_Reg_#########################################################################

    public function reg()
    {
        return view('users.reg');
    }
    //###################################################################_logout_#########################################################################

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    //###################################################################_profile_########################################################################

    public function editProfile()
    {
        $user = Auth::user();

        return view('users.profile', ['user' => $user]);
    }
}

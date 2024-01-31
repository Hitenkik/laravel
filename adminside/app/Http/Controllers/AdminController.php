<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::OrderByDesc('id')->get();

        return view('admin.index', ['admin' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'message' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());

        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nickname' => $request->nickname,
            'gender' => $request->gender,
            'message' => $request->message,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);

        return redirect(url('admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = User::where('id', $id)->first();
        return view('admin.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'nickname' => 'required',
            'gender' => 'required',
            'message' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'nickname' => $request->nickname,
            'gender' => $request->gender,
            'message' => $request->message,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect(url('admin'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        User::where('id', $id)->delete();

        return redirect(url('admin'));
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            // 'nickname' => $request->nickname,
            // 'gender' => $request->gender,
            // 'message' => $request->message,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);

        return redirect(url('login'));
    }
}

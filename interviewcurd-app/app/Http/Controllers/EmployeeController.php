<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::Orderby('id')->get();
        return view('employee.index', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'contact' => 'required|digits:10',
            'address' => 'required',
            'profile' => 'required',
        ]);

        $profile = $request->file('profile');
        $profileName = '';
        if (!empty($profile)) {
            $profileName = time() . '.' . $request->profile->extension();
            $profile->move('test', $profileName);
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'contact' => $request->contact,
            'address' => $request->address,
            'profile' => 'test/' . $profileName
        ];

        Employee::create($data);
        return redirect(url('employee/index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'contact' => ['required', 'regex:/^((71)|(73)|(77))[0-9]{7}/'],
            'address' => 'required',
        ]);

        Employee::where('id', $id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        return redirect(url('employee/index'));
    }

    public function delete($id)
    {
        Employee::where('id', $id)->delete();
        return redirect(url('employee/index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}

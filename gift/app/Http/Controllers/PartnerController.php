<?php

namespace App\Http\Controllers;

use App\Models\partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $partners = Partner::get();

            if ($request->search != null) {
                $partners = Partner::where('name', 'like', "%{$request->search}%")->get();
            }

            return response()->json($partners);
        }

        return view('partners.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter|unique:partners',
            'phone' => 'required',
            // 'image' => 'required',
        ]);

        $profile = $request->file('image');
        $image = '';
        if (!empty($profile)) {
            $profileName = $profile->getClientOriginalName();
            $profile->storeAs('photos', $profileName, "public");
            $image = 'storage/photos/' . $profileName;
        }



        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image
        ];

        Partner::create($data);

        return response()->json('Partner created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(partner $partner)
    {
        return response()->json($partner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $partner = partner::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter|unique:partners,email,' . $partner->id,
            'phone' => 'required',
            'image' => 'required',
        ]);
        $profile = $request->file('image');
        $image = '';
        if (!empty($profile)) {
            $profileName = $profile->getClientOriginalName();
            $profile->storeAs('photos', $profileName, "public"); // store in storage
            $image = 'storage/photos/' . $profileName;
            $partner->update(['image' => $image]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image
        ];

        $partner->update($data);

        return response()->json('Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(partner $partner)
    {
        $partner->delete();
        return response()->json('Partner Deleted successfully');
    }
}

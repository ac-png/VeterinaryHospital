<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        $hospitals = Hospital::all();

        // Returns to the page with all the hospitals.
        return view('admin.hospitals.index')->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        return view('admin.hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // Validates if the request is valid.
        $request->validate([
            'name' => 'required',
            'address' => 'required|max:250'
        ]);

        // Create a new hospital.
        Hospital::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'address' => $request->address
        ]);

        return to_route('admin.hospitals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // If the id of the admin does not mathch the note's admin_id, returns a error screen.
        if (!Auth::id()) {
            return abort(403);
        }

        $hospital = Hospital::where('uuid', $uuid)->firstOrFail();

        // Returns to the single hospital page.
        return view('admin.hospitals.show')->with('hospital', $hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // dd($hospital->hospital->id);

        $hospitals = Hospital::all();

        // return view('admin.hospitals.edit')->with('hospital', $hospital);
        return view('admin.hospitals.edit')->with('hospital', $hospital);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // Deletes the hospital.
        $hospital->delete();

        // Returns to the page with the hospitals (without the deleted note).
        return to_route('admin.hospitals.index')->with('success', 'Hospital deleted successfully');
    }
}

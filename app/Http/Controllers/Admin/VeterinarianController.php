<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veterinarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VeterinarianController extends Controller
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

        // Sorts the veterinarians so the most recent updated_at is on top.
        $veterinarians = Veterinarian::latest('updated_at')->paginate(5);

        // Returns to the page with all the veterinarians.
        return view('admin.veterinarians.index')->with('veterinarians', $veterinarians);
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

        return view('admin.veterinarians.create');
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
            'address' => 'required|max:250',
            'bio' => 'required|max:250'
        ]);

        // Create a new veterinarian.
        Veterinarian::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'address' => $request->address,
            'bio' => $request->bio
        ]);

        return to_route('admin.veterinarians.index')->with('success', 'Veterinarian created successfully');
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

        // If the id of the admin does not match the note's admin_id, returns a error screen.
        if (!Auth::id()) {
            return abort(403);
        }

        $veterinarian = Veterinarian::where('uuid', $uuid)->firstOrFail();

        // Returns to the single veterinarian page.
        return view('admin.veterinarians.show')->with('veterinarian', $veterinarian);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Veterinarian $veterinarian)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // dd($veterinarian->veterinarian->id);

        $veterinarians = Veterinarian::all();

        // return view('admin.veterinarians.edit')->with('veterinarian', $veterinarian);
        return view('admin.veterinarians.edit')->with('veterinarian', $veterinarian);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veterinarian $veterinarian)
    {
        // Authorizes admin roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Validates if the request is valid.
        $request->validate([
            'name' => 'required',
            'address' => 'required|max:250',
            'bio' => 'required|max:250'
        ]);

        // Updates the veterinarian's information.
        $veterinarian->update([
            'name' => $request->name,
            'address' => $request->address,
            'bio' => $request->bio
        ]);

        // Returns to the single veterinarian page (with the updated data).
        return to_route('admin.veterinarians.show', $veterinarian->uuid)->with('success', 'Veterinarian updated successfully');
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

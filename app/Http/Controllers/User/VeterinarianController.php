<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Veterinarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sorts the veterinarians so the most recent updated_at is on top.
        $veterinarians = Veterinarian::latest('updated_at')->paginate(5);

        // Returns to the page with all the veterinarians.
        return view('user.veterinarians.index')->with('veterinarians', $veterinarians);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        // If the id of the admin does not mathch the note's admin_id, returns a error screen.
        if (!Auth::id()) {
            return abort(403);
        }

        $veterinarian = Veterinarian::where('uuid', $uuid)->firstOrFail();

        // Returns to the single veterinarian page.
        return view('user.veterinarians.show')->with('veterinarian', $veterinarian);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}

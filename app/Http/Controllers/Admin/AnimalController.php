<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AnimalController extends Controller
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

        // Sorts the animals so the most recent updated_at is on top.
        $animals = Animal::latest('updated_at')->paginate(5);

        // Returns to the page with all the animals.
        return view('admin.animals.index')->with('animals', $animals);
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

        $hospitals = Hospital::all();

        return view('admin.animals.create')->with('hospitals', $hospitals);

        return view('admin.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
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
            'type' => 'required',
            'veterinarian' => 'required',
            'notes' => 'required|max:500',
            'hospital_id' => 'required'
        ]);

        // Create a new animal.
        Animal::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'type' => $request->type,
            'veterinarian' => $request->veterinarian,
            'notes' => $request->notes,
            'hospital_id' => $request->hospital_id
        ]);

        return to_route('admin.animals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // If the id of the admin does not mathch the note's admin_id, returns a error screen.
        if (!Auth::id()) {
            return abort(403);
        }

        // Returns to the single animal page.
        return view('admin.animals.show')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // dd($animal->hospital->id);

        $hospitals = Hospital::all();

        // return view('admin.animals.edit')->with('animal', $animal);
        return view('admin.animals.edit', [
            'animal' => $animal,
            'hospitals' => $hospitals
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // Validates if the request is valid.
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'veterinarian' => 'required',
            'notes' => 'required|max:500',
            'hospital_id' => 'required'
        ]);

        // Updates the animal's information.
        $animal->update([
            'name' => $request->name,
            'type' => $request->type,
            'veterinarian' => $request->veterinarian,
            'notes' => $request->notes,
            'hospital_id' => $request->hospital_id
        ]);

        // Returns to the single animal page (with the updated data).
        return to_route('admin.animals.show', $animal)->with('success', 'Animal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        // Authorizes admin roles.
        $admin = Auth::user();
        $admin->authorizeRoles('admin');

        // Deletes the animal.
        $animal->delete();

        // Returns to the page with the animals (without the deleted note).
        return to_route('admin.animals.index')->with('success', 'Animal deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Sorts the animals so the most recent updated_at is on top.
        $animals = Animal::latest('updated_at')->paginate(10);

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
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Returns the create form for the annimals.
        return view('admin.animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Validates if the request is valid.
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'veterinarian' => 'required|max:100',
            'notes' => 'required|max:500'
        ]);

        // Create a new animal.
        Animal::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'type' => $request->type,
            'veterinarian' => $request->veterinarian,
            'notes' => $request->notes
        ]);

        // Returns to the page with all the animals.
        return to_route('admin.animals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // If the id of the user does not mathch the note's user_id, returns a error screen.
        if (!Auth::id()) {
            return abort(403);
        }

        // Returns to the single animal page.
        return view('admin.animals.show')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Return the form for editing an animal.
        return view('admin.animals.edit')->with('animal', $animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Validates if the request is valid.
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'veterinarian' => 'required|max:100',
            'notes' => 'required|max:500'
        ]);

        // Updates the animal's information.
        $animal->update([
            'name' => $request->name,
            'type' => $request->type,
            'veterinarian' => $request->veterinarian,
            'notes' => $request->notes
        ]);

        // Returns to the single animal page (with the updated data).
        return to_route('admin.animals.show', $animal)->with('success', 'Animal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        // Authorizes user roles.
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        // Deletes the animal.
        $animal->delete();

        // Returns to the page with the animals (without the deleted note).
        return to_route('admin.animals.index')->with('success', 'Animal deleted successfully');
    }
}

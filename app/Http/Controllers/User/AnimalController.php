<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Animal;
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
        // Generates a paginated list of the animals.
        $animals = Animal::paginate(10);

        // Return the user animals view (all animals).
        return view('user.animals.index')->with('animals', $animals);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        // Returns the id of the user.
        if (!Auth::id()) {
            return abort(403);
        }

        // Show the users user animals view (single animal).
        return view('user.animals.show')->with('animal', $animal);
    }
}

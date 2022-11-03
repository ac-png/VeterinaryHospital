<?php

namespace App\Http\Controllers;

use App\Models\Animal;
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
          // Fetch All Animals, owned by the Logged in User, in order of when they were last updated - latest updated returned first, And you want the $books paginated.
          // $animals = Animal::where('user_id', Auth::id())->latest('updated_at')->paginate(10);

          // Fetch All Animals(not just belonging to the logged in user) and add pagination.
          $animals = Animal::paginate(10);

          // Fetch All Animals, no pagination.
          //$animals = Animal::all();

          // Something not working - unccoment the line below to dump all the books onto the screen to help you troubleshoot.
          //   dd($animals);
          return view('animals.index')->with('animals', $animals);
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
    public function show(Animal $animal)
    {
        // Use the code below if you want the user to only be able to view books that they own.
        //  if($animal->user_id != Auth::id()) {
        //     return abort(403);
        // }

        if(!Auth::id()) {
            return abort(403);
          }
 
         //this function is used to get a animal by the ID.
         return view('animals.show')->with('animal', $animal);
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

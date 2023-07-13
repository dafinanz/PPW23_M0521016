<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Auth;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::join('users', 'pets.user_id', '=', 'users.id')
            ->join('owners', 'pets.owner_id', '=', 'owners.id')
            ->select('pets.id', 'pets.name as pet_name', 'owners.name as owner_name', 'pets.species', 'pets.disease', 'pets.appointment')
            ->get();

        return view('dashboard.pets.view', compact('pets'));
    }

    public function view()
    {
        $pets = Pet::join('users', 'pets.user_id', '=', 'users.id')
            ->join('owners', 'pets.owner_id', '=', 'owners.id')
            ->select('pets.id', 'pets.name as pet_name', 'owners.name as owner_name', 'pets.species', 'pets.disease', 'pets.appointment')
            ->get();

        return view('dashboard.pets.view', compact('pets'));
    }

    public function create(Request $request)
    {
        $this->authorize('isUser');
        $user_id = $request->user()->id;
        $owners = Owner::all();
        return view('dashboard.pets.create', compact('user_id', 'owners'));
    }
    
    public function store(Request $request)
    {
        $this->authorize('isUser');
        $attributes = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'species' => 'required',
            'disease' => 'required',
            'appointment' => 'required|date',
            'owner_id' => 'required'
        ]);

        $owner = Owner::findOrFail($attributes['owner_id']);
    
        $pet = new Pet();
        $pet->user_id = $attributes['user_id'];
        $pet->name = $attributes['name'];
        $pet->species = $attributes['species'];
        $pet->disease = $attributes['disease'];
        $pet->appointment = $attributes['appointment'];
        $pet->owner()->associate($owner);
    
        $pet->save();
    
        return redirect()->route('dashboard');
    }

    public function edit(Pet $pet)
    {
        return view('dashboard.pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $this->authorize('isAdmin');
        $attributes = $request->validate([
            'name' => 'required',
            'species' => 'required',
            'disease' => 'required',
            'appointment' => 'required|date',
        ]);

        Pet::where('id', $pet->id)->update($attributes);

        return redirect()->route('pets');
    }

    public function destroy(Pet $pet){
        $this->authorize('isAdmin');
        Pet::destroy($pet->id);

        return redirect()->route('pets.view');
    }

}

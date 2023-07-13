<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;

class OwnerController extends Controller
{
    public function index(){
        $owners = Owner::latest()->get();
        
        return view('dashboard.owners.view', compact('owners'));
    }

    public function create(Request $request){
        $this->authorize('isAdmin');

        $user_id = $request->user()->id;
        return view('dashboard.owners.create', compact('user_id'));
    }

    public function store(Request $request){
        $this->authorize('isAdmin');

        $attributes = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $user = User::findOrFail($attributes['user_id']);
    
        $owner = new Owner();
        $owner->user()->associate($user);
        $owner->name = $attributes['name'];
        $owner->telephone = $attributes['telephone'];
        $owner->address = $attributes['address'];
    
        $owner->save();

        return redirect()->route('owners.view');
    }

    public function view(){
        $owners = Owner::all();
        return view('dashboard.owners.view', compact('owners'));
    }

    public function edit(Owner $owner)
    {
        $this->authorize('isAdmin');
        return view('dashboard.owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $this->authorize('isAdmin');
        $attributes = $request->validate([
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        Owner::where('id', $owner->id)->update($attributes);

        return redirect()->route('owners');
    }

    public function destroy(Owner $owner){
        Owner::destroy($owner->id);

        return redirect()->route('owners.view');
    }
}

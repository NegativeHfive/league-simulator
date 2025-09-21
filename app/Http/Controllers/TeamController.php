<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function create()
    {
        return view('teams.team');
    }

    public function store(Request $request)
    {
        // validating the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description'=> 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,jpg,png,gif',
            'city' => 'required|string|max:255'
        ]);

        //handle the file upload
        $filePath = $request->file('logo')->store('logos', 'public');

        //save it to the database
        Team::create([
            'name' => $request->name,
            'description' =>$request->description,
            'logo' => $filePath,
            'city' => $request->city
        ]);

        return redirect()->back()->with('success', 'Logo uploaded succesfully');
    }

    //index to show all the data from the table teams
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    }

    // select a team from the table teams
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    //update the selected team
    public function update(Request $request, $id)
    {
        // finding the specific team
        $team = Team::findOrFail($id);
        // validating the input
        $request->validate([
            'name' => 'required|string|max:255',
            'description'=> 'nullable|string',
            'logo' => 'required|image|mimes:jpeg,jpg,png,gif',
            'city' => 'required|string|max:255'
        ]);

        //update the fields
        $team->name = $request->name;
        $team->description = $request->description;
        $team->city = $request->city;

        //handle the new image
        if($request->hasFile('logo'))
        {
            // store the new image
            $imagePath = $request->file('logo')->store('logos', 'public');
            $team->logo = $imagePath;
        }

        $team->save(); // saves the team to the database

        return redirect()->route('teams.index')->with('success', 'Team updated');
    }

    //delete function
    public function delete($id)
    {
        $team = Team::findOrFail($id);

        //deleting image from the storage folder
        if($team->logoPath && \Storage::disk('public')->exists($team->logoPath))
        {
            \Storage::disk('public')->delete($team->logoPath);
        }

        $team->delete();
        
        return redirect()->route('teams.index')->with('success', 'Team deleted');
    }
}

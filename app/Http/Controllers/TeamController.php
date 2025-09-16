<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    //index in getting all the teams
    public function index()
    {
        $matches = Matches::all()->shuffle();
        return view('matches.index', compact('matches'));
    }

    //generating the Match function
    public function generateMatch()
    {
        $teams = Team::all(); // selecting all the teams

        foreach ($teams as $i => $team1){
            foreach ($teams as $j => $team2){
                if ($i < $j){ // we check make sure that they pair once and that the id is not the same
                    $exists = Matches::where(function($query) use ($team1, $team2){
                        $query->where('team1Id', $team1->id)->where('team2Id', $team2->id);
                    })->orWhere(function($query) use ($team1,$team2){
                        $query->where('team1Id', $team2->id)->where('team2Id',$team1->id);
                    })->exists();

                    if(!$exists)
                    {
                        //create a new Match(scores will be filled in too)
                        $match = Matches::create([
                            'team1Id' => $team1->id,
                            'team2Id' => $team2->id,
                            'team1score' => rand(0,5),
                            'team2score' => rand(0,5),
                            'team1points' => 0,
                            'team2points' => 0, 
                        ]);
                        $match->calculatePoints();
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Matches generated!');
    }

    // deleting all the data from the table matches. 
    public function delete()
    {
        Matches::truncate();
        return redirect()->back()->with('success', 'All matches cleared');
    }
}

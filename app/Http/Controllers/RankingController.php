<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Team;
use App\Models\Matches;
use Illuminate\Http\Request;

class RankingController extends Controller
{

    //index which shows all the rankings
    public function index()
    {
        $teams = Ranking::orderBy('points', 'desc')->get();
        return view('ranking.index', compact('teams'));

    }

    //deleting all the rankings 
    public function delete()
    {
        Ranking::truncate();
        return redirect()->back()->with('success', 'Rankings cleared');
    }

    //calculating Rankings 
    public function calculateRankings()
    {
        $teams = Team::all();

        foreach($teams as $team){
            // we are getting all the matches where this team played
            $matches = Matches::where('team1Id', $team->id)->orWhere('team2Id', $team->id)->get();

            $totalPoints = 0;
            $goalsScored = 0;
            $goalsAgainst = 0;
            $losses = 0;
            $draws = 0;
            $wins = 0;

            //$goalDifference = $goalsAgainst - $goalsScored;

            foreach ($matches as $match) {
                if ($match->team1Id == $team->id) {
                    // Team is team1
                    $goalsScored += $match->team1score;
                    $goalsAgainst += $match->team2score;

                    if ($match->team1score > $match->team2score) {
                        $wins++;
                    } elseif ($match->team1score < $match->team2score) {
                        $losses++;
                        // 0 points
                    } else {
                        $draws++;
                    }
                } else {
                    // Team is team2
                    $goalsScored += $match->team2score;
                    $goalsAgainst += $match->team1score;

                    if ($match->team2score > $match->team1score) {
                        $wins++;
                    } elseif ($match->team2score < $match->team1score) {
                        $losses++;
                        // 0 points
                    } else {
                        $draws++;
                    }
                }
            }

            //Updating or creating the rankings
            Ranking::updateOrCreate(
                ['teamId' => $team->id],
                [
                    'points' => $wins * 3 + $draws,
                    'wins' => $wins,
                    'losses' => $losses,
                    'draws' => $draws,
                    'goal_difference' => $goalsScored - $goalsAgainst,
                ]
                );
        }

        return redirect()->route('ranking.index')->with('success', 'Rankings calculated successfully!');
    }
}

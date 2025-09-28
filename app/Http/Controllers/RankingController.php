<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Team;
use App\Models\Matches;
use Illuminate\Http\Request;

class RankingController extends Controller
{

    //showing the ranking of teams in order of points (So the team with the highest points)
    public function index()
    {
        $teams = Ranking::orderBy('points', 'desc')->get();
        return view('ranking.index', compact('teams'));

    }

    //display graph with chart js for the teams
    public function graph()
    {
        $rankings = Ranking::with('team')->get(); // getting all the teams

        // preparing labels (team names) and data (wins)
        $labels = $rankings->map(fn($rankings)=> $rankings->team->name);
        $wins = $rankings->pluck('wins');
        $losses = $rankings->pluck('losses');
        return view('ranking.graph', compact('labels', 'wins', 'losses'));
    }

    //csv export function for exporting the rankings table.
    public function exportCSV()
    {
        $filename = 'ranking.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function() {
            $handle = fopen('php://output', 'w');

            //add CSV headers
            fputcsv($handle,[
                'Team',
                'Wins',
                'Losses',
                'Draws',
                'Points'
            ]);

            //fetching the data
            Ranking::chunk(25, function($rankings) use ($handle){
                foreach ($rankings as $ranking){
                    $data = [
                        isset($ranking->team->name) ? $ranking->team->name : '',
                        isset($ranking->wins) ? $ranking->wins : '',
                        isset($ranking->losses) ? $ranking->losses : '',
                        isset($ranking->draws) ? $ranking->draws : '',
                        isset($ranking->points) ? $ranking->points : '',
                    ];

                    //write data to the csv file
                    fputcsv($handle,$data);
                }
            });

            //closing the file
            fclose($handle);

        },200,$headers);
    }

    //deleting all the rankings 
    public function delete()
    {
        Ranking::truncate();
        return redirect()->back()->with('success', 'Rankings cleared');
    }

    //calculating the rankings
    public function calculateRankings()
    {
        $teams = Team::all();

        foreach($teams as $team){
            // we are getting all the matches where this team played
            $matches = Matches::where('team1Id', $team->id)->orWhere('team2Id', $team->id)->get();

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

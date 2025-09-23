<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    // fillables
    protected $fillable = [
        'team1Id', 'team2Id',
        'team1score', 'team2score',
        'team1points', 'team2points'
    ];
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1Id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2Id');
    }

    //calculating the amount of points function.
    public function calculatePoints()
    {
        if ($this->team1score > $this->team2score)
        {
            $this->team1points = 3;
            $this->team2points = 0;
        }
        elseif ($this->team1score < $this->team2score)
        {
            $this->team1points = 0;
            $this->team2points = 3;
        }
        elseif($this->team1score === $this->team2score){
            $this->team1points = 1;
            $this->team2points = 1;
        }
        else{
            $this->team1points = 1;
            $this->team2points = 1;
        }

        $this->save();
    }
}

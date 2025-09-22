<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    //fillables
    protected $fillable = ['teamId', 'wins', 'losses', 'draws', 'goal_difference', 'points'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'teamId');
    }
}

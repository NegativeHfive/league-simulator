<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'description', 'logo', 'city'];

    //home matches and away matches 
    public function homeMatches()
    {
        return $this->hasMany(Matches::class, 'team1Id');
    }

    public function awayMatches()
    {
        return $this->hasMany(Matches::class, 'team2Id');
    }
}

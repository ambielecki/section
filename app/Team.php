<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Team extends Model
{
    protected  $fillable = [
        'city','name','league','division'
    ];

    public function players()
    {
        return $this->hasMany('App\Player');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function sortTeams()
    {
        $teams = Team::orderBy('name')->get();
        $leagues = DB::table('teams')->select('league')->distinct()->get();
        $divisions = DB::table('teams')->select('division')->distinct()->get();

        $leagueData = [];

        foreach ($leagues as $league) {
            $leagueData[$league->league] = [];
            foreach ($divisions as $division) {
                $leagueData[$league->league][$division->division] = [];
                foreach ($teams as $team) {
                    if ($team->league == $league->league && $team->division == $division->division) {
                        array_push($leagueData[$league->league][$division->division], $team);
                    }
                }
            }
        }
        return $leagueData;
    }
}

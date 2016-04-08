<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Team extends Model
{
    //for mass assignment
    protected  $fillable = [
        'city','name','league','division'
    ];

    //relationships for fk
    public function players()
    {
        return $this->hasMany('App\Player');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

    //function to sort teams alphabetically and then group into multidimensional array
    public function sortTeams()
    {
        //get all teams
        $teams = $this->orderBy('name')->get();
        //get league names
        $leagues = $this->select('league')->distinct()->get();
        //get division name (same in both league)
        $divisions = $this->select('division')->distinct()->get();

        $leagueData = [];

        //build array, first dimension keys are league names with a array of the divisions. Next dimension key is division name values are teams as a collection
        foreach ($leagues as $league) {
            $leagueData[$league->league] = [];
            foreach ($divisions as $division) {
                $leagueData[$league->league][$division->division] = [];
                foreach ($teams as $team) {
                    //put in teams that are in the current league and division
                    if ($team->league == $league->league && $team->division == $division->division) {
                        array_push($leagueData[$league->league][$division->division], $team);
                    }
                }
            }
        }
        return $leagueData;
    }
}

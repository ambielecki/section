<?php

namespace app\Libraries;

use DB;
use App\Team;

/**
 * Created by PhpStorm.
 * User: Bielecki
 * Date: 4/5/2016
 * Time: 2:42 PM
 */
class teamHelper
{
    public function sortTeams(){
        $teams= Team::orderBy('name')->get();
        $leagues = DB::table('teams')->select('league')->distinct()->get();
        $divisions = DB::table('teams')->select('division')->distinct()->get();

        $leagueData = [];

        foreach($leagues as $league){
            $leagueData[$league->league] =[];
            foreach($divisions as $division){
                $leagueData[$league->league][$division->division]=[];
                foreach($teams as $team){
                    if($team->league == $league->league && $team->division == $division->division){
                        array_push($leagueData[$league->league][$division->division], $team->name);
                    }
                }
            }
        }
        return $leagueData;
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * App\Team
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $city
 * @property string $name
 * @property string $league
 * @property string $division
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Player[] $players
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereLeague($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Team whereDivision($value)
 * @mixin \Eloquent
 */
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

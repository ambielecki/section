<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use App\Player;

class BaseballController extends Controller
{

    public function getTeams(){
        //get teams from db
        $teams = Team::get();
        return view('baseball.teams')->with('teams', $teams);
    }

    public function getRoster(){
        //get players from db
        $players = Player::get();
        return view('baseball.roster')->with('players', $players);
    }

    public function getTest(){
        //check users level to see if they are an admin
        if(auth()->user()->level <= 1){

            $team = Team::find(3);
            dump($team->toArray());
            dump($team->users->toArray());

        }else{
            return view('baseball.unauthorized');
        }
    }
}

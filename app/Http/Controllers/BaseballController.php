<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use App\Player;

class BaseballController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTeams(){
        $teams = Team::get();
        return view('baseball.teams')->with('teams', $teams);
    }

    public function getRoster(){
        $players = Player::get();
        return view('baseball.roster')->with('players', $players);
    }

    public function getTest(){
        if(auth()->user()->level <= 1){
            /*$helper = new Libraries\teamHelper();
        $leagueData = $helper->sortTeams();*/

            $teams = new Team();
            $leagueData = $teams->sortTeams();




            dump($leagueData);

            foreach($leagueData as $leagueName => $divisions){
                echo $leagueName.'<br>';
                foreach($divisions as $divisionName => $teams){
                    echo '    '.$divisionName.'<br>';
                }
            }
        }else{
            return view('baseball.unauthorized');
        }
    }
}

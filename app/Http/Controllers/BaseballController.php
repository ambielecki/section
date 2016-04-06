<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use App\Player;

class BaseballController extends Controller
{
    public function getTest(){

        /*$helper = new Libraries\teamHelper();
        $leagueData = $helper->sortTeams();*/

        $teams = new Team();
        $leagueData =$teams->sortTeams();

        $players = Player::with('team')->get();

        dump($players->toArray());
    }
}

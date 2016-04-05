<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Team;
use DB;
use App\Libraries;

class BaseballController extends Controller
{
    public function getTest(){

        $helper = new Libraries\teamHelper();
        $leagueData = $helper->sortTeams();

        dump($leagueData);
    }
}

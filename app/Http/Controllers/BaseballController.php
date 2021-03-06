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

    public function getRoster($team = null){
        //get players from db
        if(!$team){
            $teams = \DB::table('teams')
                ->join('players', 'players.team_id','=','teams.id')
                ->select('teams.*')
                ->distinct()
                ->groupBy('teams.id')
                ->get();
            return view('baseball.roster')->with('teams', $teams);
        }
        else{
            $selectTeam = Team::where('id','=',$team)->with('players')->first();
            return view('baseball.roster')->with('team', $selectTeam);
        }
    }

    public function getAddPlayer(){
        $teams = new Team();
        $sortedTeams = $teams->sortTeams();
        return view('baseball.addPlayer')->with('leagues', $sortedTeams);
    }

    public function postAddPlayer(Request $request){

        $this->validate($request,[
            'number' => 'required|numeric|integer|min:1|max:99',
            'name'=> 'required|string',
            'position' => 'required|in:RP,SP,C,1B,2B,3B,LF,CF,RF,P,IF,OF,DH,SS',
            'bats' => 'in:R,L,S',
            'throws' => 'in:R,L',
            'age' => 'numeric|min:1|max:120',
            'height' => 'alpha_dash',
            'weight' => 'numeric',
            'home' => 'string',
            'salary' => 'string',
            'team_id' => 'required|numeric|integer'
        ]);

        $player = new Player();
        $player->number = $request->input('number');
        $player->name = $request->input('name');
        $player->position = $request->input('position');
        $player->throws = $request->input('throws');
        $player->bats = $request->input('bats');
        $player->team_id = $request->input('team_id');
        $player->age = $request->input('age');
        $player->height = $request->input('height');
        $player->weight = $request->input('weight');
        $player->home = $request->input('home');
        $player->salary = $request->input('salary');
        $player->save();

        \Session::flash('flash_message','Player: '.$player->name .' Added');
        return redirect('/addplayer');

        /*$player= new Player();
        if($player->validate($request->all(), 'add')){
            //adds new player and returns first_name
            $addNew = $player->addNew($request);

            \Session::flash('flash_message','Player: '.$addNew.' Added');
            return redirect('/addplayer');
        }else{
            $errors = $player->errors();
            return redirect('/addplayer')->with('errors', $errors);
        }*/
    }

    public function getLayout(){
        return view('test.layouttest', ['block1'=>'content2', 'block2'=>'content1']);
    }

    public function getTest(){
        $bcrypt = bcrypt('password');
        echo $bcrypt.'<br>';
        $hash = \Hash::make('password');
        echo $hash.'<br>';
        if(\Hash::check('password', $hash)){
            echo 'it works';
        }else{
            echo 'does not work';
        }
    }
}

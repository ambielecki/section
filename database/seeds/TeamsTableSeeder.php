<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //use csv reader to mass assign the team info
        $reader = Reader::createFromPath(database_path().'/seeds/csv/mlbteams.csv');
        $data = $reader->fetchAssoc(['city','name','league','division']);

        foreach($data as $thisTeam){
            Team::create([
                'name'=>$thisTeam['name'],
                'city'=>$thisTeam['city'],
                'league'=>$thisTeam['league'],
                'division'=>$thisTeam['division']
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reader = Reader::createFromPath(database_path().'/seeds/csv/25manroster.csv');
        $data = $reader->fetchAssoc(['team_id','number','name','position','bats','throws','age','height','weight','home','salary']);

        foreach($data as $player){
            Player::create([
                'team_id'=>$player['team_id'],
                'number'=>$player['number'],
                'name'=>$player['name'],
                'postion'=>$player['position'],
                'bats'=>$player['bats'],
                'throws'=>$player['throws'],
                'age'=>$player['age'],
                'height'=>$player['height'],
                'weight'=>$player['weight'],
                'home'=>$player['home'],
                'salary'=>$player['salary']
            ]);
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;

/**
 * App\Player
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $number
 * @property string $name
 * @property string $postion
 * @property string $bats
 * @property string $throws
 * @property string $age
 * @property string $height
 * @property string $weight
 * @property string $home
 * @property string $salary
 * @property integer $team_id
 * @property-read \App\Team $team
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player wherePostion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereBats($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereThrows($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereAge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereHome($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereSalary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereTeamId($value)
 * @mixin \Eloquent
 * @property string $position
 * @method static \Illuminate\Database\Query\Builder|\App\Player wherePosition($value)
 */
class Player extends Model
{
    //for mass assignment
    protected $fillable = [
        'number', 'name', 'postion', 'bats', 'throws', 'age', 'height', 'weight', 'home', 'salary', 'team_id'
    ];

    private $rules = array(
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
    );

    private $errors;

    public function validate($request, $method){
        if($method=='add'){
            $validate = \Validator::make($request, $this->rules);

            if($validate->fails()){
                $this->errors = $validate->errors();
                return false;
            }else{
                return true;
            }
        }else{
            return 'Method not recognized';
        }
    }

    public function addNew($request){
        $this->number = $request->input('number');
        $this->name = $request->input('name');
        $this->position = $request->input('position');
        $this->throws = $request->input('throws');
        $this->bats = $request->input('bats');
        $this->team_id = $request->input('team_id');
        $this->age = $request->input('age');
        $this->height = $request->input('height');
        $this->weight = $request->input('weight');
        $this->home = $request->input('home');
        $this->salary = $request->input('salary');
        $this->save();

        return $this->name;
    }

    public function errors(){
        return $this->errors;
    }

    //model relationship for fk
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

}

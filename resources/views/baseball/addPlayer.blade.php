@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add A Player</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/addplayer') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="number">Number</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="number" id="number" value="{{ old('number') }}">

                                    @if ($errors->has('number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="first_name">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="position">Position</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="position" id="position">
                                        <option value="SP">Starting Pitcher</option>
                                        <option value="RP">Relief Pitcher</option>
                                        <option value="P">Pitcher</option>
                                        <option value="C">Catcher</option>
                                        <option value="3B">Third Base</option>
                                        <option value="2B">Second Base</option>
                                        <option value="1B">First Base</option>
                                        <option value="SS">Short Stop</option>
                                        <option value="IF">Infield</option>
                                        <option value="LF">Left Field</option>
                                        <option value="CF">Center Field</option>
                                        <option value="RF">Right Field</option>
                                        <option value="OF">Outfield</option>
                                        <option value="DH">Designated Hitter</option>
                                    </select>
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row {{ $errors->has('bats') ? ' has-error' : '' }}">
                                <div class="col-md-4 text-right">Bats</div>
                                <div class="col-md-6">
                                    <div class="radio-inline">
                                        <label><input type="radio" name="bats" id="batsR" value="R" checked>Right</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="bats" id="batsL" value="L">Left</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="bats" id="batsS" value="S">Switch</label>
                                    </div>
                                </div>
                                @if ($errors->has('bats'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bats') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row {{ $errors->has('throws') ? ' has-error' : '' }}">
                                <div class="col-md-4 text-right">Throws</div>
                                <div class="col-md-6">
                                    <div class="radio-inline">
                                        <label><input type="radio" name="throws" id="throwsR" value="R" checked>Right</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label><input type="radio" name="throws" id="throwsR" value="L">Left</label>
                                    </div>
                                </div>
                                @if ($errors->has('throws'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('throws') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('team_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="team_id">Team</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="team_id" id="team_id">
                                        @foreach($leagues as $leagueName => $divisions)
                                            @foreach($divisions as $divisionName => $teams)
                                                <optgroup label='{{$leagueName}} - {{$divisionName}}'></optgroup>
                                                @foreach($teams as $team)
                                                    <option value={{$team->id}} {{$team->id===3?'selected':''}}>{{$team->name}}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>

                                    @if ($errors->has('team_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('team_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="first_name">Age</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}">

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="height">Height</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="height" id="height" value="{{ old('height') }}">

                                    @if ($errors->has('height'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="weight">Weight</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="weight" id="weight" value="{{ old('weight') }}">

                                    @if ($errors->has('weight'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('home') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="first_name">Home</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="home" id="home" value="{{ old('home') }}">

                                    @if ($errors->has('home'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('home') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label" for="salary">Salary</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="salary" id="salary" value="{{ old('salary') }}">

                                    @if ($errors->has('salary'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Add Player
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

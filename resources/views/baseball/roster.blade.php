@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rosters</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(!isset($team))
                                    <form class="form-horizontal">
                                        <label>Select your team:
                                            <select class="form-control" id="team_select">
                                                @foreach($teams as $t)
                                                   <option value={{$t->id}}>{{$t->city." ".$t->name}}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </form>
                                    <button class="btn-default" id="roster_btn">Get Roster!</button>
                                @else
                                    <h3>{{$team->city." ".$team->name}}</h3>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Bats</th>
                                            <th>Throws</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($team->players as $player)
                                            <tr>
                                                <td>{{$player->number}}</td>
                                                <td>{{$player->name}}</td>
                                                <td>{{$player->position}}</td>
                                                @if(Auth::guest())
                                                    <td colspan="2">Login to see more</td>
                                                @else
                                                    <td>{{$player->bats}}</td>
                                                    <td>{{$player->throws}}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/js/selectRoster.js"></script>
@endsection

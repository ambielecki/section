@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Teams</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
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
                                    @foreach($players as $player)
                                        <tr>
                                            <td>{{$player->number}}</td>
                                            <td>{{$player->name}}</td>
                                            <td>{{$player->postion}}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

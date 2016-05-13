@extends('layouts.test')

@section($block1)
    <div class="container">
        <div class="row">
            Foobar
        </div>
    </div>
@endsection

@section($block2)
    <div class="container">
        <div class="row">
            Fizzbuzz
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/js/selectRoster.js"></script>
@endsection

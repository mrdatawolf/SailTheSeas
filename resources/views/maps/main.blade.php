@php
$numberOfPlayers = 4;
$numberOfIslands = floor($numberOfPlayers*1.5);
$minIslandResource = 4;
$maxIslandResource = 8;
$minWorkers=floor($minIslandResource*1.5);
$maxWorkers=floor($maxIslandResource*1.25);
$minCannons=floor($minIslandResource*.5);
$maxCannons=floor($maxIslandResource*.75);
$minCouncils=floor($minIslandResource*.5);
$maxCouncils=floor($maxIslandResource*.75);
$basicResourceArray = [
    1 => "Wheat",
    2 => "Tree",
    3 => "Rock",
    4 => "Sugar",
    5 => "Gold",
    6 => "Tabacoo",
    7 => "Other1",
    8 => "Other2",
    9 => "Other3"
];
$numberToNameArray = [
    1 => "one",
    2 => "two",
    3 => "three",
    4 => "four",
    5 => "five",
    6 => "six",
    7 => "seven",
    8 => "eight",
    9 => "nine"
];
$numberToCountryNameArray = [
    1 => "Spain",
    2 => "England",
    3 => "France",
    4 => "Portugal",
    5 => "Dutch",
    6 => "America",
    7 => "Germany",
    8 => "Norway",
    9 => "Sweden"
];
@endphp
@extends('layout.default')

@section('header')
    <script src="{{ asset('js/main/header.js') }}"></script>
    <script src="{{ asset('js/main/primaryObjects.js') }}"></script>
    <script>
        var currentPlayer = 0;
        var currentEpoch = 0;
        var playerCount = {{$numberOfPlayers}};
        var islandCount =  {{$numberOfIslands}};
        const islands = {};
        const players = {};
        const countries = {};
        @for($x=1;$x<=9;$x++)
            islands.{{$numberToNameArray[$x]}} = new island({{$x}},"greenyellow","{{$basicResourceArray[$x]}}");
        @endfor
                @for($x=1;$x<=6;$x++)
            players.{{$numberToNameArray[$x]}}   = new player({{$x}},"filled_group_color_{{$x}}","{{$numberToCountryNameArray[$x]}}",{{$x}});
        @endfor
                @for($x=1;$x<=6;$x++)
            countries.{{$numberToNameArray[$x]}}   = new country({{$x}});
        @endfor
    </script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/maps/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/maps/islands.css') }}">
<link rel="stylesheet" href="{{ asset('css/maps/markets.css') }}">
<link rel="stylesheet" href="{{ asset('css/maps/players.css') }}">
@endsection

@section('content')
    <div class="market" id="market_1">
        <div class="title">Goods Market</div>
    </div>
    <div class="market" id="market_2">
        <div class="title">Equipment Market</div>
    </div>
    @for($islandsMade=1;$islandsMade<=$numberOfIslands;$islandsMade++)
        <div class="island" id="island_{{$islandsMade}}">
            <div class="info"> <span  id="title_island_{{$islandsMade}}">Island {{$islandsMade}}</span> <span class="goodType" id="good_island_{{$islandsMade}}">???good???</span></div>
            <div class="primary_grouping workers" id="workers_{{$islandsMade}}">
                <h5 class="grouping_title" id="workers_title_{{$islandsMade}}"> Workers</h5>
                @for($workersMade=1;$workersMade<=rand($minWorkers,$maxWorkers);$workersMade++)
                    <div class="worker" id="worker_{{$islandsMade}}_{{$workersMade}}" data-filled=0 data-island={{$islandsMade}}></div>
                @endfor
            </div>
            <div class="primary_grouping castles" id="castle_grounds_{{$islandsMade}}">
                <h5 class="grouping_title" id="cannons_title_{{$islandsMade}}"> Cannons</h5>
                @for($cannonsMade=1;$cannonsMade<=rand($minCannons,$maxCannons);$cannonsMade++)
                    <div class="cannon" id="cannon_{{$islandsMade}}_{{$cannonsMade}}" data-filled=0 data-island={{$islandsMade}}></div>
                @endfor
            </div>
            <div class="primary_grouping magistrates" id="magistrate_location_{{$islandsMade}}">
                <h5 class="grouping_title" id="councils_title_{{$islandsMade}}"> Council</h5>
                @for($councilsMade=1;$councilsMade<=rand($minCouncils,$maxCouncils);$councilsMade++)
                    <div class="council" id="council_{{$islandsMade}}_{{$councilsMade}}" data-filled=0 data-island={{$islandsMade}}></div>
                @endfor
            </div>
        </div>
    @endfor
    @for($playersMade=1;$playersMade<=$numberOfPlayers;$playersMade++)
        <div class="player_info" id="player{{$playersMade}}" data-player_number="{{$playersMade}}">
            <div class="title">Player {{$playersMade}}</div>
            <div class="home" id="country_{{$playersMade}}">
                <div class="title" id="player_{{$playersMade}}_country_name">????countryName????</div>
                <div class="victoryPool"><label for="victoryPool_Player_{{$playersMade}}">VP</label> <input type="text" id="victoryPool_Player_{{$playersMade}}" value="0"></div>
                <div class="influencePool"><label for="influencePool_Player_{{$playersMade}}">IP</label> <input type="text" id="influencePool_Player_{{$playersMade}}" value="0"></div>
                <div class="influenceAtHome"><label for="homeInfluencePool_Player_{{$playersMade}}">hIP</label> <input type="text" id="homeInfluencePool_Player_{{$playersMade}}" value="0"></div>
            </div>
            <div class="player_ship">
                <div class="ship_hold">
                    @for($holdPoint=1;$holdPoint<=12;$holdPoint++)
                        <div class="holdPoint" id="holdPoint_{{$playersMade}}"></div>
                    @endfor
                </div>
            </div>
        </div>
        <div id="current_card">
            put a card here...
        </div>
    @endfor
@endsection
@section('footer')
    <script src="{{ asset('js/main/footer.js') }}"></script>
    <script>
    //setup stuff
    @for($islandsMade=1;$islandsMade<=$numberOfIslands;$islandsMade++)
        $('#good_island_{{$islandsMade}}').text(islands.{{$numberToNameArray[$islandsMade]}}.getResource());
    @endfor
    @for($playersMade=1;$playersMade<=$numberOfPlayers;$playersMade++)
        $('#player_{{$playersMade}}_country_name').data('countryNumber',players.{{$numberToNameArray[$playersMade]}}.getCountryNumber());
        $('#player_{{$playersMade}}_country_name').text(players.{{$numberToNameArray[$playersMade]}}.getCountryName());
    @endfor
    //debug stuff
    </script>
@endsection

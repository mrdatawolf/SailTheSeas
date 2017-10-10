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
$countryNames=[
    1=>'Spain',
    2=>'England',
    3=>'France',
    4=>'Portugal',
    5=>'Dutch',
    6=>'Americans'
];
$resourceNames=[
    1=>'Flower',
    2=>'Trees',
    3=>'Rock',
    4=>'Sugar',
    5=>'Gold',
    6=>'Tabacoo',
    7=>'Other2',
    8=>'Other3',
    9=>'Other4'
];
@endphp
@extends('layout.default')

@section('header')
    <script>
        var resourceTotal = 0;
    function resourceClicked(thisThing) {
        console.log('children '+thisThing.parent().children().length);
        resourceTotal = getCurrentResourceCount(thisThing);
        updateResourceBlock(thisThing, resourceTotal);
        var newTotal = getCurrentResourceCount(thisThing);
        console.log('resourceTotal '+resourceTotal);
    }

    function getCurrentResourceCount(thisThing) {
        var parent = thisThing.parent();
        var children = thisThing.parent().children();
        total = children.filter(function(){
            return $(this).data('filled') == '1';
        }).length;

        return total;
    }

    function updateResourceBlock(thisThing, resourceTotal) {
        var parent = thisThing.parent();
        var children = thisThing.parent().children();
        children.each(function () {
            $(this).data('filled', 0);
        });
        children.first().data('filled',1).css('background-color:black');
    }

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
            <div class="info"> <span  id="title_island_{{$islandsMade}}">Island {{$islandsMade}}</span> <span class="goodType" id="good_island_{{$islandsMade}}">{{$resourceNames[$islandsMade]}}</span></div>
            <div class="primary_grouping resources" id="resources_{{$islandsMade}}">
                <div id="resources_title_{{$islandsMade}}"> Resources</div>
                @for($resourcesMade=1;$resourcesMade<=rand($minIslandResource,$maxIslandResource);$resourcesMade++)
                <div class="resource" id="resource_{{$islandsMade}}_{{$resourcesMade}} data-filled=0"></div>
                @endfor
            </div>
            <div class="primary_grouping workers" id="workers_1">
                <div class="title" id="workers_title_1"> Workers</div>
                @for($workersMade=1;$workersMade<=rand($minWorkers,$maxWorkers);$workersMade++)
                    <div class="worker" id="worker_{{$islandsMade}}_{{$workersMade}}"></div>
                @endfor
            </div>
            <div class="primary_grouping castles" id="castle_grounds_1">
                <div class="title" id="cannons_title_1"> Cannons</div>
                @for($cannonsMade=1;$cannonsMade<=rand($minCannons,$maxCannons);$cannonsMade++)
                    <div class="cannon" id="cannon_{{$islandsMade}}_{{$cannonsMade}}"></div>
                @endfor
            </div>
            <div class="primary_grouping magistrates" id="magistrate_location_1">
                <div class="title" id="councils_title_1"> Council</div>
                @for($councilsMade=1;$councilsMade<=rand($minCouncils,$maxCouncils);$councilsMade++)
                    <div class="council" id="cannon_{{$islandsMade}}_{{$councilsMade}}"></div>
                @endfor
            </div>
        </div>
    @endfor
    @for($playersMade=1;$playersMade<=$numberOfPlayers;$playersMade++)
        <div class="player_info" id="player{{$playersMade}}">
            <div class="title">Player {{$playersMade}}</div>
            <div class="home" id="country_{{$playersMade}}">
                <div class="title">{{$countryNames[$playersMade]}}</div>
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
    @endfor
@endsection
@section('footer')
    <script>
        $('.resource').click(function() {
            resourceClicked($(this));
        });



    </script>
@endsection

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

@endphp
@extends('layout.default')

@section('header')
    <script>
    /**
     * @param number
     * @param cssClass
     * @param country
     */
    function player(number,cssClass,country)
    {
        this.number=number;
        this.cssClass=cssClass;
        this.originCountry=country;

        this.getNumber = function() {
            return this.number;
        };
        this.getCssClass = function() {
            return this.cssClass;
        };
        this.getCountry = function() {
            return this.originCountry;
        };
    }

    /**
     * @param number
     * @param color
     * @param resource
     */
    function island(number,color,resource)
    {
        this.number=number;
        this.color=color;
        this.resource=resource;
        this.playerWorkers={1 : 0, 2 : 0, 3 : 0, 4 : 0, 5 : 0, 6 : 0};
        this.playerShipsInPort={1 : false, 2 : false, 3 : false, 4 : false, 5 : false, 6 : false};
        this.getNumber = function() {
            return this.number;
        };
        this.getColor = function() {
            return this.color;
        };
    }

    /**
     * @param number
     * @param color
     * @param name
     */
    function country(number,name)
    {
        this.number=number;
        this.name=name;
        this.playerShipInPort = false;

        this.getNumber = function() {
            return this.number;
        };
        this.getName = function() {
            return this.name;
        };
    }

    var currentPlayer = 0;
    const islands = {};
    const players = {};
    const countries = {};
    islands.one = island(1,"greenyellow","Wheat");
    islands.two = island(2,"greenyellow","Tree");
    islands.three = island(3,"greenyellow","Rock");
    islands.four = island(4,"greenyellow","Sugar");
    islands.five = island(5,"greenyellow","Gold");
    islands.six = island(6,"greenyellow","Tabacoo");
    islands.seven = island(7,"greenyellow","Other1");
    islands.eight = island(8,"greenyellow","Other2");
    islands.nine = island(9,"greenyellow","Other3");
    players.one   = player(1,"filled_group_color_1",1);
    players.two   = player(2,"filled_group_color_2",2);
    players.three = player(3,"filled_group_color_3",3);
    players.four  = player(4,"filled_group_color_4",4);
    players.five  = player(5,"filled_group_color_5",5);
    players.six   = player(6,"filled_group_color_6",6);
    countries.one = country(1,'Spain');
    countries.two = country(2,'England');
    countries.three = country(3,'France');
    countries.four = country(4,'Portugal');
    countries.five = country(5,'Dutch');
    countries.six = country(6,'America');

    function workerClicked(thisThing) {
        var parent = thisThing.parent();
        var children = thisThing.parent().children('div');
        var islandNumber=thisThing.data('island');
        workerTotal = getCurrentItemCount(children);
        updateGroupBlock(thisThing,children, workerTotal);
        workerTotal = getCurrentItemCount(children);
    }

    function cannonClicked(thisThing) {
        var parent = thisThing.parent();
        var children = thisThing.parent().children('div');
        var islandNumber=thisThing.data('island');
        cannonTotal = getCurrentItemCount(children);
        updateGroupBlock(thisThing,children, cannonTotal);
        cannonTotal = getCurrentItemCount(children);
    }

    function magistrateClicked(thisThing) {
        var parent = thisThing.parent();
        var children = thisThing.parent().children('div');
        var islandNumber=thisThing.data('island');
        magistrateTotal = getCurrentItemCount(children);
        updateGroupBlock(thisThing,children, magistrateTotal);
        magistrateTotal = getCurrentItemCount(children);
    }

    function getCurrentItemCount(children) {

        var total = children.filter(function(){
            return $(this).data('filled') === 1;
        }).length;

        return total;
    }

    function updateGroupBlock(thisThing, children, groupTotal) {
        var alterBy=0;
        alterBy=(thisThing.data('filled') === 0) ? 1 : -1;
        var islandNumber=thisThing.data('island');
        var runningTotal = 0;
        //resourcesOnIsland+islandNumber+ForPlayer+player += alterBy;
        children.each(function () {
            $(this).data('filled', 0).removeClass('filled_group_item').removeClass([
                'filled_group_color_1',
                'filled_group_color_2',
                'filled_group_color_3',
                'filled_group_color_4',
                'filled_group_color_5',
                'filled_group_color_6'
            ]);
        });
        children.each(function () {
            //todo: we need to find out how many of each these resources each player had.  this tells us how many of each color to populate.
            //todo: we also need to see which color the resource currently is.  We can use this for the resource to remove if we are removing them.
            /*if(runningTotal < (groupTotal+alterBy)) {
                $(this).data('filled', 1).removeClass('empty_group_item').addClass('filled_group_color_'+currentPlayer);
                runningTotal++;
            }*/
        });

        return runningTotal;
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
                <div class="title">????countryName????</div>
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
        <div id="debug_box">
            currentPlayer <span id="currentPlayerNumber">0</span>
        </div>
    @endfor
@endsection
@section('footer')
    <script>
        //debug stuff

        //island ui
        $('.worker').click(function() {
            workerClicked($(this));
        });

        $('.cannon').click(function() {
            cannonClicked($(this));
        });

        $('.council').click(function() {
            magistrateClicked($(this));
        });

        //player ui
        $('.player_info').click(function() {
            currentPlayer=$(this).data('player_number');
            $("#currentPlayerNumber").text(currentPlayer).change();
        });

    </script>
@endsection

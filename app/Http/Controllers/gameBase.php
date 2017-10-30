<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gameBase extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function mainMap()
    {
        $numberOfPlayers = 4;
        $minIslandResource = $numberOfPlayers;
        $maxIslandResource = $numberOfPlayers*2;
        $playersInfo = json_decode(json_encode([
            'numberOfPlayers' => $numberOfPlayers,
            'firstPlayer' => rand(1,$numberOfPlayers),
            'numberOfIslands' => floor($numberOfPlayers*1.5)
        ]), FALSE);
        $islandsInfo = json_decode(json_encode([
            'minIslandResource' => $minIslandResource,
            'maxIslandResource' => $maxIslandResource
        ]), false);
    
        $resourcesInfo = json_decode(json_encode([
            'minWorkers'=>floor($minIslandResource*1.5),
            'maxWorkers'=>floor($maxIslandResource*1.25),
            'minCannons'=>floor($minIslandResource*.5),
            'maxCannons'=>floor($maxIslandResource*.75),
            'minCouncils'=>floor($minIslandResource*.5),
            'maxCouncils'=>floor($maxIslandResource*.75),
            'resouceNames'=> [
                1 => "Wheat",
                2 => "Tree",
                3 => "Rock",
                4 => "Sugar",
                5 => "Gold",
                6 => "Tabacoo",
                7 => "Other1",
                8 => "Other2",
                9 => "Other3"
            ],
            'numberToNameArray' => [
                1 => "one",
                2 => "two",
                3 => "three",
                4 => "four",
                5 => "five",
                6 => "six",
                7 => "seven",
                8 => "eight",
                9 => "nine"
            ]
        ]), false);
        $countriesInfo = json_decode(json_encode([
            'numberToCountryNameArray' => [
                1 => "Spain",
                2 => "England",
                3 => "France",
                4 => "Portugal",
                5 => "Dutch",
                6 => "America",
                7 => "Germany",
                8 => "Norway",
                9 => "Sweden"
            ],
            'numberToNameArray' => [
                1 => "one",
                2 => "two",
                3 => "three",
                4 => "four",
                5 => "five",
                6 => "six",
                7 => "seven",
                8 => "eight",
                9 => "nine"
            ]
        ]),false);
    
        return $this->setContent('maps.main',compact('playersInfo','islandsInfo','resourcesInfo','countriesInfo'));
    }
}

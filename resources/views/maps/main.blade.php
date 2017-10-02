<!doctype html>
<html>
<head>
    <title>
        Main Map Page
    </title>
    <style>
        .island {
            width: 17em;
            height: 10em;
            border: 1px solid black;
            border-radius: 1em;
        }
        #island_1 {
            position: absolute;
            top: 3em;
            left: 5em;
        }
        .resource, .worker, .council, .cannon {
            width: .5em;
            height: .5em;
            margin: .1em;
            border: 1px solid black;
            border-radius: .2em;
            float:left;
        }
        .primary_grouping{
            border: 1px solid blueviolet;
            width: 5em;
            height: 2.5em;
            padding: .5em;
        }
        .resources{
            position: absolute;
            top: 1em;
            left: 1em;
        }
        .workers {
            position: absolute;
            top: 1em;
            right: 1em;
        }
        .castles {
            position: absolute;
            bottom: 1em;
            right: 1em;
        }
        .magistrates {
            position: absolute;
            bottom: 1em;
            left: 1em;
        }
        .title {
            padding: 0 0 0 1em;
        }

    </style>
</head>
<body>
<div class="island" id="island_1">
    <div class="title" id="title_island_1"> Island 1</div>
    <div class="primary_grouping resources" id="resources_1">
        <div id="resources_title_1"> Resources</div>
        <div class="resource" id="resource_1_1"></div>
        <div class="resource" id="resource_1_2"></div>
        <div class="resource" id="resource_1_3"></div>
        <div class="resource" id="resource_1_4"></div>
        <div class="resource" id="resource_1_5"></div>
        <div class="resource" id="resource_1_6"></div>
    </div>
    <div class="primary_grouping workers" id="workers_1">
        <div class="title" id="workers_title_1"> Workers</div>
        <div class="worker" id="worker_1_1"></div>
        <div class="worker" id="worker_1_2"></div>
        <div class="worker" id="worker_1_3"></div>
        <div class="worker" id="worker_1_4"></div>
        <div class="worker" id="worker_1_5"></div>
        <div class="worker" id="worker_1_6"></div>
        <div class="worker" id="worker_1_7"></div>
        <div class="worker" id="worker_1_8"></div>
    </div>
    <div class="primary_grouping castles" id="castle_grounds_1">
        <div class="title" id="cannons_title_1"> Cannons</div>
        <div class="cannon" id="cannon_1_1"></div>
        <div class="cannon" id="cannon_1_2"></div>
        <div class="cannon" id="cannon_1_3"></div>
        <div class="cannon" id="cannon_1_4"></div>
    </div>
    <div class="primary_grouping magistrates" id="magistrate_location_1">
        <div class="title" id="councils_title_1"> Council</div>
        <div class="council" id="council_1_1"></div>
        <div class="council" id="council_1_2"></div>
        <div class="council" id="council_1_3"></div>
        <div class="council" id="council_1_4"></div>
    </div>
</div>
</body>
</html>
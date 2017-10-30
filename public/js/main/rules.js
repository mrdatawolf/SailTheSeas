function doTurn() {
    turnStart();
    movePhase();
    influncePhase();
    supplyPhase();
    attackPhase();
    checkEpoch();
}

function turnStart() {
    colorCurrentPlayer();
    if(currentEpoch === 0) {
        gameSetup();
        assignActivePlayer(firstPlayer);
    }
    else if(currentEpoch <= 2) {
        drawEventCard();
    }
    else{
        endGame();
    }
}

function gameSetup(){
    /*
    //todo: give each player influnce as # of players +1.
    //todo: random who goes first.
    //todo: assign player colors.
    //todo: assign player nations.
    //todo: setup the equipment market.
    //todo: setup the goods market.
    */
}

function assignActivePlayer(playerNumber) {
    console.log(playerNumber+'is now the first player');
}
function colorCurrentPlayer() {

}

function checkEpoch() {
    /*
    1. game ends when 10 or more total points have been drawn from the deck.  The player who drew the final card completes their turn and the points are scored.
    */
    if (currentEpoch===3) {
        checkForVistory();
    }
    else if(currentEpoch===2 && epochPoints===5) {
        moveToThirdEpoch();
    }
}

function moveToThirdEpoch() {
    //
}

function endGame() {
    vistoryEpoch();
}

function vistoryEpoch() {
    //do stuff
}

function movePhase() {
    MovePlayerShip();
}

function influncePhase() {
    //todo: a. You may take 1 action per home influnce marker you have.
    //todo: a. Move a market one spot up or down.
    playerPickInfluncePoint();
}
function homeCountryPhase() {
    //todo: if ship is at home port
        // Get a worker.
    loadWorkersFromHomeport();
        // Get a cannon.
    loadCannonsFromHomeport();
        // Once per turn as a free action you may get money from the lender.
    barrowFromMoneyLender();

}

function supplyPhase() {

    // a. Harvest goods - You harvest a base amount of 1 plus 1 per worker aligned to the ship captain on the island.0
    harvestFromIsland();
    // b. Sell goods - You sell a base amount of 1 plus 1 per influence aligned to the ship captain on the country.
    sellGoodsAtHomePort();
    // c. unload workers or cannons from ship to island
    offloadCargoToIsland();
}

function sellGoodsAtHomePort() {
    //do stuff
}

function barrowFromMoneyLender() {
    // do stuff
}

function harvestFromIsland() {
    /*
    1. a governor may block a ship from harvesting.
    2. A fort cammander can allow or block as many workers from harvesting as the fort has cannons.
    3. A ship can always move 1 good from the island no mater irregardless of any other players actions. No workers are required on the island for this 1.
     */
    loadCargoFromIslandToShip();
}

function loadCargoFromIslandToShip() {
    //
}
function MovePlayerShip() {
    drawEventCard();
}
function playerPickInfluncePoint() {
    applyInfluenceToken();
}

function offloadCargoToIsland() {
    applyWorkerToMagistrate();
    applyCannonToFort();
}

function attackPhase() {
    focusAttack();
    attack();
}

function attack() {
    applyAttack();
    //todo: apply attack by player to choosen thing
    attackIslandGovernor();
    attackFortCommander();
    attackPlayerShip();
}

function loadWorkersFromHomeport() {
    //todo: load workers from homeport.
}

function loadCannonsFromHomeport() {
    //todo: load cannons from homeport
}

function drawEventCard() {
    showEventCard();
    applyEventCard();
}

function focusAttack() {
    //todo: show player proper attack options.
    //todo: apply player choice.
}

function attackIslandGovernor() {
    /*
    2. Removing the magistrates.
1. The base numbers are the total ship cannons minus the total cannons in the fort.
2. Now the controller of the fort applies the total cannons in the fort to either side they choose.
3. Ties goto the ship commander.
     */
    //todo: allow player to request aid from local ship captains.
    //todo: allow governor to request aid from local ship captains.
    //todo: allow fort commander to apply cannons to either side (or none).
}

function attackFortCommander() {
    /*
    Removing a fort commander.
1. The base numbers are the total ship cannons minus the total magistrates not directly aligned to the ship captain.
2. Now the current governor of the island applies the total magistrates in the Council to either side they choose.
3. Ties goto the fort commander.
     */
    //todo: allow player to request aid from local ship captains.
    //todo: allow commander to request aid from local ship captains.
    //todo: allow governor to apply workers to either side (or none).
}
function attackPlayerShip() {
    //todo: allow player to request aid from local ship captains.
    //todo: allow attacked ship captain to request aid from local ship captains.
}

function showEventCard() {
    //todo: show a card.
}

function applyEventCard() {
    //todo: apply the card.
}

function applyInfluenceToken() {
    //todo: add one influence to the location of the ship
}

function applyWorkerToMagistrate() {
    //todo: offload worker from ship.
    //todo: add worker of player color to island workers
}

function applyCannonToFort() {
    //todo: remove canon from ship
    //todo: load cannon into fort
}

function checkForVistory() {
    /*
     Victory Points
1. During the game
a. 1vp for each good type beyond the first sold as a block.
    b. 1vp at the end of each turn for each governor you have on islands.
    c. 1vp at the end of each turn for each fort commander who's island does not have a Governor.
d. Each successful removal of a fort commander or governor earns 1vp.
    e. As a free action you can convert 3 gold into 1 vp.
2. End of game bonus VP.
    a. Goods on the ship at the end of the game scorecument market value.

     */
}

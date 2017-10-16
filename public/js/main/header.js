/**
 * @param number
 * @param cssClass
 * @param country
 */
function player(number,cssClass,countryName,countryNumber)
{
    this.number=number;
    this.cssClass=cssClass;
    this.originCountryName=countryName;
    this.originCountryNumber=countryNumber;

    this.getNumber = function() {
        return this.number;
    };
    this.getCssClass = function() {
        return this.cssClass;
    };
    this.getCountryNumber = function() {
        return this.originCountryNumber;
    };
    this.getCountryName = function() {
        return this.originCountryName;
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
    this.getResource = function() {
        return this.resource;
    };
}

/**
 * @param number
 * @param color
 * @param name
 */
function country(number)
{
    this.number=number;
    this.name=name;
    this.playerShipInPort = false;

    this.getNumber = function() {
        return this.number;
    };
}




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
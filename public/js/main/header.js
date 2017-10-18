/**
 * @param thisThing
 */
function workerClicked(thisThing) {
    var parent = thisThing.parent();
    var children = thisThing.parent().children('div');
    var islandNumber=thisThing.data('island');
    workerTotal = getCurrentItemCount(children);
    updateGroupBlock(thisThing,children, workerTotal);
    workerTotal = getCurrentItemCount(children);
}

/**
 * @param thisThing
 */
function cannonClicked(thisThing) {
    var parent = thisThing.parent();
    var children = thisThing.parent().children('div');
    var islandNumber=thisThing.data('island');
    cannonTotal = getCurrentItemCount(children);
    updateGroupBlock(thisThing,children, cannonTotal);
    cannonTotal = getCurrentItemCount(children);
}

/**
 * @param thisThing
 */
function magistrateClicked(thisThing) {
    var parent = thisThing.parent();
    var children = thisThing.parent().children('div');
    var islandNumber=thisThing.data('island');
    magistrateTotal = getCurrentItemCount(children);
    updateGroupBlock(thisThing,children, magistrateTotal);
    magistrateTotal = getCurrentItemCount(children);
}

/**
 * @param children
 */
function getCurrentItemCount(children) {

    return children.filter(function(){
        return $(this).data('filled') === 1;
    }).length;
}

/**
 *
 * @param thisThing
 * @param children
 * @param groupTotal
 * @returns {number}
 */
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
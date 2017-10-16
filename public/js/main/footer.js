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

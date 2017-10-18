/**
 * @param number
 * @param cssClass
 * @param countryName
 * @param countryNumber
 */
function player(number,cssClass,countryName,countryNumber)
{
    this.number=number;
    this.cssClass=cssClass;
    this.originCountryName=countryName;
    this.originCountryNumber=countryNumber;
    this.InfluencePool = 0;

    this.getInfluence = function () {

        return this.InfluencePool;
    };
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

    this.setInfluence = function (amount) {
        this.InfluencePool=amount;

        return this.InfluencePool;
    };
    this.setNumber = function(amount) {
        this.number=amount;

        return this.number;
    };
    this.setCssClass = function(aString) {
        this.cssClass=aString;

        return aString;
    };
    this.setCountryNumber = function(aInt) {
        this.originCountryNumber=aInt;

        return aInt;
    };
    this.setCountryName = function(aString) {
        this.originCountryName=aString;

        return aString;
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

function deck() {
    //what makes a deck?
    this.cards = {};
}

function card() {
    this.image = '';
    this.flavorText = '';
    this.epochPointValue = 0;
    this.action = {};
}
const settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://covid-19-data.p.rapidapi.com/country/code?code=hr",
    "method": "GET",
    "headers": {
        "x-rapidapi-host": "covid-19-data.p.rapidapi.com",
        "x-rapidapi-key": "27da5ac996msh4c502d9fac8a85dp17d7f0jsn91ae6acdb2e4"
    }
};

$.ajax(settings).done(function (response) {
    console.log(response);

    var country = response[0].country;
    var confirmed = response[0].confirmed;
    var critical = response[0].critical;
    var deaths = response[0].deaths;
    var lastUpdate = response[0].lastUpdate;
    var recovered = response[0].recovered;

    $(".country").append(country);
    $(".confirmed").append(confirmed);
    $(".critical").append(critical);
    $(".deaths").append(deaths);
    $(".lastUpdate").append(lastUpdate);
    $(".recovered").append(recovered);

});
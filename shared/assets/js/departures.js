const apiUrl = "https://v6.db.transport.rest/";

const geoUrl = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=";
document.getElementById('getLocation').addEventListener('click', function () {
    getCurrentLocation();
});

function setManualAddress() {
    var address = document.getElementById('manualAddress').value
    getAddressGeo(address, getNearbyStations);
}


document.getElementById('getAddress').addEventListener('click', function () {
    setManualAddress();
});


function getCurrentLocation() {
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
    };

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getNearbyStations, error, options);
    } else {
        foliError("Geolocation is not supported by this browser or you haven't given permissions for your location.");
    }

}


function getAddressGeo(address, callback) {
    var call = {
        "url": geoUrl + address,
        "method": "GET",
        "timeout": 0,
        "dataType": "json"
    };

    $.ajax(call).done(function (response) {
        if (!response || (Array.isArray(response) && response.length === 0)) {
            foliWarn("No Address found for your Query.");
            return;
        }


        const manualCoords = {
            latitude: response[0]['lat'],
            longitude: response[0]['lon']
        };

        const manualGeolocation = {
            coords: manualCoords
        }

        callback(manualGeolocation);
    });
}

function error(err) {
    //This will always trigger on localhost development, because it's not SSL see https://stackoverflow.com/questions/39366758/geolocation-without-ssl-connection for local development without SSL/HTTPS
    foliError(`ERROR(${err.code}): ${err.message}`);
}

function getNearbyStations(position) {

    if (document.getElementById('div_station')) {
        document.getElementById('div_station').remove();
    }

    let stationsDiv = document.createElement('div');
    stationsDiv.setAttribute("id", "div_station");
    let lat = position.coords.latitude;
    let lon = position.coords.longitude;

    let call = {
        "url": apiUrl + "locations/nearby?latitude=" + lat + "&longitude=" + lon + "&distance=1500&linesOfStops=true",
        "method": "GET",
        "timeout": 0,
        "dataType": "json"
    };

    $.ajax(call).done(function (response) {
        if (!response || (Array.isArray(response) && response.length === 0)) {
            foliWarn("No Stations found nearby.");
            return;
        }

        let htmlString = `
                    <table class="table table-striped">
                        <tr>
                            <th>Station</th>
                            <th>Available Lines</th>
                            <th></th>
                        </tr>`;

        for (const element of response) {
            let id = element['id'];
            let name = element['name'];
            let availableLinesStr = '<span class="badge bg-secondary">' + name + "</span> ";

            htmlString += `
                        <tr>
                            <td>` + name + `</td>
                            <td>` + availableLinesStr + `</td>
                            <td><button id="btnId_` + id + `" type="button" class="btn btn-primary" onclick="getCurrentDepartures(` + id + `)"><i id="expand_` + id + `" class="fa-solid fa-chevron-down"></i></button></td>
                        </tr>
                        <tr id="stationRow_` + id + `">
                        <tr>
                `;
        }

        htmlString += `
                    </table>`;

        document.getElementById('availableStations').appendChild(stationsDiv);
        stationsDiv.innerHTML = htmlString;
    });
}

function getCurrentDepartures(stationId) {

    if (document.getElementById('expand_' + stationId).classList.contains("fa-chevron-up")) {
        //collapse Table
        document.getElementById('table_' + stationId).remove();
        document.getElementById('td_' + stationId).remove();
        document.getElementById('expand_' + stationId).classList.remove("fa-chevron-up");
        document.getElementById('expand_' + stationId).classList.add("fa-chevron-down");
        return;
    }


    let stationsDepDiv = document.createElement('td');
    stationsDepDiv.setAttribute("id", "td_" + stationId);
    stationsDepDiv.colSpan = 3;

    let htmlString = `
                    <table class="table table-striped" id="table_` + stationId + `">
                        <tr>
                            <th>Line</th>
                            <th>Planned</th>
                            <th>Delay</th>
                            <th>Actual</th>
                            <th></th>
                        </tr>`;

    let call = {
        "url": apiUrl + "stops/" + stationId + "/departures?results=15&duration=60&remarks=true",
        "method": "GET",
        "timeout": 0,
        "dataType": "json"
    };

    $.ajax(call).done(function (response) {
        if (!response || !response.departures || (Array.isArray(response.departures) && response.departures.length === 0)) {
            foliWarn("No Departures found for this station.");
            return;
        }


        document.getElementById('expand_' + stationId).classList.remove("fa-chevron-down");
        document.getElementById('expand_' + stationId).classList.add("fa-chevron-up");
        for (const element of response.departures) {
            let id = element['tripId'];
            let line = element['line']['name'];
            let direction = element['direction'];
            let timePlanned = element['plannedWhen'];
            let actual = element['when'];
            let delay = element['delay'] / 60;
            let type = element['line']['productName'];

            if (delay == null) {
                delay = 0;
            }


            let color = "green";
            let tertiaryColor = "black";
            if (delay >= 5) {
                color = tertiaryColor = "red";

            }
            htmlString += `
                        <tr>
                            <td>
                                <span class="badge bg-primary">` + type + `</span> <span class="badge bg-secondary">` + line + `</span> <i class="fa-solid fa-arrow-right"></i> ` + direction + `
                            </td>
                            <td>` + formatDate(timePlanned) + `</td>
                            <td>
                                <i style="color:` + color + ` ">+` + delay + `min</i>
                            </td>
                            <td><b style="color:` + tertiaryColor + ` ">` + formatDate(actual) + `</b></td>
                            <td>
                                <button id="btntrip_` + id + `" type="button" class="btn btn-secondary" onclick="getTrip('` + id + `',` + stationId + ` )"><i id="trip` + id + `" class="fa-solid fa-chevron-down"></i></button>
                            </td>
                        </tr>
                        <tr id="rowTrip_` + id + `">
                        <tr>
                `;
        }

        htmlString += `
                    </table>`;


        document.getElementById('stationRow_' + stationId).appendChild(stationsDepDiv);
        stationsDepDiv.innerHTML = htmlString;
    });
}


function formatDate(datetimeString) {
    const options = { hour: '2-digit', minute: '2-digit' };
    const newDate = new Date(datetimeString).toLocaleString('de-DE', options);
    return newDate;
}


function getTrip(tripId, stationId) {

    if (document.getElementById('trip' + tripId).classList.contains("fa-chevron-up")) {
        //collapse Table
        document.getElementById('tableTrip_' + tripId).remove();
        document.getElementById('td_' + tripId).remove();
        document.getElementById('trip' + tripId).classList.remove("fa-chevron-up");
        document.getElementById('trip' + tripId).classList.add("fa-chevron-down");
        return;
    }

    let call = {
        "url": apiUrl + "trips/" + encodeURIComponent(tripId),
        "method": "GET",
        "timeout": 0,
        "dataType": "json"
    };

    $.ajax(call).done(function (response) {
        if (!response || !response.trip || !response.trip.stopovers || (Array.isArray(response.trip.stopovers) && response.trip.stopovers.length === 0)) {
            foliWarn("No Information found for this trip.");
            return;
        }

        document.getElementById('trip' + tripId).classList.remove("fa-chevron-down");
        document.getElementById('trip' + tripId).classList.add("fa-chevron-up");

        let stops = response.trip['stopovers'];
        let tripRow = document.getElementById("rowTrip_" + tripId);

        let tripDiv = document.createElement('td');
        tripDiv.setAttribute("id", "td_" + tripId);
        tripDiv.colSpan = 5;

        htmlString = `
                    <table class="table table-striped table-bordered" id="tableTrip_` + tripId + `">
                        <tr>
                            <th colspan="4">Stops</th>
                        </tr>`;


        for (const element of stops) {
            let stopId = element['stop']['id'];
            let stopName = element['stop']['name'];
            let departure = element['departure'];
            let plannedDeparture = element['plannedDeparture'];
            let delay = element['departureDelay'] / 60;

            if (departure == null) {
                departure = element['arrival'];
            }

            if (plannedDeparture == null) {
                plannedDeparture = element['plannedArrival'];
            }

            let color = "black";
            let icon = "fa-solid fa-ellipsis-vertical";


            if (delay == null) {
                delay = 0;
            }

            let delayColor = "green";
            let tertiaryColor = "black";
            if (delay >= 5) {
                delayColor = tertiaryColor = "red";

            }

            let now = getCurrentTimestamp();
            if (now > departure) {
                color = "#676f77"
            }

            if (stationId == stopId) {
                color = "#0c68f0";
                icon = "fa-solid fa-location-dot";
            }

            htmlString += `
                        <tr id="entry_` + tripId + `">
                            <td>
                                <span style="color:` + color + `" >
                                    <i class="fa-solid ` + icon + `"></i>
                                    ` + stopName + `
                                </span>
                            </td>
                            <td>
                            <span style="color:` + color + `" >
                                ` + formatDate(plannedDeparture) + `
                            </span>
                            </td>
                            <td>
                                <i style="color:` + delayColor + ` ">+` + delay + `min</i>
                            </td>
                            <td>
                                <span>
                                    <b style="color:` + tertiaryColor + ` ">` + formatDate(departure) + `</b>
                                </span>
                            </td>
                        </tr>
                `;
        }

        htmlString += `
                    </table>`;


        tripRow.appendChild(tripDiv);
        tripDiv.innerHTML = htmlString;

    });
}



function getCurrentTimestamp() {
    const now = new Date();
    const year = now.getFullYear();
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timezoneOffset = -now.getTimezoneOffset() / 60; // Timezone offset in hours

    const timestamp = `${year}-${month}-${day}T${hours}:${minutes}:${seconds}+${timezoneOffset >= 0 ? '+' : '-'}${Math.abs(timezoneOffset).toString().padStart(2, '0')}:00`;

    return timestamp;
}

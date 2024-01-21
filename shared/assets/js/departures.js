const apiUrl = "https://v6.db.transport.rest/";

const geoUrl = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=";
    document.getElementById('getLocation').addEventListener('click', function() {
        getCurrentLocation();
    });


    document.getElementById('getAddress').addEventListener('click', function() {
        var address = document.getElementById('manualAddress').value

        getAddressGeo(address, getNearbyStations);
    });


    function getCurrentLocation() {
        const options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0,
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getNearbyStations, error,options);
        } else { 
            foliError("Geolocation is not supported by this browser or you haven't given permissions for your location."); 
        }
        
    }


    function getAddressGeo(address, callback){
        var call = {
            "url": geoUrl + address,
            "method": "GET",
            "timeout": 0,
          };
          
          $.ajax(call).done(function (response) {
            if(response.length == 0){
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

        var stationsDiv = document.createElement('div');
        lat = position.coords.latitude;
        lon = position.coords.longitude;

        var call = {
            "url": apiUrl + "locations/nearby?latitude="+lat+"&longitude="+lon+"&distance=1500&linesOfStops=true",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(call).done(function (response) {

            if(response.length == 0){
                foliWarn("No Stations found nearby."); 
                return;
            }
            
            document.getElementById("getLocation").disabled = true;
            document.getElementById("getAddress").disabled = true;
            document.getElementById("manualAddress").disabled = true;
        
            htmlString = `
                    <table class="table table-striped">
                        <tr>
                            <th>Station</th>
                            <th>Available Lines</th>
                            <th></th>
                        </tr>`;

            for (let i = 0; i < response.length; i++) {
                var name = response[i]['name'];

                var availableLinesArr = response[i]['lines'];
                var availableLinesStr = "";

                for (let j = 0; j < availableLinesArr.length; j++) {
                    var availableLine = availableLinesArr[j]['name'];
                    availableLinesStr += '<span class="badge bg-secondary">' + availableLine + "</span> ";
                }


                var availableProducts = response[i]['products'];


                htmlString += `
                        <tr>
                            <td>` + name + `</td>
                            <td>` + availableLinesStr + `</td>
                            <td><button id="btnId_` + response[i]['id'] + `" type="button" class="btn btn-primary" onclick="getCurrentDepartures(` + response[i]['id'] + `)">Get Current Departues</button></td>
                        </tr>
                        <tr id="stationRow_` + response[i]['id'] + `">
                        <tr>
                `;
            }
            
            htmlString += `
                    </table>`;

            document.getElementById('availableStations').appendChild(stationsDiv);
            stationsDiv.innerHTML = htmlString;
        });
    }

    function getCurrentDepartures(stationId){
        var stationsDepDiv = document.createElement('td');
        stationsDepDiv.colSpan = 3;

        htmlString = `
                    <table class="table table-striped">
                        <tr>
                            <th>Line</th>
                            <th>Planned</th>
                            <th>Delay</th>
                            <th>Actual</th>
                        </tr>`;

        var call = {
            "url": apiUrl + "stops/"+stationId+"/departures?results=15&duration=60&remarks=true",
            "method": "GET",
            "timeout": 0,
            };

        $.ajax(call).done(function (response) {
            response = response['departures'];

            if(response.length == 0){
                foliWarn("No Departues found for this station."); 
                return;
            }
            
            document.getElementById("btnId_"+stationId).disabled = true;
            for (let i = 0; i < response.length; i++) {
                var line = response[i]['line']['name'];
                var direction = response[i]['direction'];
                var timePlanned = response[i]['plannedWhen'];
                var actual = response[i]['when'];
                var delay = response[i]['delay']/60;
                var type = response[i]['line']['productName'];
                if(delay == null){
                    delay = 0;
                }

                htmlString += `
                        <tr>
                            <td>
                                <span class="badge bg-primary">` + type + `</span> <span class="badge bg-secondary">` + line + `</span> <i class="fa-solid fa-arrow-right"></i> ` + direction + `
                            </td>
                            <td>` + formatDate(timePlanned) + `</td>
                            <td>
                                +` + delay + `min
                            </td>
                            <td><b>` + formatDate(actual) + `</b></td>
                        </tr>
                `;
            }

            htmlString += `
                    </table>`;


            document.getElementById('stationRow_'+stationId).appendChild(stationsDepDiv);
            stationsDepDiv.innerHTML = htmlString;
        });
    }


    function formatDate(datetimeString) {
        const options = {hour: '2-digit', minute: '2-digit'};
        const newDate = new Date(datetimeString).toLocaleString('de-DE', options);
        return newDate;
    }
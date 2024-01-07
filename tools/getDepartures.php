<form id="departuresForm">
    <div class="input-group">
        <button type="button" class="btn btn-primary" id="getLocation"><i class="fa-solid fa-location-crosshairs"></i> Get Location</button>
    </div>
</form>

<div id="availableStations">
</div>

<div>This is using https://v6.db.transport.rest/api.html</div>


<script>

    const apiUrl = "https://v6.db.transport.rest/";
    document.getElementById('getLocation').addEventListener('click', function() {
        getNearbyStations();
    });


    /*
        https://stackoverflow.com/questions/39366758/geolocation-without-ssl-connection for local development without SSL/HTTPS
    */
    function getNearbyStations() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            alert("Geolocation is not supported by this browser or you haven't given permissions for your location.");
        }
        
    }


    function showPosition(position) {

        var stationsDiv = document.createElement('div');
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        //use those Positions for Debuggig purposes
        // lat = 49.474498102; 
        // lon = 8.468498126;
        console.log(lat, lon);

        var call = {
            "url": apiUrl + "locations/nearby?latitude="+lat+"&longitude="+lon+"&distance=1500&linesOfStops=true",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(call).done(function (response) {
            console.log(response);
            if(response.length != 0){
                document.getElementById("getLocation").disabled = true;
            
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
                        console.log(availableLine);
                        availableLinesStr += '<span>[' + availableLine + "]</span>";
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
            }
            else{
                alert("No Stations found nearby.");
            }    
        });
    }

    function getCurrentDepartures(stationId){
        console.log(stationId);
        var stationsDepDiv = document.createElement('td');
        stationsDepDiv.colSpan = 3;

        htmlString = `
                    <table class="table table-striped">
                        <tr>
                            <th>Line</th>
                            <th>Time</th>
                            <th>Delay</th>
                        </tr>`;

        var call = {
            "url": apiUrl + "stops/"+stationId+"/departures?results=15&duration=60&remarks=true",
            "method": "GET",
            "timeout": 0,
            };

        $.ajax(call).done(function (response) {
            console.log(response);
            response = response['departures'];
            if(response.length != 0){
                document.getElementById("btnId_"+stationId).disabled = true;
                for (let i = 0; i < response.length; i++) {
                    var line = response[i]['line']['name'];
                    var direction = response[i]['direction'];
                    var timePlanned = response[i]['plannedWhen'];
                    var delay = response[i]['delay'];
                    if(delay == null){
                        delay = 0;
                    }
                    var timeDelayed = response[i]['when'];

                    console.log(response[i]);


                    htmlString += `
                            <tr>
                                <td>` + line + ` to ` + direction + `</td>
                                <td>` + formatDate(timePlanned) + `</td>
                                <td>+` + delay + `min</td>
                            </tr>
                    `;

                }

            htmlString += `
                    </table>`;


            document.getElementById('stationRow_'+stationId).appendChild(stationsDepDiv);
            stationsDepDiv.innerHTML = htmlString;
        }
        else{
            alert("No Departues found for this station.");
        }

        });

        
    }


    function formatDate(datetimeString) {
        const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit'};
        const newDate = new Date(datetimeString).toLocaleString('de-DE', options);
        return newDate;
    }



</script>
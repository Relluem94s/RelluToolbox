<form id="departuresForm">
    <div class="input-group">
        <button type="button" class="btn btn-primary" id="getLocation"><i class="fa-solid fa-location-crosshairs"></i> Get Location</button>
    </div>
</form>

<div id="availableStations">
</div>

<div>This is using https://v6.db.transport.rest/api.html</div>


<script>
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
            alert("Geolocation is not supported by this browser.");
        }
        
    }


    function showPosition(position) {

        var stationsDiv = document.createElement('div');
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        console.log(lat, lon);

        var call = {
            "url": "https://v6.db.transport.rest/locations/nearby?latitude=49.5845376&longitude=8.3591168&distance=500&linesOfStops=true",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(call).done(function (response) {
            console.log(response);

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


            
        });
    }

    function getCurrentDepartures(stationId){
        console.log(stationId);
        var stationsDepDiv = document.createElement('div');

        htmlString = `<br>
                    <table class="table table-striped">
                        <tr>
                            <th>Line</th>
                            <th>Time</th>
                            <th>Delay</th>
                        </tr>`;

        var call = {
            "url": "https://v6.db.transport.rest/stops/"+stationId+"/departures?results=15",
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
            alert("Keine Abfahrten mehr gefunden");
        }

        });

        
    }


    function formatDate(datetimeString) {
        const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit'};
        const newDate = new Date(datetimeString).toLocaleString('de-DE', options);
        return newDate;
    }



</script>
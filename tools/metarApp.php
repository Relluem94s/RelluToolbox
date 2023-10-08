<div class="container">
    <form>
        <div class="input-group mb-4">
            <input 
                type="text" 
                class="form-control" 
                name="icao" id="icao" 
                required maxlength="4" 
                placeholder="Enter ICAO Code here...">
                &nbsp;
            <div class="input-group-append">
                <button type="button" onclick="getMetarData()"class="btn btn-primary" id="getMetar">Get Metar</button>
            </div>
            
        </div>
    </form>


    <div id="metarData">
    </div>
    <div>
        <i>Data provided by 
            <a target="_blank" rel="noopener noreferrer" href="https://www.aviationapi.com/">
                AviationApi
            </a>
        </i>
    </div>

</div>
<script>
    async function getMetarData(){

        let icao = document.getElementById("icao").value

        const response = await fetch("https://api.aviationapi.com/v1/weather/metar?apt=" + icao.toUpperCase(),{mode: 'no-cors'});
        const data = await response.json();

    console.log(data);

        let object = Object.values(data);

        let altitude = object[0]['alt_hg'];
        let dewpoint = object[0]['dewpoint'];
        let raw = object[0]['raw'];
        let temperature = object[0]['temp'];
        let updated = object[0]['time_of_obs'];
        let visibility = object[0]['visibility'];
        let wind = object[0]['wind'];
        let windVel = object[0]['wind_vel'];
        let skyConditions = object[0]['sky_conditions'][0]['coverage'];


        const metarData = document.getElementById("metarData");

        metarData.innerHTML = `<p>
            <h4><b>Raw:</b> ${raw} </h4></br>
            <b>Report Time:</b> ${updated} </br>
            <b>Altimeter:</b> ${altitude} </br>
            <b>Temperature/Dewpoint</b> ${temperature}°C / ${dewpoint}°C</br>
            <b>Visibility:</b> ${visibility} statue miles </br>
            <b>Wind:</b> ${wind} degrees @ ${windVel} knots</br>
            <b>Sky Conditions:</b> ${skyConditions} </br>
            </p>`;
    }
</script>




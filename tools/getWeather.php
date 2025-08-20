<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Weather of City</legend>
                <div class="mb-2">
                    <br>
                    <form id="weatherForm">
                        <div class="input-group">
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter the City"
                                required>
                            <button type="button" class="btn btn-primary" id="getWeatherButton">Get Weather</button>
                        </div>
                    </form>

                    <div id="weatherInfo">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Weather of City from ICAO Code</legend>
                <div class="mb-2">
                    <br>

                    <form id="weatherFormICAO">
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" name="icao" id="icao" required maxlength="4"
                                placeholder="Enter ICAO Code here...">
                            &nbsp;
                            <div class="input-group-append">
                                <button type="button" onclick="getMetarData()" class="btn btn-primary" id="getMetar">Get
                                    Metar</button>
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
            </fieldset>
        </div>
    </div>
</div>





<script>
    document.getElementById('getWeatherButton').addEventListener('click', function () {
        event.preventDefault();
        fetchWeatherData();
    });

    document.getElementById('weatherForm').addEventListener('submit', function (event) {
        event.preventDefault();
        fetchWeatherData();
    });

    document.getElementById('weatherFormICAO').addEventListener('submit', function (event) {
        event.preventDefault();
        getMetarData()
    });
</script>

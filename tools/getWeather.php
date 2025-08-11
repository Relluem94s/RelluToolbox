<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Weather of City</legend>
                <div class="mb-2">
                    <br>
                    <form id="weatherForm">
                    <div class="input-group">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter the City" required>
                        <button type="button" class="btn btn-primary" id="getWeatherButton">Wetter</button>
                    </div>
                </form>

                <div id="weatherInfo">
                </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>




<script>
    document.getElementById('getWeatherButton').addEventListener('click', function() {
        event.preventDefault();
        fetchWeatherData();
    });
    
    document.getElementById('weatherForm').addEventListener('submit', function(event) {
        event.preventDefault();
        fetchWeatherData();
    });
</script>

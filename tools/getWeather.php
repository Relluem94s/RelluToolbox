<form id="weatherForm">
    <div class="input-group">
        <input type="text" class="form-control" name="city" id="city" placeholder="Stadt Eingeben" required>
        <button type="button" class="btn btn-primary" id="getWeatherButton">Wetter</button>
    </div>
</form>

<div id="weatherInfo">
</div>

<script>
    document.getElementById('getWeatherButton').addEventListener('click', function() {
        fetchWeatherData();
    });

function fetchWeatherData() {
    const city = document.getElementById('city').value;
    fetch(`tools//weatherApp/getWeather.php?city=${city}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('weatherInfo').innerHTML = "<br><br>" + data;
            updateTemperatureColor();
        })
        .catch(error => {
            console.error('Fehler beim Abrufen der Wetterdaten:', error);
        });
}

function updateTemperatureColor() {
    const temperatureElement = document.querySelector('p.temperature');
    temperatureElement.style.fontWeight = "750";

    const temperatureText = temperatureElement.textContent;

    const normalizedTemperatureText = temperatureText.replace(/[^\d.,-]/g, '').replace(',', '.');

    const temperature = parseFloat(normalizedTemperatureText);

    if (temperature < 0) {
        temperatureElement.style.color = 'turquoise';
    } else if (temperature < 10) {
        temperatureElement.style.color = 'blue';
    } else if (temperature < 20) {
        temperatureElement.style.color = 'orange';
    }else {
        temperatureElement.style.color = 'red';
    }
}
</script>

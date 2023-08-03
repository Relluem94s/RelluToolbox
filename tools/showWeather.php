<h1>Weather App</h1>

<form id="weatherForm">
    <label for="city">Stadt Eingeben:</label>
    <input type="text" name="city" id="city" required>
    <button type="button" id="getWeatherButton">Get Weather</button>
</form>

<div id="weatherInfo">
</div>

<script>
    document.getElementById('getWeatherButton').addEventListener('click', function() {
        fetchWeatherData();
    });

function fetchWeatherData() {
    const city = document.getElementById('city').value;
    fetch(`tools/getWeather.php?city=${city}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('weatherInfo').innerHTML = data;
            updateTemperatureColor();
        })
        .catch(error => {
            console.error('Error fetching weather data:', error);
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
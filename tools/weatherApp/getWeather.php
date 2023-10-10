<?php

$loader = require '../../shared/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . "../../shared/config/");
$dotenv->load();

$dotenv->required('WEATHER_API_KEY');
$dotenv->required('WEATHER_API_URL');

$apiKey = $_ENV['WEATHER_API_KEY'];

$city = $_GET['city'];
$apiUrl = sprintf($_ENV['WEATHER_API_URL'], $city, $apiKey);

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data && $data['cod'] === 200) {
    $temperature = $data['main']['temp'];
    $description = $data['weather'][0]['description'];
    $icon = $data['weather'][0]['icon'];

    echo "<h2>Wetter in $city</h2>";
    echo "<p class='temperature'>Temperatur: $temperature &deg;C</p>";
    echo "<p>Beschreibung: $description</p>";
    echo "<img src='http://openweathermap.org/img/w/$icon.png' alt='Weather Icon'>";
} else {
    echo "<p>Fehler beim Abrufen der Wetterdaten. Bitte versuche es später erneut.</p>";
}

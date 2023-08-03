<?php
$apiKey = '8d292866760141758dfec6b5529f2ea5';
$city = $_GET['city'];
$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&lang=de&appid=$apiKey&units=metric";

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data && $data['cod'] === 200) {
    $temperature = $data['main']['temp'];
    $description = $data['weather'][0]['description'];
    $icon = $data['weather'][0]['icon'];

    echo "<h2>Weather in $city</h2>";
    echo "<p class='temperature'>Temperatur: $temperature &deg;C</p>";
    echo "<p>Beschreibung: $description</p>";
    echo "<img src='http://openweathermap.org/img/w/$icon.png' alt='Weather Icon'>";
} else {
    echo "<p>Fehler beim Abrufen der Wetterdaten. Bitte versuche es später erneut.</p>";
}

?>
<?php
// for more API tokens we should build some ENV´s and everyone should have them locally ;)
$apiKey = '38BVRAQC28B9G63Y';
$symbol = $_GET['symbol'];

$apiUrl = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=$symbol&interval=5min&apikey=$apiKey";

$response = file_get_contents($apiUrl);

if ($response === false) {
    echo json_encode(array('error' => 'Error fetching data from API.'));
    exit;
}

$data = json_decode($response, true);

if ($data && isset($data['Time Series (5min)'])) {
    $stockPrice = $data['Time Series (5min)'][key($data['Time Series (5min)'])]['1. open'];
    $responseArray = array('stockPrice' => $stockPrice);
    echo json_encode($responseArray);
} else {
    echo json_encode(array('error' => 'Fehler beim Abrufen der Aktiendaten.'));
}
?>
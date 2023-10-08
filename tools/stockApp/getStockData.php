<?php

$loader = require '../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . "../../");
$dotenv->load();

$dotenv->required('STOCK_API_KEY');
$dotenv->required('STOCK_API_URL');

$apiKey = $_ENV['STOCK_API_KEY'];
$symbol =  ( isset( $_GET['symbol'] ) ) ? filter_input(INPUT_GET, 'symbol', FILTER_SANITIZE_STRING) : "TSLA";
$time_series_5_min = 'Time Series (5min)';

$apiUrl = sprintf($_ENV['STOCK_API_URL'], $symbol, $apiKey);

$response = file_get_contents($apiUrl);

if ($response === false) {
    echo json_encode(array('error' => 'Error fetching data from API.'));
    exit;
}

$data = json_decode($response, true);

if ($data && isset($data[$time_series_5_min])) {
    $stockPrice = $data[$time_series_5_min][key($data[$time_series_5_min])]['1. open'];
    $responseArray = array('stockPrice' => $stockPrice);
    echo json_encode($responseArray);
} else {
    echo json_encode(array('error' => 'Error fetching stock data.'));
}

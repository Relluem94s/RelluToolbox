<?php
if (!isset($_GET['uuid'])) {
    http_response_code(400);
    echo json_encode(["error" => "No UUID set"]);
    exit;
}

$uuid = htmlspecialchars($_GET['uuid']);

$cleanUuid = str_replace("-", "", $uuid);
$url = "https://api.mojang.com/user/profile/" . $cleanUuid;

$options = [
    "http" => [
        "header" => "User-Agent: PHP\r\n"
    ]
];

$context = stream_context_create($options);
$response = @file_get_contents($url, false, $context);

if ($response === false) {
    http_response_code(404);
    echo json_encode(["error" => "User not Found"]);
} else {
    header("Content-Type: application/json");
    echo $response;
}

<?php
if (!isset($_GET['username'])) {
    http_response_code(400);
    echo json_encode(["error" => "Kein Benutzername angegeben"]);
    exit;
}

$username = htmlspecialchars($_GET['username']);
$url = "https://api.mojang.com/users/profiles/minecraft/" . $username;

$options = [
    "http" => [
        "header" => "User-Agent: PHP\r\n"
    ]
];

$context = stream_context_create($options);
$response = @file_get_contents($url, false, $context);

if ($response === false) {
    http_response_code(404);
    echo json_encode(["error" => "Benutzer nicht gefunden"]);
} else {
    header("Content-Type: application/json");
    echo $response;
}

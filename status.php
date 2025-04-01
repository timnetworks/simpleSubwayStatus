<?php
header('Content-Type: application/json');

$url = 'https://api-endpoint.mta.info/Dataservice/mtagtfsfeeds/camsys%2Fsubway-alerts.json';

try {
    $response = file_get_contents($url);
    if ($response === FALSE) {
        echo json_encode(['error' => 'Failed to fetch data']);
    } else {
        echo $response;
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>


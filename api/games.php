<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once '../database.php';

$console = $_GET['console'] ?? '';
$letter = $_GET['letra'] ?? '#';

$db = new Database();
$games = $db->getGames($console, $letter);
$db->close();

echo json_encode($games);
?>
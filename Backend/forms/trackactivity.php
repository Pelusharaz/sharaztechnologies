<?php
// track_activity.php
require 'Backend/includes/config.php';

$page = $_SERVER['REQUEST_URI'];
$action = $_POST['action'] ?? 'visit';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

$sql = "INSERT INTO user_activity (page, action, user_agent) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$page, $action, $userAgent]);
?>

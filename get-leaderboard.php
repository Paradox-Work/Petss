<?php
$pdo = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
$stmt = $pdo->query("SELECT user_name, completion_time FROM puzzle_results ORDER BY completion_time ASC LIMIT 5");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($results);
?>
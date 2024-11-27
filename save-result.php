<?php
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $pdo = new PDO('mysql:host=localhost;dbname=pets', 'root', '');
    $stmt = $pdo->prepare("INSERT INTO puzzle_results (user_name, completion_time) VALUES (?, ?)");
    $stmt->execute([$data['name'], $data['time']]);
    echo "Rezultāts saglabāts veiksmīgi!";
}
?>
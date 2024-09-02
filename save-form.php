<?php

require_once __DIR__ . '/database_connection/db_connect.php';

$title = (string) $_POST['title'] ?? '';
$date = (string) $_POST['date'] ?? '';
$message = (string) $_POST['message'] ?? '';

if (empty($title) || empty($date) || empty($message)) {
    die('Please fill in all fields');
}

try {
    $stmt = $pdo->prepare('INSERT INTO entries (title, date, message) VALUES (:title, :date, :message)');
    $stmt->execute([
        'title'     => $title,
        'date'      => $date,
        'message'   => $message,
    ]);
    
    header('Location: index.php');
} catch (PDOException $e) {
    die($e->getMessage());
}




<?php

require_once __DIR__ . '/database_connection/db_connect.php';

$title = (string) $_POST['title'] ?? '';
$date = (string) $_POST['date'] ?? '';
$message = (string) $_POST['message'] ?? '';
$fileName = null;


if (empty($title) || empty($date) || empty($message)) {
    die('Please fill in all fields');
}

// handle file upload
if ($_FILES && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['image_url']['name'];
    $fileTmpName = $_FILES['image_url']['tmp_name'];
    $fileSize = $_FILES['image_url']['size'];
    $fileError = $_FILES['image_url']['error'];
    $fileType = $_FILES['image_url']['type'];

    [$fileNameExact, $extention] = explode('.', $fileName);


    $fileNameToStore = $fileNameExact . '_' . time() . '.' . $extention;
    move_uploaded_file($fileTmpName, __DIR__ . '/images/' . $fileNameToStore);
}


try {
    $stmt = $pdo->prepare('INSERT INTO entries (title, date, message, image_url) VALUES (:title, :date, :message, :image_url)');
    $stmt->execute([
        'title'     => $title,
        'date'      => $date,
        'message'   => $message,
        'image_url' => $fileNameToStore
    ]);
    
    header('Location: index.php');
} catch (PDOException $e) {
    die($e->getMessage());
}




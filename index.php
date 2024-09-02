<?php

require_once __DIR__. '/database_connection/db_connect.php';
require_once __DIR__. '/include/escape.php';

try {
    $stmt = $pdo->prepare('SELECT * FROM entries');
    $stmt->execute();
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
    <link rel="stylesheet" type="text/css" href="./styles/styles.css" />
    <title>PHP Diary</title>
</head>
<body>
    <?php
    require_once __DIR__. '/views/navbar.html';
    ?>
    <main class="main">
        <div class="container">
            <h1 class="main-heading">Entries</h1>
            <?php foreach ($entries as $entry): ?>
                <div class="card">
                    <div class="card__image-container">
                        <img class="card__image" src="images/pexels-canva-studio-3153199.jpg" alt="" />
                    </div>
                    <div class="card__desc-container">
                        <div class="card__desc-time"><?php echo e($entry['title']) ?></div>
                        <h2 class="card__heading"><?php echo e($entry['date']) ?></h2>
                        <p class="card__paragraph">
                            <?php echo e($entry['message']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            

            <ul class="pagination">
                <li class="pagination__li">
                    <a class="pagination__link" href="#">⏴</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link pagination__link--active" href="#">1</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">2</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">3</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">⏵</a>
                </li>
            </ul>
        </div>
    </main>
    <?php
    require_once __DIR__. '/views/footer.html';
    ?>
</body>
</html>
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
            <h1 class="main-heading">New Entry</h1>

            <form method="POST" action="save-form.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="from-group__label" for="title">Title:</label>
                    <input class="from-group__input" type="text" id="title" name="title" />
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="date">Date:</label>
                    <input class="from-group__input" type="date" id="date" name="date" />
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="image_url">Image:</label>
                    <input class="from-group__input" type="file" id="image_url" name="image_url" />
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="message">Message:</label>
                    <textarea class="from-group__input" id="message" name="message" rows="6"></textarea>
                </div>
                <div class="form-submit">
                    <button class="button">
                        <svg class="button__icon" viewBox="0 0 34.7163912799 33.4350009649">
                            <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
                                <polygon points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649"/>
                                <line x1="33.7163912799" y1="1" x2="15.1899978903" y2="17.5208901631"/>
                            </g>
                        </svg>
                        Save!
                    </button>
                </div>
            </form>
        </div>
    </main>
    <?php 
    require_once __DIR__ . '/views/footer.html';
    ?>
</body>
</html>
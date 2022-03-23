<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DAWN FM</title>
        <link href="/styles/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <?php
    require_once '../app/templates/header.php';

    if($_SERVER['REQUEST_URI'] == '/'){
        require_once '../app/templates/mainpage.php';
    }
    elseif ($_SERVER['REQUEST_URI'] == '/posts'){
        require_once '../app/templates/postpage.php';
    }


    require_once '../app/templates/footer.php'; ?>
    </body>
</html>
<?php

use App\Controller\AppController;

$id = "1";

$content = AppController::fetchClientInfos($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <h1>This is the homepage</h1>
    <p>Welcome <?= $content->getFirstName() ?></p>
    <a href="http://127.0.0.6/client/update/id=<?= $id ?>">Modify your infos</a>
</body>

</html>
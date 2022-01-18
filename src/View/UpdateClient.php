<?php

use App\Controller\AppController;
use App\Helpers\EntityManagerHelper;

$content = '';
if (isset($id)) {
    try {
        $em = EntityManagerHelper::getEntityManager();
        $client = AppController::fetchClientInfos($id);
        if (!empty($client)) {
            $title = "You are updating client n°" . $id;
        } else $title = "No client matches this id";
    } catch (Exception $e) {
        $code = $e->getCode();
        $msg = $e->getMessage();
        echo "Error $code : $msg";
    }
} else $content = "No client to update"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update yourself</title>
</head>

<body>
    <h1><?= $title ?></h1>
    <?php
    if (str_contains($title, "You are updating client n°")) {
        echo '  <form method="POST">
                    <label for="firstname">Firstname</label><br>
                    <input type="text" name="firstname" id="fn" value="' . $client->getFirstName() . '"><br>
                    <label for="lastname">Lastname</label><br>
                    <input type="text" name="lastname", id="ln" value="' . $client->getLastName() . '"><br>
                    <label for="nationality">Nationality</label><br>
                    <input type="text" name="nationality" id="nat" value="' . $client->getNationality() . '"><br>
                    <input type="submit" value="Update !">
                    <button type="reset">Reset values</button>
                </form>
                <button onclick="deleteUser(' . $id . ')">Delete client</button>
                ';
    }
    ?>
</body>
<script>
    function deleteUser(id) {

        var conf = confirm('Do you want to delete this client ?');
        if (conf) document.location.href = "http://127.0.0.6/client/delete/id=" + id;
    }
</script>

</html>
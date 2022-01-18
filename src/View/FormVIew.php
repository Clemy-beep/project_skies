<?php

use App\Controllers\AppController;
use App\Entity\Client;
use App\Router\Router;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>

<body>
    <form method="post">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" required>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" required>
        <label for="nationality">Nationality</label>
        <input type="text" name="nationality" required>
        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php

?>
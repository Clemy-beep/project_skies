<?php

use App\Entity\Client;

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['nationality'])) {
    $client = new Client($_POST['firstname'], $_POST['lastname'], $_POST['nationality']);
    var_dump($client);
} else throw new Exception('Please fill all fields', 01);
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
    <form action="<?php $_PHP_SELF ?>" method="post">
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
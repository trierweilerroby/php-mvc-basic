<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../../models/user.php';
    include_once __DIR__ . '/../header.php';
    $user = $_SESSION['user'];
    ?>
    <h1>Personal information</h1>

    <?=
        $user['firstname'] . ' ' . $user['lastname'] . ' ' . $user['email'] ;


    ?>


    <?php
    include_once __DIR__ . '/../footer.php';
    ?>

</body>

</html>
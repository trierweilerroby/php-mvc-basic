<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
include_once __DIR__ . '/../header.php';
?>
<?php
if (isset($_SESSION['user'])) {
    ?><h1><?= $user['firstname'] ?></h1>
<?php
}else{
    ?><h1>Welcome!</h1>
<?php
}
?>
<?php
include_once __DIR__ . '/../footer.php';
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../header.php';
    $user = $_SESSION['user'];
    $typerepository = new UserRepository();
$users = $userrepository->getAll();
    ?>
    <form action="/edit" method="POST">
        <div class="mb-3">
            <label class="form-label">Firstname</label>
            <input class="form-control" name="firstname" value="<?= $user['firstname'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Lastname</label>
            <input class="form-control" name="lastname" value="<?= $user['lastname']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?= $user['email']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Your certificates</label>
            <input class="form-control" name="certificates" value="<?= $user['certificate']?>">
        </div>
        <div class="mb-3">
            <select class="form-select" name="type_id">
                <option selected>--Usertype--</option>
                <?php foreach ($usertypes as $usertype) ?>

            </select>
        </div>
        <button typ type="submit" class="btn btn-primary" name="editUser">Submit Edit</button>
        <a href="/changePassword">Change Password</a>
    </form>
    <?php
    include_once __DIR__ . '/../footer.php';
    ?>
</body>

</html>
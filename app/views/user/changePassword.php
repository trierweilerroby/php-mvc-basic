<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/stylesheet.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
    include_once __DIR__ . '/../header.php';
    $user = $_SESSION['user'];
    ?>
    <div class="container mx-auto my-8">
        <form action="/changePassword" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
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
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="*****">
            </div>

            <button type="submit" class="btn btn-primary" name="editUserBtn">Submit Edit</button>
        </form>
    </div>

    <?php
    include_once __DIR__ . '/../footer.php';
    ?>
</body>

</html>

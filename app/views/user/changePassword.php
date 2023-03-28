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
    ?>
    <form action="/signupUser" method="POST">
    <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <div class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                special characters, or emoji.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password Confirm</label>
            <input type="password" class="form-control" name="changePassword">
        </div>
        <button type="submit" class="btn btn-primary" name="signupBtn">Submit Edit</button>

    </form>
    <?php
    include_once __DIR__ . '/../footer.php';
    ?>
</body>

</html>
<?php
require_once(__DIR__ . "/../../config/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container mx-auto my-8">
        <form action="/usermanagement" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="Firstname" class="form-label">Firstname</label>
                <input class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="Lastname" class="form-label">Lastname</label>
                <input class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <div class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces,
                    special characters, or emoji.
                </div>
            </div>
            <div class="mb-3">
                <select class="form-select" name="type_id">
                    <option selected>--Usertype--</option>
                    <option value="2">User</option>
                    <option value="3">Employer</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="job_type">
                    <option selected>Choose which job you are looking for</option>
                    <option value="0">Display all jobs</option>
                    <option value="1">UX/UI Designer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="addUserBtn">Add User</button>
        </form>

        <?php foreach ($users as $user): ?>
            <div class="bg-white rounded p-4 mb-4 shadow">
                <p><strong>Firstname:</strong> <?= $user->getFirstName() ?></p>
                <p><strong>Lastname:</strong> <?= $user->getLastname() ?></p>
                <p><strong>Email:</strong> <?= $user->getEmail() ?></p>
                <p><strong>Job Type:</strong> <?= $user->getJob_name() ?></p>

                <form method='POST'>
                    <input type='hidden' id='id' name='id' value='<?= $user->getId() ?>'>
                    <input type='submit' id='delete' name='deleteUserBtn' value='Delete' class="btn btn-danger">
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

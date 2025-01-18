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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-light">

    <?php require_once __DIR__ . '/../header.php'; ?>

    <div class="container py-5">
        <!-- Main Header -->
        <h1 class="text-center display-4 text-primary mb-5">
            <i class="fas fa-users-cog me-3"></i>User Management
        </h1>

        <!-- Add User Form -->
        <div class="card shadow mb-5">
            <div class="card-body">
                <h2 class="card-title text-center text-secondary mb-4">Add a New User</h2>
                <form action="/usermanagement" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Firstname" class="form-label">Firstname</label>
                            <input class="form-control" name="firstname" placeholder="Enter first name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Lastname" class="form-label">Lastname</label>
                            <input class="form-control" name="lastname" placeholder="Enter last name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <div class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not
                            contain spaces, special characters, or emoji.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="type_id" class="form-label">User Type</label>
                            <select class="form-select" name="type_id">
                                <option selected>-- Select Usertype --</option>
                                <option value="2">User</option>
                                <option value="3">Employer</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="job_type" class="form-label">Job Preference</label>
                            <select class="form-select" name="job_type">
                                <option selected>-- Select Job Type --</option>
                                <option value="0">Display all jobs</option>
                                <option value="1">UX/UI Designer</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="addUserBtn">
                        <i class="fas fa-user-plus me-2"></i>Add User
                    </button>
                </form>
            </div>
        </div>

        <!-- Display Users Section -->
        <h2 class="text-center text-secondary mb-4">
            <i class="fas fa-users me-3"></i>Registered Users
        </h2>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fas fa-user-circle me-2"></i><?= htmlspecialchars($user->getFirstName()) . ' ' . htmlspecialchars($user->getLastname()) ?>
                            </h5>
                            <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($user->getEmail()) ?></p>
                            <p class="card-text"><strong>Job Type:</strong> <?= htmlspecialchars($user->getJob_name()) ?></p>
                        </div>
                        <div class="card-footer bg-light text-center">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user->getId()) ?>">
                                <button type="submit" class="btn btn-danger btn-sm w-75" name="deleteUserBtn">
                                    <i class="fas fa-trash-alt me-2"></i>Delete User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

  <?php include_once __DIR__ . '/../header.php'; ?>

  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold">Personal Information</h1>
    <div class="card mt-4">
      <div class="card-body">
        <p class="card-text">Name: <?= $user['firstname'] . ' ' . $user['lastname'] ?></p>
        <p class="card-text">Email: <?= $user['email'] ?></p>
      </div>
      <div class="card-footer">
        <a href="/changePassword" class="btn btn-primary">Change Password</a>
      </div>
    </div>
  </div>

  <?php include_once __DIR__ . '/../footer.php'; ?>

</body>

</html>

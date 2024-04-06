<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <?php
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

  }

  ?>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary" id="navback">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">JobConnect</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/article">Job offers</a>
          </li>
          <?php if (!isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION['user'])) { ?>
            <?php if ($user['type_id'] == 2 || 3) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/reply">Replys</a>
              </li>
            <?php } ?>
            <?php if ($user['type_id'] == 3) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/request">Your Requests</a>
              </li>
            <?php } ?>
            <?php if ($user['type_id'] == 1) { ?>
              <li class="nav-item"><a class="nav-link" href="/usermanagement">User Management</a></li>
            <?php } ?>
            <?php if ($user['type_id'] == 2 || 1) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/jobmanagement">Job Management</a>
              </li>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>
      <?php if (isset($_SESSION['user'])) { ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/userinformation">User Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      <?php } ?>
    </div>
  </nav>


</body>

</html>
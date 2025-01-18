<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JobConnect</title>
  <link rel="stylesheet" href="stylesheet.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-100">
  <?php
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
      <a class="navbar-brand fw-bold text-uppercase" href="/">
        <i class="fas fa-briefcase"></i> JobConnect
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/home') ? 'active' : '' ?>" href="/home">
              <i class="fas fa-home"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/article') ? 'active' : '' ?>" href="/article">
              <i class="fas fa-briefcase"></i> Job Offers
            </a>
          </li>
          <?php if (!isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/login') ? 'active' : '' ?>" href="/login">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </li>
          <?php } else { ?>
            <?php if ($user['type_id'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/reply') ? 'active' : '' ?>" href="/reply">
                  <i class="fas fa-reply"></i> Replies
                </a>
              </li>
            <?php } ?>
            <?php if ($user['type_id'] == 3) { ?>
              <li class="nav-item">
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/request') ? 'active' : '' ?>" href="/request">
                  <i class="fas fa-tasks"></i> Your Requests
                </a>
              </li>
            <?php } ?>
            <?php if ($user['type_id'] == 1) { ?>
              <li class="nav-item">
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/usermanagement') ? 'active' : '' ?>" href="/usermanagement">
                  <i class="fas fa-users-cog"></i> User Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/reply') ? 'active' : '' ?>" href="/reply">
                  <i class="fas fa-reply"></i> Reply
                </a>
              </li>
            <?php } ?>
            <?php if ($user['type_id'] == 1 || $user['type_id'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/jobmanagement') ? 'active' : '' ?>" href="/jobmanagement">
                  <i class="fas fa-cogs"></i> Job Management
                </a>
              </li>
            <?php } ?>
          <?php } ?>
        </ul>

        <?php if (isset($_SESSION['user'])) { ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/userinformation') ? 'active' : '' ?>" href="/userinformation">
                <i class="fas fa-user"></i> User Info
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger <?= ($_SERVER['REQUEST_URI'] === '/logout') ? 'active' : '' ?>" href="/logout">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-c+WBtHZY/5Rfp7L/rtX/xjo5l+dCgEXIhLTBoQkwhFvcKIZxVEnHfRvM0upqwv4c"
    crossorigin="anonymous"></script>
</body>

</html>

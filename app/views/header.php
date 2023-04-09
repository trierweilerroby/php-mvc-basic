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
<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary" id="navback">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/article">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        <?php if (isset($_SESSION['user'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="/reply">Replys</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/userinformation">User Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/request">Your Requests</a>
        </li>
        <?php if ($user['type_id'] == 1){ ?>
        <li class="nav-item">
          <a class="nav-link" href="/jobmanagement">Job Management</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="/usermanagement">User Management</a></li>
        <?php  } ?>
        <li><a class="nav-link" href="/logout">Logout</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
 
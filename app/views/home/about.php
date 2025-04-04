<?php
include_once __DIR__ . '/../header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container my-5">
    <!-- Main Heading -->
    <h1 class="text-center display-4 text-primary fw-bold mb-4">
      <i class="fas fa-info-circle me-2"></i>About Us
    </h1>
    <p class="text-center text-muted mb-5">
      Learn more about JobConnect, our mission, and how we create meaningful connections between job seekers and employers.
    </p>

    <!-- About Content -->
    <div class="mb-5">
      <h2 class="text-secondary fw-bold mb-3">Our Mission</h2>
      <p class="text-muted">
        At <strong>JobConnect</strong>, our mission is to bridge the gap between job seekers and employers by providing 
        a platform that is efficient, transparent, and accessible. We are dedicated to simplifying the job search process 
        and helping individuals discover opportunities that align with their skills and ambitions.
      </p>
      <p class="text-muted">
        By building a network of reliable employers and talented professionals, we aim to empower users to take charge of 
        their careers while fostering long-term partnerships in the professional world.
      </p>
    </div>

    <!-- Vision and Values Section -->
    <div>
      <h2 class="text-secondary fw-bold mb-4 text-center">
        <i class="fas fa-bullseye me-2"></i>Our Vision and Values
      </h2>
      <div class="row">
        <div class="col-md-4 text-center">
          <i class="fas fa-lightbulb text-warning display-4 mb-3"></i>
          <h4 class="text-secondary">Innovation</h4>
          <p class="text-muted">We leverage cutting-edge technology to provide seamless hiring and job-seeking experiences.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-users text-primary display-4 mb-3"></i>
          <h4 class="text-secondary">Collaboration</h4>
          <p class="text-muted">We build strong relationships between employers and job seekers, fostering trust and cooperation.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-globe text-success display-4 mb-3"></i>
          <h4 class="text-secondary">Global Reach</h4>
          <p class="text-muted">Our platform connects professionals across the globe, enabling access to diverse talent and opportunities.</p>
        </div>
      </div>
    </div>
  </div>

  <?php include_once __DIR__ . '/../footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

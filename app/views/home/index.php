<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Connect</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once __DIR__ . '/../header.php';
    ?>

<!-- Hero Section -->
<section class="bg-blue-900 text-white py-20">
  <div class="container mx-auto">
    <div class="text-center">
      <h1 class="text-4xl font-bold mb-4">Welcome to Job Connect</h1>
      <p class="text-lg mb-8">A world of opportunities: where your job search ends and your career begins</p>
      <a href="/article" class="btn btn-primary px-8 py-3 text-lg">Explore Job Offers</a>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="bg-gray-100 py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center">
    <div class="md:w-1/2">
      <img src="about-image.jpeg" alt="About Image" class="mx-auto md:mx-0 md:ml-auto md:mr-0 mb-8 md:mb-0 rounded-md">
    </div>
    <div class="md:w-1/2 text-center md:text-left">
      <h2 class="text-3xl font-bold mb-4">About Us</h2>
      <p class="text-lg mb-8">We connect employers with the right talent and help job seekers find their dream job. With our platform, you can browse through a wide range of job offers or post your vacancies to attract top-notch candidates.</p>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include_once __DIR__ . '/../footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

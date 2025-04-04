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
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Include Header -->
    <?php include_once __DIR__ . '/../header.php';
    echo 'PHP version: ' . phpversion();
    ?>

    <!-- Hero Section -->
    <section class="relative bg-blue-900 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold mb-6">Welcome to Job Connect</h1>
            <p class="text-xl mb-8">A world of opportunities: where your job search ends and your career begins.</p>
            <a href="/article" class="btn btn-primary btn-lg px-8 py-3 shadow-lg hover:shadow-xl">
                Explore Job Offers
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20">
        <div class="container mx-auto flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2">
                <img src="about-image.jpeg" alt="About Us" class="w-full rounded-lg shadow-lg">
            </div>
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-4xl font-bold mb-6">About Us</h2>
                <p class="text-lg mb-6 leading-relaxed">
                    We connect employers with the right talent and help job seekers find their dream job. With our platform, you
                    can browse through a wide range of job offers or post your vacancies to attract top-notch candidates.
                </p>
                <a href="/home/about" class="btn btn-secondary btn-lg px-8 py-3 shadow-lg hover:shadow-xl">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-blue-50 py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-10">Why Choose Job Connect?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <i class="fas fa-briefcase text-blue-600 text-5xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Wide Job Listings</h3>
                    <p>Access thousands of job listings tailored to your skills and preferences.</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <i class="fas fa-user-check text-blue-600 text-5xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Trusted Employers</h3>
                    <p>Work with reputable companies offering competitive opportunities.</p>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <i class="fas fa-chart-line text-blue-600 text-5xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Career Growth</h3>
                    <p>Find roles that align with your goals and aspirations for growth.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once __DIR__ . '/../footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Offers</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div>
  <?php
    include_once __DIR__ . '/../header.php';
  if (!isset($_SESSION['user'])) {
    echo "<div class='container mx-auto my-20 text-center'><h1 class='text-2xl font-bold'>Welcome! Please login to view the job offers</h1></div>";
  } else {
    $user = $_SESSION['user'];
  ?>

  <!-- Job Offers Header -->
  <div class="container mx-auto my-8 text-center">
    <h1 class="text-4xl font-bold text-gray-800">Job Offers</h1>
    <p class="text-lg text-gray-600 mt-4">Empower Your Future: Connect with Employers, Find Your Dream Job, and Thrive!</p>
  </div>

  <!-- Job Offers Grid -->
  <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($articles as $article): ?>
    <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition duration-300">
      <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($article->getTitle()) ?></h2>
      </div>
      <div class="mb-6">
        <p class="text-gray-600 mb-4 h-24 overflow-y-auto"><?= htmlspecialchars($article->getContent()) ?></p>
        <p class="text-blue-500 font-semibold">Salary: <?= htmlspecialchars($article->getSalary()) ?>$ per year</p>
      </div>
      <form action="/repondToJob" method="POST" class="space-y-4">
        <div>
          <label for="inputReply<?= $article->getId() ?>" class="block text-gray-700 font-medium">Reply to this job offer</label>
          <input type="text" id="inputReply<?= $article->getId() ?>" name="inputReply" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" placeholder="Write your reply here..." required>
        </div>
        <input type="hidden" name="article_id" value="<?= htmlspecialchars($article->getId()) ?>">
        <input type="hidden" name="author" value="<?= htmlspecialchars($article->getAuthor()) ?>">
        <input type="hidden" name="title" value="<?= htmlspecialchars($article->getTitle()) ?>">
        <button type="submit" name="replyBtn" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Send Job Request</button>
      </form>
      <div class="mt-6 text-center text-gray-500 text-sm">
        <p>Posted by <i><?= htmlspecialchars($article->getAuthor_firstname()) . " " . htmlspecialchars($article->getAuthor_lastname()) ?></i> at <i><?= htmlspecialchars($article->getPosted_at()) ?></i></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <?php } ?>

  <?php include_once __DIR__ . '/../footer.php'; ?>
</div>
</body>
</html>

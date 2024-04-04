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
  <style>
    /* Add custom styles here if needed */
  </style>
</head>
<body>
<div class="">
  <?php
    include_once __DIR__ . '/../header.php';
  if(!isset($_SESSION['user'])){
    echo "<h1>Welcome! pls login to view the job offers</h1>";
    
  }else{
    $user = $_SESSION['user'];


  ?>

  <div class="container mx-auto my-8 text-center">
    <h1 class="text-3xl font-bold">Job Offers</h1>
    <p class="mt-4">Empower Your Future: Connect with Employers, Find Your Dream Job, and Thrive!</p>
</div>

  <div class="container mx-auto flex flex-wrap justify-center">
    <?php foreach ($articles as $article): ?>
    <div class="card text-center flex flex-col justify-between mx-2 mb-4" style="width: 18rem;">
      <div class="card-header">
        <h2><?= $article->getTitle() ?></h2>
      </div>
      <div class="card-body flex-grow">
        <p class="card-content mb-4" style="height: 200px; overflow-y: auto;"><?= $article->getContent() ?></p>
        <p>Salary: <?= $article->getSalary() ?>$ per year</p>
        <hr class="mb-10 mt-10">
        <form action="/repondToJob" method="POST" class="flex flex-col h-full">
          <div class="mb-1">
            <label for="inputReply">Reply to this job offer</label>
            <input class="form-control h-10" name="inputReply" id="<?= $article->getId() ?>"></input>
          </div>
          <input type="hidden" name='article_id' value='<?= $article->getId() ?>'>
          <input type="hidden" name='author' value='<?= $article->getAuthor() ?>'>
          <input type="hidden" name='title' value='<?= $article->getTitle() ?>'>
          <input class="btn btn-primary w-full" type="submit" name="replyBtn" value='Send Job Request'>
        </form>
      </div>
      <div class="card-footer">
        <p>Posted by <i><?= $article->getAuthor_firstname() . " " . $article->getAuthor_lastname() ?></i>
          posted at <i><?= $article->getPosted_at() ?></i></p>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

    <?php
    }
    ?>

  <?php include_once __DIR__ . '/../footer.php'; ?>
</div>
</body>
</html>

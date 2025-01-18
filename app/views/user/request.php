<?php
// Ensure the $replys variable is defined and valid
if (!isset($replys) || !is_array($replys)) {
    $replys = []; // Initialize as an empty array if not already defined
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accepted Requests</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

  <?php include_once __DIR__ . '/../header.php'; ?>

  <div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Here are your accepted requests</h1>

    <?php if (empty($replys)): ?>
      <!-- Display a message if there are no replies -->
      <p class="text-gray-500">You have no accepted requests at the moment.</p>
    <?php else: ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($replys as $reply): ?>
          <div class="card text-center shadow-md rounded-md">
            <div class="card-body">
              <h2 class="card-title text-2xl font-bold mb-2"><?= htmlspecialchars($reply->getContent()) ?></h2>
              <?php if ($reply->accept == 1): ?>
                <p class="text-green-500">Your reply got accepted</p>
              <?php elseif ($reply->accept == 2): ?>
                <p class="text-red-500">Your reply got rejected</p>
              <?php else: ?>
                <p class="text-yellow-500">Your reply is pending</p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php include __DIR__ . '/../footer.php'; ?>

</body>

</html>

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

<body class="bg-gray-100 text-gray-800">

  <?php include_once __DIR__ . '/../header.php'; ?>

  <div class="container mx-auto my-8">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
      <h1 class="text-4xl font-bold text-center mb-6 text-gray-800">Personal Information</h1>
      <div class="border-b pb-4 mb-4">
        <p class="text-lg font-medium text-gray-700">Name:</p>
        <p class="text-gray-600"><?= htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']) ?></p>
      </div>
      <div class="border-b pb-4 mb-4">
        <p class="text-lg font-medium text-gray-700">Email:</p>
        <p class="text-gray-600"><?= htmlspecialchars($user['email']) ?></p>
      </div>
      <div class="text-center">
        <a href="/changePassword" class="inline-block bg-blue-500 text-white font-medium py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition">
          Change Password
        </a>
      </div>
    </div>
  </div>

  <?php include_once __DIR__ . '/../footer.php'; ?>

</body>

</html>

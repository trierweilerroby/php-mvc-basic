<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <?php include_once __DIR__ . '/../header.php'; ?>

  <div class="container mx-auto my-8">
    <!-- Main Heading -->
    <h1 class="text-center display-3 text-primary fw-bold mb-5">
      <i class="fas fa-tasks me-2"></i>Your Requests
    </h1>

    <?php if (empty($replies)): ?>
      <!-- Empty State -->
      <div class="alert alert-info text-center" role="alert">
        <i class="fas fa-info-circle me-2"></i>You have no requests at the moment.
      </div>
    <?php else: ?>
      <!-- Request Cards -->
      <div class="row g-4">
        <?php foreach ($replies as $reply): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <!-- Card Header -->
                <h4 class="card-title text-dark fw-bold mb-3">
                  <i class="fas fa-file-alt me-2"></i><?= htmlspecialchars($reply->getContent()) ?>
                </h4>

                <!-- Status Messages -->
                <?php if ($reply->accept == 1): ?>
                  <div class="alert alert-success mt-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i>Your reply got <strong>Accepted</strong>!
                  </div>
                <?php elseif ($reply->accept == 2): ?>
                  <div class="alert alert-danger mt-3" role="alert">
                    <i class="fas fa-times-circle me-2"></i>Your reply got <strong>Rejected</strong>.
                  </div>
                <?php else: ?>
                  <div class="alert alert-warning mt-3" role="alert">
                    <i class="fas fa-hourglass-half me-2"></i>Your reply is <strong>Pending</strong>.
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php include __DIR__ . '/../footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

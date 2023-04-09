<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    include_once __DIR__ . '/../header.php';
    ?>

    <h1>Here are you accepted requests</h1>
    <br>
    <?php
    require_once(__DIR__ . "/../../repositories/replyrepository.php");//TODO: fix this
    $replyrepository = new ReplyRepository();
    $replys = $replyrepository->getAcceppted();
    foreach ($replys as $reply) {
        ?>
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <h2>
                        <?= $reply->getContent() ?>
                    </h2>
                </h5>
                <p class="card-text"> <?= $reply->getContent() ?>
                </p>
            </div>
            <ul class="list-group list-group-flush">
  </ul>
            <div class="card-footer text-muted">
                <p>
                    Your reply got accepted
                </p>
            </div>
        </div>
        <?php
    }
    include __DIR__ . '/../footer.php';
    ?>



</body>

</html>
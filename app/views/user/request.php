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
    require_once(__DIR__ . "/../../repositories/replyrepository.php");
    $replyrepository = new ReplyRepository();
    $replys = $replyrepository->getAcceppted();
    foreach ($replys as $reply) {
        ?>
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                <p><i>
                        <?= $reply->getArticle_id() ?>
                    </i></p>

            </div>
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
    <li class="list-group-item">User name</li>
    <li class="list-group-item">Email</li>
    <li class="list-group-item">Certificats</li>
  </ul>
            <div class="card-footer text-muted">
                <p>
                    <?= $reply->getReply_from() ?>
                </p>
            </div>

        <button type="submit" class="btn btn-primary" name="Accept">Accept</button>
        <button type="submit" class="btn btn-danger" name="Decline">Decline</button>
        </div>
        <?php
    }
    include __DIR__ . '/../footer.php';
    ?>



</body>

</html>
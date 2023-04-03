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
    /*$usertype = $_SESSION['user']->getUsertype();
    if ($usertype == 'admin') {
        include_once __DIR__ . '/../management/header.php';
    } else {
        include_once __DIR__ . '/../header.php';
    }*/
    include_once __DIR__ . '/../header.php';
    ?>

<h1>Offer Status</h1>
    <br>
    <?php
    require_once(__DIR__ . "/../../repositories/replyrepository.php");//to do: change to correct mvc
    $replyrepository = new ReplyRepository();
    $replys = $replyrepository->getAllPending();// until hier
    foreach ($replys as $reply) {
        ?>
        <div style="float: left;">
        <div class="card text-center" style="width: 18rem;" id="<?= $reply->getArticle_id()?>">
            <div class="card-header">
                <p><i>
                        <?= $reply->getId() ?>
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
                <p><?php
                if( $reply->getAccept() == 0 ){
                    ?><p>Offer is pending</p><?php
                }else if($reply->getAccept() == 1){?>
                    <p>Offer is accepted</p>
                    <?php } ?>
                </p>
            </div>
            <button type="submit" class="btn btn-primary" name="Accept">Accept</button>
        <button type="submit" class="btn btn-danger" name="Decline" onclick="removeReply()">Decline</button>

        </div>
        <script>
            function removeReply() {
                const card = document.getElementById("<?= $reply->getId()?>");
                const id = card.id;
                console.log(id);
                card.remove();
                var obj = {
                    id: id
                };

                fetch('http://localhost/api/reply/decline', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(obj)
                }).then(function (response) {
                    console.log(response);
                })
            }
        </script>
        </div>
        <?php
    }
    ?>


    <?php
    include __DIR__ . '/../footer.php';
    ?>



</body>

</html>
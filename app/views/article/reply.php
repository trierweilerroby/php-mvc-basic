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

<div class="container">
    <div id="replys" class="row">


    </div>
</div>
<script>
    function loadData(){
        const replyDiv = document.getElementById("reply");
        replyDiv.innerHTML = "";

        fetch('http://localhost/api/reply')
        .then(response => response.json())
        .then((replys)=>{
            replys.forEach(reply => {
            appendReply(reply);                
            });
        })
    }

    function appendReply(reply){
        const replyDiv = document.getElementById("replys");
        const replyCard = document.createElement("div");
        replyCard.classList.add("card");
        replyCard.classList.add("col-3");
        replyCard.classList.add("m-2");
        
        const cardheader = document.createElement("div");
        cardheader.classList.add("card-header");

        const title = document.createElement("h2");
        title.innerText = reply.title;
        cardheader.appendChild(title);
        card.appendChild(cardheader);

        const cardbody = document.createElement("div");
        cardbody.classList.add("card-body");

        const content = document.createElement("p");
        content.innerText = reply.content;
        cardbody.appendChild(content);

        const salary = document.createElement("p");
        salary.innerText = reply.salary;
        cardbody.appendChild(salary);

        const cardfooter = document.createElement("div");
        cardfooter.classList.add("card-footer");

        const accepted = document.createElement("p");
        accepted.innerText = reply.accept;
        cardfooter.appendChild(accepted);

        const acceptButton = document.createElement("button");
        button.classList.add("acceptBtn");

        const declineButton = document.createElement("button");
        button2.classList.add("declineBtn");

        loadData();


    }
</script>

    <?php

require_once(__DIR__ . "/../../repositories/replyrepository.php");//TODO: fix this path
$replyrepository = new ReplyRepository();
$replys = $replyrepository->getAllPending();// until hier
    foreach ($replys as $reply) {
        ?>
        <div style="float: left;">
        <div class="card text-center" style="width: 18rem;" id="<?= $reply->getArticle_id()?>">
            <div class="card-header">
                <p><i>
                    </i></p>

            </div>
            <div class="card-body">
                <p class="card-text"> <?= $reply->getContent() ?>
                </p>
            </div>
            <ul class="list-group list-group-flush">
    <li class="list-group-item">Email</li>
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
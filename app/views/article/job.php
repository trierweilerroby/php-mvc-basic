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

    <h1>Job offers!</h1>
    <br>



<?php
$user = $_SESSION['user'];
    foreach ($articles as $article) {
        ?>
        <div class="card text-center" style="width: 18rem; float: left; margin: 5px;">
            <div class="card-header">
                <h2>
                    <?= $article->getTitle() ?>
                </h2>
            </div>
            <div>
                <p>
                    <?= $article->getContent() ?><br>
                    Sallary :
                    <?= $article->getSalary() ?>
                    per year
                </p>
                <form action="/repondToJob" method="POST">
                    <div>
                        <label>Reply to this job offer</label>
                        <input class="form-control" name="inputReply" id="<?= $article->getId() ?>"></input>
                    </div>
                    <input type="text" name='article_id' value='<?= $article->getId() ?>' hidden>
                    <input type="text" name='author' value='<?= $article->getAuthor() ?>' hidden>
                    <input type="text" name='title' value='<?= $article->getTitle() ?>' hidden>

                    <input class="btn btn-primary" type="submit" name="replyBtn" value='send job'>
                    <br>
                </form>
            </div>
            <br>
            <div class="card-footer">
                <p>Posted by <i>
                        <?= $article->getAuthor_firstname() . " " . $article->getAuthor_lastname() ?>
                    </i>
                    posted at <i>
                        <?= $article->getPosted_at() ?>
                    </i></p>
            </div>
        </div>

        <script>
            function ReplySent(id) {
                const newElement = document.createElement("p");
                const oldElement = document.createElement("input");

                const reply = document.getElementById(id);
                newElement.appendChild(reply);
                document.replaceChild(newElement, oldElement);

            }
        </script>
    <?php
    }
    ?>


        <?php
    include_once __DIR__ . '/../footer.php';
    ?>
    </div>

</body>

</html>
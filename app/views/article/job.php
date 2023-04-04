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

    <div class="container">
        <div id="jobs" class="row">

        </div>
    </div>

    <script>
        function loadData() {
            const jobdiv = document.getElementById("jobs");
            jobdiv.innerHTML = "";

            fetch("http://localhost/api/job")
                .then(response => response.json())
                .then((jobs) => {
                    jobs.forEach(job => {
                        appendJob(job);
                    })
                })
        }

        function appendJob(job) {
            const jobdiv = document.getElementById("jobs");
            const card = document.createElement("div");
            card.classList.add("card");
            card.classList.add("text-center");
            card.classList.add("col-3");
            card.classList.add("m-2");

            const header = document.createElement("div");
            body.classList.add("card-header");

            const title = document.createElement("h2");
            title.innerText = job.title;
            header.appendChild(title);
            card.appendChild(header);

            const body = document.createElement("div");
            body.classList.add("card-body");

            const content = document.createElement("p");
            content.innerText = job.content;
            body.appendChild(content);

            const salary = document.createElement("p");
            salary.innerText = job.salary;
            body.appendChild(salary);
            card.appendChild(body);

            const footer = document.createElement("div");
            footer.classList.add("card-footer");

            const form = document.createElement("form");
            form.action = "/repondToJob";
            form.method = "POST";

            const input = document.createElement("input");
            input.classList.add("form-control");
            input.name = "inputReply";
            input.id = job.id;
            form.appendChild(input);

            const input2 = document.createElement("input");
            input2.type = "text";
            input2.name = "article_id";
            input2.value = job.id;
            input2.hidden = true;
            form.appendChild(input2);

            const input3 = document.createElement("input");
            input3.type = "text";
            input3.name = "author";
            input3.value = job.author;
            input3.hidden = true;
            form.appendChild(input3);

            const input4 = document.createElement("input");
            input4.type = "text";
            input4.name = "title";
            input4.value = job.title;
            input4.hidden = true;
            form.appendChild(input4);

            const input5 = document.createElement("input");
            input5.type = "submit";
            input5.name = "replyBtn";
            input5.value = "send job";
            input5.classList.add("btn");
            input5.classList.add("btn-primary");
            form.appendChild(input5);
            footer.appendChild(form);
            card.appendChild(footer);
            jobdiv.appendChild(card);

        }
loadData();
    </script>



    <?php
    foreach ($model as $article) {
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
    include_once __DIR__ . '/../footer.php';
    ?>
    </div>

</body>

</html>
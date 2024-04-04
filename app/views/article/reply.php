
    <?php
    
    include_once __DIR__ . '/../header.php';
    ?>

    <h1>Offer Status</h1>
    <br>

    <div class="container">
        <div id="replys" class="row">
        <script>

        function loadData() {
            const replyDiv = document.getElementById("replys");
            replyDiv.innerHTML = "";

            fetch('api/reply')
                .then(result => result.json())
                .then((replys) => {
                    replys.forEach(reply => {
                        appendReply(reply);
                    });
                    console.log(replys);
                })
        }
        function appendReply(reply) {
            const replyDiv = document.getElementById("replys");
            const replyCard = document.createElement("div");
            replyCard.classList.add("card");
            replyCard.classList.add("col-11");
            replyCard.classList.add("m-2");

            const cardbody = document.createElement("div");
            cardbody.classList.add("card-body");

            const content = document.createElement("p");
            content.innerText = reply.content;
            cardbody.appendChild(content);

            const cardfooter = document.createElement("div");
            cardfooter.classList.add("card-footer");

            const acceptButton = document.createElement("button");
            acceptButton.classList.add("acceptBtn");
            acceptButton.classList.add("btn");
            acceptButton.classList.add("btn-success");
            acceptButton.innerText = "Accept";
            cardbody.appendChild(acceptButton);
            acceptButton.addEventListener("click", () => {
                acceptReply(reply.id);
                replyDiv.removeChild(replyCard);
            });

            const declineButton = document.createElement("button");
            declineButton.classList.add("declineBtn");
            declineButton.classList.add("btn");
            declineButton.classList.add("btn-danger");
            declineButton.innerText = "Decline";
            cardbody.appendChild(declineButton);
            declineButton.addEventListener("click", () => {
                removeReply(reply.id);
                replyDiv.removeChild(replyCard);
            });

            replyCard.appendChild(cardbody);
            replyDiv.appendChild(replyCard);

        }


        loadData();

        function removeReply(id) {
            const object = {
                id: id
            }
            fetch('api/reply/decline', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(object)
            })
        }
        function acceptReply(id) {
            const object = {
                id: id
            }
            fetch('api/reply/accept', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(object)
            })
        }

    </script>


        </div>
    </div>
    <?php
    include __DIR__ . '/../footer.php';
    ?>
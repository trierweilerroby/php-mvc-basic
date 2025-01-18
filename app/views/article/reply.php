<?php include_once __DIR__ . '/../header.php'; ?>

<div class="container mx-auto my-8">
    <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Offer Status</h1>

    <div id="loadingMessage" class="text-center text-gray-600 mb-6">
        Loading replies, please wait...
    </div>

    <div id="replys" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Reply cards will be dynamically appended here -->
    </div>
</div>

<script>
    function loadData() {
        const replyDiv = document.getElementById("replys");
        const loadingMessage = document.getElementById("loadingMessage");
        replyDiv.innerHTML = "";

        fetch('api/reply')
            .then(result => result.json())
            .then((replys) => {
                loadingMessage.style.display = 'none'; // Hide loading message

                if (replys.length === 0) {
                    replyDiv.innerHTML = "<p class='text-center text-gray-500'>No current replies available.</p>";
                } else {
                    replys.forEach(reply => {
                        appendReply(reply);
                    });
                }
            })
            .catch(error => {
                loadingMessage.innerHTML = `<p class='text-red-500'>An error occurred: ${error.message}</p>`;
            });
    }

    function appendReply(reply) {
        const replyDiv = document.getElementById("replys");

        // Card element
        const replyCard = document.createElement("div");
        replyCard.classList.add("bg-white", "rounded-lg", "shadow-lg", "p-6", "transition", "hover:shadow-xl");

        // Reply content
        const content = document.createElement("p");
        content.classList.add("text-gray-700", "mb-4");
        content.innerText = reply.content;
        replyCard.appendChild(content);

        // Button container
        const buttonContainer = document.createElement("div");
        buttonContainer.classList.add("flex", "justify-center", "gap-4");

        // Accept Button
        const acceptButton = document.createElement("button");
        acceptButton.classList.add("btn", "btn-success", "px-4", "py-2", "rounded-lg");
        acceptButton.innerText = "Accept";
        acceptButton.addEventListener("click", () => {
            acceptReply(reply.id);
            replyDiv.removeChild(replyCard);
        });

        // Decline Button
        const declineButton = document.createElement("button");
        declineButton.classList.add("btn", "btn-danger", "px-4", "py-2", "rounded-lg");
        declineButton.innerText = "Decline";
        declineButton.addEventListener("click", () => {
            removeReply(reply.id);
            replyDiv.removeChild(replyCard);
        });

        buttonContainer.appendChild(acceptButton);
        buttonContainer.appendChild(declineButton);
        replyCard.appendChild(buttonContainer);

        replyDiv.appendChild(replyCard);
    }

    // Load data when the page loads
    document.addEventListener('DOMContentLoaded', loadData);

    function removeReply(id) {
        const object = { id: id };
        fetch('api/reply/decline', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(object)
        })
        .then(() => {
            alert('Reply declined.');
        })
        .catch(error => {
            alert('Error declining reply: ' + error.message);
        });
    }

    function acceptReply(id) {
        const object = { id: id };
        fetch('api/reply/accept', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(object)
        })
        .then(() => {
            alert('Reply accepted.');
        })
        .catch(error => {
            alert('Error accepting reply: ' + error.message);
        });
    }
</script>

<?php include __DIR__ . '/../footer.php'; ?>

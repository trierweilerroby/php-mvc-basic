<?php
require_once __DIR__ . '/../services/replyservice.php';
require_once __DIR__ . '/../models/reply.php';

class ReplyController
{
    private $replyService;

    // Constructor for dependency injection
    public function __construct()
    {
        $this->replyService = new ReplyService();
    }

    // Render the reply view
    public function reply()
    {
        require_once __DIR__ . '/../views/article/reply.php';
    }

    // Get user and author replies and load the view
    public function getUserAndAuthor()
    {
        $replies = $this->replyService->getUserAndAuthor();
        require_once __DIR__ . '/../views/article/reply.php';
    }

    // Get pending requests and load the request view
    public function request()
    {
        $replies = $this->replyService->getRequests();
        require_once __DIR__ . '/../views/user/request.php';
    }

    // Get all accepted replies for a user
    public function getYourAccepted($user_id)
    {
        $replies = $this->replyService->getYourAccepted($user_id);
        require_once __DIR__ . '/../views/user/request.php';
    }

    // Submit a reply for a job offer
    public function replyJob()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['replyBtn'])) {
            $reply = new Reply();
            $reply->setContent(htmlspecialchars($_POST['content']));
            $reply->setReplyFrom(htmlspecialchars($_POST['reply_from']));
            $reply->setReplyTo(htmlspecialchars($_POST['reply_to']));
            $reply->setPostedAt(htmlspecialchars($_POST['posted_at']));
            $reply->setArticleId(htmlspecialchars($_POST['article_id']));

            $this->replyService->replyJob($reply);

            exit;
        }
    }

    // Accept a reply
    public function accept()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acceptBtn'])) {
            $reply = new Reply();
            $reply->setAccept(htmlspecialchars($_POST['accept']));

            $this->replyService->acceptReply($reply);

            // Redirect to reply page with success
            header('Location: /reply?status=accepted');
            exit;
        }
    }

    // Decline a reply
    public function decline()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['declineBtn'])) {
            $reply = new Reply();
            $reply->setAccept(htmlspecialchars($_POST['accept']));

            $this->replyService->declineReply($reply);

            // Redirect to reply page with success
            header('Location: /reply?status=declined');
            exit;
        }
    }

    // Get all pending replies
    public function getAllPending()
    {
        $replies = $this->replyService->getAllPending();
        require_once __DIR__ . '/../views/article/reply.php';
    }
}

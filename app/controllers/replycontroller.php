<?php
require_once __DIR__ . '/../services/replyservice.php';

class replyController
{
    private $replyService;
    public function reply()
    {
        require_once __DIR__ . '/../views/article/reply.php';
    }
    public function getUserandAuthor()
    {
        $replys = $this->replyService->getUserandAuthor();
        require_once __DIR__ . '/../views/article/reply.php';
    }
    public function request(){
        require_once __DIR__ . '/../views/user/request.php'; 
    }

    function replyJob()
    {
        $reply = new Reply();
        if (isset($_POST['replyBtn'])) {
            $reply->setContent(htmlspecialchars($_POST['content']));
            $reply->setReply_from(htmlspecialchars($_POST['reply_from']));
            $reply->setReply_to(htmlspecialchars($_POST['reply_to']));
            $reply->setPosted_at(htmlspecialchars($_POST['posted_at']));
            $reply->setArticle_id(htmlspecialchars($_POST['article_id']));
            $this->replyService->replyjob($reply);

            echo "<script>location.href='/reply'</script>";
        }
    }

    function accept(){
        $reply = new Reply();
        if (isset($_POST['acceptBtn'])) {
            $reply->setAccept(htmlspecialchars($_POST['accept']));
            $this->replyService->acceptReply($reply);

            echo "<script>location.href='/reply'</script>";
        }
    }
    function decline(){
        $reply = new Reply();
        if (isset($_POST['declineBtn'])) {
            $reply->setAccept(htmlspecialchars($_POST['accept']));
            $this->replyService->declineReply($reply);

            echo "<script>location.href='/reply'</script>";
        }
    }


}
?>
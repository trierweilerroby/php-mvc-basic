<?php
require_once __DIR__ . '/../services/articleservice.php';
require_once __DIR__ .'/../models/article.php';

class ArticleController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $model = $this->articleService->getAll();


        require_once __DIR__ . '/../views/article/job.php';
    }
    public function createArticle()
    {
        require_once __DIR__ . '/../views/management/articlemanagement.php';
    }


    public function respondToJob()
    {
       $articleID = $_POST['article_id'];
       $userID = $_SESSION['user']['id'];
       $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['inputReply'];

        require_once __DIR__ . ' /../models/reply.php';
        $reply = new Reply();
        $reply->setArticle_id($articleID);
        $reply->setReply_from($userID);
        $reply->setReply_to($author);
        $reply->setTitle($title);
        $reply->setContent($content);

        require_once __DIR__ . '/../services/replyservice.php';

        $replyService = new ReplyService();
        $replyService->replyJob($reply);

        header('Location: /article');

    }
}
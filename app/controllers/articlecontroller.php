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
        $articles = $this->articleService->getAll();
        require_once __DIR__ . '/../views/article/job.php';
    }
    public function createArticle()
    {
        require_once __DIR__ . '/../views/management/articlemanagement.php';
    }
    public function manageArticle()
    {
        $model = $this->articleService->getAll();
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
        $reply->setArticle_title($title);
        $reply->setContent($content);

        require_once __DIR__ . '/../services/replyservice.php';

        $replyService = new ReplyService();
        $replyService->replyJob($reply);

        header('Location: /article');

    }
    function createArticleJob()
    {
        $article = new Article();
        if (isset($_POST['createArticleBtn'])) {
            $article->setTitle(htmlspecialchars($_POST['title']));
            $article->setContent(htmlspecialchars($_POST['content']));
            $article->setSalary(htmlspecialchars($_POST['salary']));
            $article->setAuthor(htmlspecialchars($_POST['author']));
            $this->articleService->createArticle($article);

            echo "<script>location.href='/article'</script>";
        }
    }
    public function deleteArticle()
    {
        $article = new Article();
        if (isset($_POST['deleteArticleBtn'])) {
            $article->setId(htmlspecialchars($_POST['id']));
            $this->articleService->deleteArticle($article);

            echo "<script>location.href='/jobmanagement'</script>";
        }
    }
}
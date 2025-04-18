<?php
require_once __DIR__ . '/../services/articleservice.php';
require_once __DIR__ . '/../models/article.php';
require_once __DIR__ . '/../repositories/jobtyperepository.php'; // ✅ FIXED PATH

class ArticleController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index()
    {
        $articles = $this->articleService->getTypeArticle();
        require_once __DIR__ . '/../views/article/job.php';
    }

    public function userArticle()
    {
        $articles = $this->articleService->getUserArticle();
        require_once __DIR__ . '/../views/article/userarticle.php';
    }

    public function createArticle()
    {
        require_once __DIR__ . '/../views/management/articlemanagement.php';
    }

    public function manageArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addArticleBtn'])) {
            $this->createArticleJob();
            return; // stop execution and redirect
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteArticleBtn'])) {
            $this->deleteArticle();
            return;
        }
    
        $model = $this->articleService->getAll();
        $userArticle = $this->articleService->getUserArticle();
    
        // ✅ Dynamically load job types from DB
        $jobTypeRepo = new JobTypeRepository();
        $jobTypes = $jobTypeRepo->getAll();
    
        require_once __DIR__ . '/../views/management/articlemanagement.php';
    }
    

    public function respondToJob()
    {
        $articleID = $_POST['article_id'];
        $userID = $_SESSION['user']['id'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['inputReply'];

        require_once __DIR__ . '/../models/reply.php';
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
        try {
            $article = new Article();
    
            if (isset($_POST['addArticleBtn'])) {
                $article->setTitle(htmlspecialchars($_POST['title']));
                $article->setContent(htmlspecialchars($_POST['content']));
                $article->setSalary((int)$_POST['salary']);
                $article->setAuthor((int)$_POST['author']);
                $article->setArticleType((int)$_POST['article_type']);
    
                $this->articleService->createArticle($article);
    
                header("Location: /jobmanagement");
                exit;
            }
        } catch (Exception $e) {
            echo "❌ Error: " . $e->getMessage();
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

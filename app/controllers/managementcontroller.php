<?php
require_once __DIR__ . '/../services/articleservice.php';
require_once __DIR__ .'/../models/article.php';
class ManagementController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function manageuser()
    {
        require_once __DIR__ . '/../views/management/usermanagement.php';
    }
    public function edituser()
    {
        require_once __DIR__ . '/../views/management/edituser.php';
    }
    public function managearticle()
    {
        $model = $this->articleService->getAll();
        require_once __DIR__ . '/../views/management/articlemanagement.php';
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
?>
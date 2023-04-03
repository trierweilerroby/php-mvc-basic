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
}
?>
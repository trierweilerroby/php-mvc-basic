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
}
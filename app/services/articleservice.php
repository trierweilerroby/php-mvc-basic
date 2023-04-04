<?php
require_once __DIR__ . '/../repositories/articlerepository.php';

class ArticleService {
    public function getAll() {
        $repository = new ArticleRepository();
        return $repository->getAll();
    }
    public function createArticle($article){
        $repository = new ArticleRepository();
        return $repository->createArticle($article);
    }
}
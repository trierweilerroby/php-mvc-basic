<?php
require_once __DIR__ . '/../repositories/articlerepository.php';

class ArticleService {
    public function getAll() {
        $repository = new ArticleRepository();
        return $repository->getAll();
    }
    public function getUserArticle(){
        $repository = new ArticleRepository();
        return $repository->getUserArticle();
    }
    public function createArticle($article){
        $repository = new ArticleRepository();
        return $repository->createArticle($article);
    }
    public function deleteArticle($article_id){
        $repository = new ArticleRepository();
        return $repository->deleteArticle($article_id);
    }
}
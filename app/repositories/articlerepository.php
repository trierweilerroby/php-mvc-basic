<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/article.php';

class ArticleRepository extends Repository {

    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT a.*, u.firstname as author_firstname, u.lastname as author_lastname FROM article as a join user as u on a.author = u.id");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function deleteArticle(){
        $deletequery = "DELETE FROM article WHERE id = :id";

        $id = htmlspecialchars($_POST['id']);
        $deletestatement = $this->connection->prepare($deletequery);
        $deletestatement->bindParam(':id',$id);
        $deletestatement->execute();
    }
    function relpyArticle(){
        $replyquery = "INSERT INTO reply (article_id, user_id, reply) VALUES (:article_id, :user_id, :reply)";

        $article_id = htmlspecialchars($_POST['article_id']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $reply = htmlspecialchars($_POST['reply']);

        $replystatement = $this->connection->prepare($replyquery);
        $replystatement->bindParam(':article_id',$article_id);
        $replystatement->bindParam(':user_id',$user_id);
        $replystatement->bindParam(':reply',$reply);
        $replystatement->execute();
    }
}   
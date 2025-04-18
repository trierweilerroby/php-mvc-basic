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

    function getTypeArticle(){
        try {
            $stmt = $this->connection->prepare("SELECT a.*, u.firstname as author_firstname, u.lastname as author_lastname FROM article as a JOIN user as u ON a.author = u.id WHERE a.article_type = IF(:type_id = 0, a.article_type, :type_id)");
            $stmt->bindParam(':type_id', $_SESSION['user']['jobsearch'], PDO::PARAM_STR);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function getUserArticle(){
        try {
            $stmt = $this->connection->prepare("SELECT a.*, u.firstname as author_firstname, u.lastname as author_lastname FROM article as a join user as u on a.author = u.id WHERE author = :author");
            $stmt->bindParam(':author', $_SESSION['user']['id'], PDO::PARAM_STR);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function createArticle($article)
    {
        try {
            $title = $article->getTitle();
            $content = $article->getContent();
            $author = $article->getAuthor();
            $salary = $article->getSalary();
            $article_type = $article->getArticleType();

            $stmt = $this->connection->prepare('
            INSERT INTO article (title, content, author, posted_at, salary, article_type)
            VALUES (:title, :content, :author, now(), :salary, :article_type);
        ');
        
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':author', $author, PDO::PARAM_INT);
            $stmt->bindParam(':salary', $salary, PDO::PARAM_INT);
            $stmt->bindParam(':article_type', $article_type, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Creating article failed!!!" . $e->getMessage();
        }

    }

    function deleteArticle($article_id){
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
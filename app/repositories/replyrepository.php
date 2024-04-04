<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/reply.php';

class ReplyRepository extends Repository {

    function getAllPending() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reply where accept=0;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $replys = $stmt->fetchAll();

            return $replys;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    public function getUserAndAuthor($user_id){
        try{
            $stmt = $this->connection->prepare("SELECT reply.*, user.firstname, user.lastname, user.email FROM reply JOIN user ON reply.reply_from=user.id where reply_to=:reply_to AND accept = 0;");
            $stmt->bindParam(':reply_to', $user_id, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $replys = $stmt->fetchAll();

            return $replys;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    public function getAcceppted(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reply where accept='1';");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }

    }
    public function getYourAccepted($user_id){
        try{         
            $stmt = $this->connection->prepare("SELECT * FROM `reply` WHERE reply_to = :reply_from AND accept = 1;");
            $stmt->bindParam(':reply_from', $user_id, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $replys = $stmt->fetchAll();

            return $replys;
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
    public function replyJob($reply) {
        try {

            $content = $reply->getContent();
            $reply_from = $reply->getReply_from();
            $reply_to = $reply->getReply_to();
            $article_id = $reply->getArticle_id();

            $stmt = $this->connection->prepare("INSERT INTO `reply`(`content`, `reply_from`, `reply_to`, `posted_at`, `article_id`, `accept`) VALUES (:content, :reply_from, :reply_to, now(), :article_id, 0);");
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':reply_from', $reply_from, PDO::PARAM_STR);
            $stmt->bindParam(':reply_to', $reply_to, PDO::PARAM_STR);
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function acceptReply($reply_id) {
        try {
            $stmt = $this->connection->prepare("UPDATE `reply` SET `accept`='1' WHERE `id`=:reply_id;");
            $stmt->bindParam(':reply_id', $reply_id, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    public function declineReply($reply_id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `reply` WHERE `id`=:reply_id;");
            $stmt->bindParam(':reply_id', $reply_id, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

   /* public function getAll(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reply;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $replys = $stmt->fetchAll();

            return $replys;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }*/

}
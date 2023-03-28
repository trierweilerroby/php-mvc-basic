<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/reply.php';

class ReplyRepository extends Repository {

    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reply");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reply');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    function getAcceppted(){
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
}
<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/type.php';

class TypeRepository extends Repository
{

function GetAllTypes(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM usertype");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e) {
            echo $e;
        }
    }}
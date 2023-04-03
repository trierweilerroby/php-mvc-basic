<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/jobType.php';

class JobTypeRepository extends Repository
{

function GetAllJobTypes(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM jobTypes");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'JobType');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e) {
            echo $e;
        }
    }}
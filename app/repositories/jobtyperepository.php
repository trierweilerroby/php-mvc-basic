<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/jobType.php';

class JobTypeRepository extends Repository
{
    public function getAll(): array {
        $stmt = $this->connection->prepare("SELECT * FROM jobTypes");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'JobType');
        return $stmt->fetchAll();
    }
}

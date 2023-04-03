<?php
require_once __DIR__ . '/../repositories/jobtyperepository.php';

class JobTypeService {
    private $repository;
    function __construct(){
        $this->repository = new JobTypeRepository();
    }
    public function getAllJobTypes() {
        return $this->repository->getAllJobTypes();
    }
}
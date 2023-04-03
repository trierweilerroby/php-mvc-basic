<?php
require_once __DIR__ . '/../repositories/typerepository.php';

class TypeService {
    private $repository;
    function __construct(){
        $this->repository = new TypeRepository();
    }
    public function getAllTypes() {
        return $this->repository->getAllTypes();
    }
}
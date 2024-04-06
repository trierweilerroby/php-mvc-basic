<?php
require_once __DIR__ . '/../repositories/userrepository.php';

class UserService {
    private $repository;
    function __construct(){
        $this->repository = new UserRepository();
    }
    public function getAll() {
        return $this->repository->getAll();
    }
    public function getUserById($user_id){
        return $this->repository->getUserById($user_id);
    }
    public function signupUser($user){
        return $this->repository->signupUser($user);
    }
    public function addUser($user){
        return $this->repository->signupUser($user);
    }
    public function editUser($user){
        return $this->repository->editUser($user);
    }
    public function findUserByEmail($email,$password){
        return $this->repository->findUserByEmail($email,$password);
    }
    public function deleteUser($user_id){
        $repository = new UserRepository();
        return $repository->deleteUser($user_id);
    }




}
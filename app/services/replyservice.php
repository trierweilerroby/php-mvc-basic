<?php
require_once __DIR__ . '/../repositories/replyrepository.php';

class ReplyService {
    private $repository;
    function __construct(){
        $this->repository = new ReplyRepository();
    }

    public function replyJob($reply) {
        return $this->repository->replyJob($reply);
    }
    public function acceptReply($reply_id){
        return $this->repository->acceptReply($reply_id);
    }
    public function declineReply($reply_id){
        return $this->repository->declineReply($reply_id);
    }

    public function getAll() {
        return $this->repository->getAll();
    }
    public function getByUserAndAuthor($user_id){
        return $this->repository->getUserAndAuthor($user_id);
    }
    public function getAccepted(){
        return $this->repository->getAcceppted();
    }
    public function getYourAccepted($user_id){
        return $this->repository->getYourAccepted($user_id);
    }


}
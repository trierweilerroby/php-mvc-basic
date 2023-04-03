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

}
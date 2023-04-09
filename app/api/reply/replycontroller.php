<?php
include_once(__DIR__ . "/../../services/replyservice.php");
include_once(__DIR__ . "/../../models/reply.php");
class ReplyControllerApi
{
    private $repository;

    function __construct()
    {
        $this->repository = new ReplyService();
    }
    public function getAllApi()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers: *');

        $replys = $this->repository->getByUserAndAuthor($_SESSION['user']['id']);
        header('Content-Type: application/json');
        echo json_encode($replys);
    }

    public function delete(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers: *');

        $body = file_get_contents('php://input');
        $obj = json_decode($body);

        $this->repository->declineReply($obj->id);

    }


    public function update(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers: *');

        $body = file_get_contents('php://input');
        $accept = json_decode($body);

        $this->repository->acceptReply($accept->id);
    }


}

?>
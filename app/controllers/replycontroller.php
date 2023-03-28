<?php
class replyController
{

    public function reply()
    {
        require_once __DIR__ . '/../views/article/reply.php';
    }
    public function request(){
        require_once __DIR__ . '/../views/user/request.php'; 
    }
}
?>
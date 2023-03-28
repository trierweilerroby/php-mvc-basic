<?php
class HomeController
{

    public function index()
    {
        //session_start();
        require_once __DIR__ . '/../models/user.php';
        $user = $_SESSION['user'];
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../views/home/about.php';
    }
}
?>
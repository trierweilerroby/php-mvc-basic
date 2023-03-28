<?php
class ManagementController
{

    public function manageuser()
    {
        require_once __DIR__ . '/../views/management/usermanagement.php';
    }
    public function edituser()
    {
        require_once __DIR__ . '/../views/management/edituser.php';
    }
    public function managearticle()
    {
        require_once __DIR__ . '/../views/management/articlemanagement.php';
    }
}
?>
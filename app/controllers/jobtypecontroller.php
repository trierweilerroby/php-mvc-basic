<?php
require_once __DIR__ . '/../services/typeservice.php';

class JobtypeController
{
    private $typeService;

    function __construct()
    {
        $this->typeService = new typeService();
    }
    function getAllJobTypes()
    {
        $types = $this->typeService->getAllJobTypes();
        require_once __DIR__ . '/../views/user/signup.php';
    }
}
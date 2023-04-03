<?php
require_once __DIR__ . '/../services/typeservice.php';

class TypeController
{
    private $typeService;

    function __construct()
    {
        $this->typeService = new typeService();
    }
    function getAllTypes()
    {
        $types = $this->typeService->getAllTypes();
        require_once __DIR__ . '/../views/user/signup.php';
    }
}
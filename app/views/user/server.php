<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['loginBtn']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $userService = new UserService();
    $user = $userService->findUserByEmail($email,$password);
    //$hashedPassword = $user->getPassword();
    if($user != null)
    {
        $_SESSION['user'] = $user;

        header('location: /home');
    }
}
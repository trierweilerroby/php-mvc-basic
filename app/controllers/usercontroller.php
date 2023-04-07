<?php
require_once __DIR__ . '/../services/userservice.php';

class UserController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }
    public function getAll()
    {
        $users = $this->userService->getAll();
        require_once __DIR__ . '/../views/management/usermanagement.php';
    }
    public function showLoginPage()
    {
        require_once __DIR__ . '/../views/user/login.php';
    }
    public function login()
    {
        require_once(__DIR__ . '/../models/user.php');

        if (isset($_POST['loginBtn'])) {
            $user = new User();
            $user = $this->userService->findUserByEmail(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
            $_SESSION['user'] = array(
                'id' => $user->getId(),
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'email' => $user->getEmail(),
                'type_id' => $user->getType_id(),
                'password' => $user->getPassword(),
                'jobsearch' => $user->getJob_type(),
                'jobname' => $user->getJob_name(),
                'certificate' => $user->getCertificate()
            );
            header('Location: /home');
        }
    }
    public function signup()
    {
        require_once __DIR__ . '/../views/user/signup.php';
    }
    public function userinformation()
    {
        require_once __DIR__ . '/../views/user/userinformation.php';
    }
    public function edit()
    {
        require_once __DIR__ . '/../views/user/edituser.php';
    }
    public function logout()
    {
        session_destroy();
        header('Location: /home');
        require_once(__DIR__ . '/../views/header.php');
    }
    public function changePassword()
    {
        require_once __DIR__ . '/../views/user/changePassword.php';
    }

    function signupUser()
    {
        $user = new User();
        if (isset($_POST['signupBtn'])) {
            $user->setEmail(htmlspecialchars($_POST['email']));
            $user->setPassword(password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT));
            $user->setFirstName(htmlspecialchars($_POST['firstname']));
            $user->setLastName(htmlspecialchars($_POST['lastname']));
            $user->setType_id(htmlspecialchars($_POST['type_id']));
            $this->userService->signupUser($user);

            echo "<script>location.href='/login'</script>";
        }
    }
    function editUser()
    {
        if (isset($_POST['editUserBtn'])) {
            $user = new User();
            $user->setId(htmlspecialchars($_POST['id']));
            $user->setFirstName(htmlspecialchars($_POST['firstname']));
            $user->setLastName(htmlspecialchars($_POST['lastname']));
            $user->setEmail(htmlspecialchars($_POST['email']));
            $user->setJobsearch(htmlspecialchars($_POST['jobsearch']));
            $user->setCertificate(htmlspecialchars($_POST['certificate']));
            $this->userService->editUser($user);
            echo "<script>location.href='/userinformation'</script>";
        }
    }
}
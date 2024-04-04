<?php
require_once __DIR__ . '/../services/userservice.php';

class UserController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }
    public function manageUsers()
    {
        $users = $this->userService->getAll();
        require_once __DIR__ . '/../views/management/usermanagement.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUserBtn'])) {
            $this->addUser();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteUserBtn'])) {
            $this->delUser();
        }


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

    public function logout()
    {
        session_destroy();
        header('Location: /home');
        require_once(__DIR__ . '/../views/header.php');
    }
    public function changePassword()
    {
        require_once __DIR__ . '/../views/user/changePassword.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUserBtn'])) {
            $this->editUser();
        }
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
            $user->setJob_type(htmlspecialchars($_POST['job_type']));
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
            $user->setPassword(password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT));
            $this->userService->editUser($user);

            $_SESSION['user'] = array(
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
            );
    
            echo "<script>location.href='/userinformation'</script>";
        }
    }

    function addUser()
    {

        $user = new User();
        if (isset($_POST['addUserBtn'])) {
            $user->setEmail(htmlspecialchars($_POST['email']));
            $user->setPassword(password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT));
            $user->setFirstName(htmlspecialchars($_POST['firstname']));
            $user->setLastName(htmlspecialchars($_POST['lastname']));
            $user->setType_id(htmlspecialchars($_POST['type_id']));
            $user->setJob_type(htmlspecialchars($_POST['job_type']));
            $this->userService->addUser($user);
            echo "<script>location.href='/usermanagement'</script>";

        }
    }

    function delUser()
    {

        $user = new User();
        if (isset($_POST['deleteUserBtn'])) {
            $user->setId(htmlspecialchars($_POST['id']));
            $this->userService->deleteUser($user);

            echo "<script>location.href='/usermanagement'</script> <p>del</p>";

        }
    }
}
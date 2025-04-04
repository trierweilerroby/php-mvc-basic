<?php
class SwitchRouter
{
    public function route($uri)
    {

        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case 'api/reply':
                require_once __DIR__ . '/../api/reply/replycontroller.php';
                $controller = new ReplyControllerApi();
                $controller->getAllApi();
                break;
            case 'api/reply/accept':
                require_once __DIR__ . '/../api/reply/replycontroller.php';
                $controller = new ReplyControllerApi();
                $controller->update();
                break;
            case 'api/reply/decline':
                require_once __DIR__ . '/../api/reply/replycontroller.php';
                $controller = new ReplyControllerApi();
                $controller->delete();
                break;
            case 'api/article':
                require_once __DIR__ . '/../api/article/articlecontroller.php';
                $controller = new ArticleControllerApi();
                $controller->getAll();
                break;
            case 'login':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    //show login page
                    $controller->showLoginPage();
                } else {
                    $controller->login();
                }
                break;
            case 'logout':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->logout();
                break;
            case 'home':
            case '':
                //realpath($_SERVER['DOCUMENT_ROOT'])
                require_once __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;
            case 'home/about':
                require_once __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->about();
                break;
            case 'repondToJob':
                require_once __DIR__ . '/../controllers/articlecontroller.php';
                $controller = new ArticleController();
                $controller->respondToJob();
                break;

            case 'article':
                require_once __DIR__ . '/../controllers/articlecontroller.php';
                $controller = new ArticleController();
                $controller->index();
                break;
            case 'signup':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->signup();
                break;
            case 'signupUser':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->signupUser();
                break;
            case 'usermanagement':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->manageUsers();
                break;
            case 'jobmanagement':
                require_once __DIR__ . '/../controllers/articlecontroller.php';
                $controller = new articleController();
                $controller->manageArticle();
                break;
            case 'reply':
                require_once __DIR__ . '/../controllers/replycontroller.php';
                $controller = new ReplyController();
                $controller->reply();
                break;
            case 'userinformation':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->userinformation();
                break;
            case 'changePassword':
                require_once __DIR__ . '/../controllers/usercontroller.php';
                $controller = new UserController();
                $controller->changePassword();
                break;
            case 'request':
                require_once __DIR__ . '/../controllers/replycontroller.php';
                $controller = new ReplyController();
                $controller->getYourReply($_SESSION['user']['id']);
                break;



            default:
                http_response_code(404);
                break;
        }

    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}
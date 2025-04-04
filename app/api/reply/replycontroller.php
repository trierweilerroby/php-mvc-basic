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

    public function getAllApi() {
        header('Content-Type: application/json');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized – no user session']);
            exit;
        }

        try {
            $userId = $_SESSION['user']['id'];
            $replies = $this->repository->getByUserAndAuthor($userId);
            echo json_encode($replies);
        } catch (Exception $e) {
            echo json_encode([
                'error' => 'Could not fetch employer replies',
                'details' => $e->getMessage()
            ]);
        }

        exit;
    }

    // POST: Decline reply
    public function delete()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        header('Content-Type: application/json');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $body = file_get_contents('php://input');
        $obj = json_decode($body);

        if (isset($obj->id)) {
            $this->repository->declineReply($obj->id);
            echo json_encode(['message' => 'Reply declined']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data']);
        }

        exit;
    }

    // POST: Accept reply
    public function update()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        header('Content-Type: application/json');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $body = file_get_contents('php://input');
        $accept = json_decode($body);

        if (isset($accept->id)) {
            $this->repository->acceptReply($accept->id);
            echo json_encode(['message' => 'Reply accepted']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data']);
        }

        exit;
    }
}
?>

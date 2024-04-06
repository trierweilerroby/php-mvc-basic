<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT u.*, ut.job_type as job_name FROM user as u join jobTypes as ut on u.job_type = ut.id");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;

        } catch (PDOException $e) {
            echo $e;
        }
    }
    function getUserById($user_id){
        try {
            $stmt = $this->connection->prepare("SELECT password FROM user WHERE id = :id");
            $stmt->bindParam(':id', $user_id, PDO::PARAM_STR);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $password = $stmt->fetch();

            return $password;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
     function signupUser($user)
    {
        try {
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $type_id = $user->getType_id();
            $password = $user->getPassword();
            $job_type = $user->getJob_type();

            $stmt = $this->connection->prepare('INSERT INTO user (firstname, lastname,email, type_id,password,job_type) 
                                                    VALUES ( :firstname,:lastname, :email, :type_id, :password, :job_type);');
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':type_id', $type_id);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':job_type', $job_type, PDO::PARAM_INT);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Signing up failed!!!" . $e->getMessage();
        }

    }

    function editUser($user)
    {
        try {
            $id = $user->getId();
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $password = $user->getPassword();

            $stmt = $this->connection->prepare('UPDATE `user` SET `firstname`= :firstname,`lastname`= :lastname,`email`= :email, `password`= :password WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            error_log("Editing user details failed: " . $e->getMessage());
            throw new RuntimeException("Editing user details failed.", 500);        }

    }

    function findUserByEmail($email,$password)
    {
        $stmt = $this->connection->prepare("SELECT u.*, ut.job_type as job_name FROM user as u join jobTypes as ut on u.job_type = ut.id WHERE email=:email ");
        $stmt->BindParam(':email', $email);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();

        if (!$user) {
            return false;
        }
        else{
            $bool = password_verify($password, $user->getPassword());

            if ($bool) {
                return $user;
            } else {
                $errorMsg = "This is an error message.";
                error_log($errorMsg);
            }
        }

    }
    function deleteUser($user_id){
        $id = htmlspecialchars($user_id->getId());
    
        $deleteArticlesQuery = "DELETE FROM article WHERE author = :id";
        $deleteArticlesStatement = $this->connection->prepare($deleteArticlesQuery);
        $deleteArticlesStatement->bindParam(':id', $id);
        $deleteArticlesStatement->execute();
    
        $deleteRepliesQuery = "DELETE FROM reply WHERE reply_from = :id OR reply_to = :id";
        $deleteRepliesStatement = $this->connection->prepare($deleteRepliesQuery);
        $deleteRepliesStatement->bindParam(':id', $id);
        $deleteRepliesStatement->execute();

        $deleteUserQuery = "DELETE FROM user WHERE id = :id";
        $deleteUserStatement = $this->connection->prepare($deleteUserQuery);
        $deleteUserStatement->bindParam(':id', $id);
        $deleteUserStatement->execute();
    }
    


}
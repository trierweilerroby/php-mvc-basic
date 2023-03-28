<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{

    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e) {
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

            $stmt = $this->connection->prepare('INSERT INTO user (firstname, lastname,email, type_id,password) 
                                                    VALUES ( :firstname,:lastname, :email, :type_id, :password);');
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':type_id', $type_id);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Signing up failed!!!" . $e->getMessage();
        }

    }
    function editUser($user)
    {
        try {
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $type_id = $user->getType_id();
            $password = $user->getPassword();

            $stmt = $this->connection->prepare('UPDATE `user` SET `firstname`= :firstname,`lastname`= :lastname,`email`= :email,`type_id`= :type_id,`password`= :password,`jobsearch`= :jobsearch,`certificate`= :certificate WHERE 1');
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':type_id', $type_id);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Signing up failed!!!" . $e->getMessage();
        }

    }
    function findUserByEmail($email,$password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->BindParam(':email', $email);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();

        $bool = password_verify($password, $user->getPassword());

        if ($bool) {
            return $user;
        } else {
            echo '<script>alert("incorrect pass")</script>';;
        }

    }


}
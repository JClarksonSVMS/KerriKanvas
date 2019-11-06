
<?php

require_once('klogger.php');

class Dao {

    private $host = 'localhost';
    private $dbname = 'kerrika1_kerrikanvas';
    private $username = 'kerrika1_jerry';
    private $password = '27220423JKmrc';
    private $logger;

    public function __construct() {
        $this->logger = new KLogger("log.txt", KLogger::DEBUG);
    }

    public function getConnection() {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
        } catch (PDOException $e) {
            echo print_r($e, 1);
        }
        return $connection;
    }

    public function newUser($first_name, $last_name, $email, $password) {
        $conn = $this->getConnection();
        if ($password != null) {
            try {
                $newUser = "INSERT INTO user
                    (firstname, lastname, email, password)
                    VALUES
                    (:firstname, :lastname, :email, :password)";
                $q = $conn->prepare($newUser);
                $q->bindParam(":firstname", $first_name);
                $q->bindParam(":lastname", $last_name);
                $q->bindParam(":email", $email);
                $enc_password = hash('sha256', $password);
                $q->bindParam("password", $enc_password);
                $q->execute();
                return $conn->lastInsertId();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        } else {
            try {
                $newUser = "INSERT INTO user
                    (firstname, lastname, email)
                    VALUES
                    (:firstname, :lastname, :email)";
                $q = $conn->prepare($newUser);
                $q->bindParam(":firstname", $first_name);
                $q->bindParam(":lastname", $last_name);
                $q->bindParam(":email", $email);
                $q->execute();
                return $conn->lastInsertId();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
    }

    public function getUserID($first_name, $last_name) {
        $conn = $this->getConnection();
        try {
            $q = $conn->prepare("SELECT user_id FROM user WHERE firstname=:firstname AND lastname=:lastname");
            $q->bindParam("firstname", $first_name);
            $q->bindParam("lastname", $last_name);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $q->execute();
            $result = $q->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function saveMessage($first_name, $last_name, $message, $email, $password) {
        $conn = $this->getConnection();

        try {

            $user_id = $this->getUserID($first_name, $last_name);
            if ($user_id < 1) {
                $user_id = $this->newUser($first_name, $last_name, $email, $password);
            }
            $datetime = date("Y-m-d H:i:s");
            $saveQuery = "INSERT INTO messages
                (datetime, user_id, message)
                VALUES
                (:datetime, :user_id, :message)";
            $q = $conn->prepare($saveQuery);
            $q->bindParam(":datetime", $datetime);
            $q->bindParam(":user_id", $user_id);
            $q->bindParam(":message", $message);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $q->execute();
            $result = $q->fetchColumn();    
            return $result;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function saveOrder($first_name, $last_name, $email_from, $password, $media, $osize, $figures, $path, $billing, $message) {
        $conn = $this->getConnection();

        try {
            $user_id = $this->getUserID($first_name, $last_name);
            if ($user_id < 1) {
                $user_id = $this->newUser($first_name, $last_name, $email_from, $password);
            }
            $message_id = $this->saveMessage($first_name, $last_name, $message, $email_from, $password);

            $datetime = date("Y-m-d H:i:s");
            $orderQuery = "INSERT INTO ordering
                (user_id, message_id, datetime, media, size, figure, userphoto, billing)
                VALUES
                (:user_id, :message_id, :datetime, :media, :size, :figure, :userphoto, :billing)";
            $q = $conn->prepare($orderQuery);
            $q->bindParam(":user_id", $user_id);
            $q->bindParam(":message_id", $message_id);
            $q->bindParam(":datetime", $datetime);
            $q->bindParam(":media", $media);
            $q->bindParam(":size", $osize);
            $q->bindParam(":figure", $figures);
            $q->bindParam(":userphoto", $path);
            $q->bindParam(":billing", $billing);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $q->execute();
            $result = $q->fetchColumn();    
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function saveImageBlog($path, $img_alt, $imgText){
        $conn = $this->getConnection();

        try {
            $blogQuery = "INSERT INTO blog
                (image, alternate, entry)
                VALUES
                (:image, :alternate, :entry)";
            $q = $conn->prepare($blogQuery);
            $q->bindParam(":image", $path);
            $q->bindParam(":alternate", $img_alt);
            $q->bindParam(":entry", $imgText);
            $q->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    public function isEmail($email) {
        try {
            $conn = $this->getConnection();
            $q = $conn->prepare("SELECT user_id FROM users WHERE email=:email");
            $q->bindParam("email", $email);
            $q->execute();
            if ($q->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function Login($first_name, $last_name, $password) {
        try {
            $conn = $this->getConnection();
            $q = $conn->prepare("SELECT user_id FROM user WHERE ((firstname=:firstname AND lastname=:lastname) AND password=:password)");
            $q->bindParam("firstname", $first_name);
            $q->bindParam("lastname", $last_name);
            $enc_password = hash('sha256', $password);
            $q->bindParam("password", $enc_password);
            $q->execute();
            if ($q->rowCount() > 0) {
                $result = $q->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function UserDetails($user_id) {
        try {
            $conn = $this->getConnection();
            $q = $conn->prepare("SELECT user_id, firstname, lastname, email FROM users WHERE user_id=:user_id");
            $q->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $q->execute();
            if ($q->rowCount() > 0) {
                return $q->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getMessages() {
        $conn = $this->getConnection();
        try {
            return $conn->query("select message_id, message, date_entered  from message order by date_entered desc", PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo print_r($e, 1);
            exit;
        }
    }

    public function deleteMessage($id) {
        $conn = $this->getConnection();
        $deleteQuery = "delete from message where message_id = :id";
        $q = $conn->prepare($deleteQuery);
        $q->bindParam(":id", $id);
        $q->execute();
    }

    public function getImages() {
        $conn = $this->getConnection();
        return $conn->query("SELECT image_id, image, alternate, entry FROM blog");
    }

}

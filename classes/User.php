<?php
    require_once "Database.php";

    class User extends Database {
        public function register($request) {
            $first_name = $request['first_name'];
            $last_name  = $request['last_name'];
            $username   = $request['username'];
            $password   = password_hash($request['password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO `Users`(`first_name`, `last_name`, `username`, `password`) 
                    VALUES ('$first_name','$last_name','$username','$password');";
            
            if($this->conn->query($sql)) {
                header("location: ../views/login.php");
                exit;
            } else {
                die("Error Creating a new Account: ". $this->conn->error);
            }
        }

        public function login($request) {
            $username   = $request['username'];
            $password   = $request['password'];

            $sql = "SELECT * FROM `Users` WHERE `username` = '$username';";
            $result = $this->conn->query($sql);

            if($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if(password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['first_name']. " ".$user['last_name'];
                    
                    header("location: ../views/dashboard.php");
                    exit;
                } else {
                    die("Your password is wrong!");
                }
            } else {
                die("I can't find your username...");
            }
        }

        public function logout() {
            session_start();
            session_unset();
            session_destroy();

            header("location: ../views/login.php");
            exit;
        }
    } 
?>
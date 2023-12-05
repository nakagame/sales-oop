<?php
    include "Database.php";

    class Product extends Database {
        public function getAllProducts() {
            $sql = "SELECT * FROM `Products`;";
            
            if($result = $this->conn->query($sql)) {
                return $result;
            } else {
                header("location: ../views/error.php");
                exit; 
            }
        }

        public function getProduct($id) {
            $sql = "SELECT * FROM `Products` WHERE id = $id;";
            
            if($result = $this->conn->query($sql)) {
                return $result->fetch_assoc();
            } else {
                header("location: ../views/error.php");
                exit; 
            }
        }

        public function addProduct($request) {
            $product_name = $request['product_name'];
            $price        = $request['price'];
            $quantity     = $request['qty'];
            $user_id      = $_GET['id'];

            $sql = "INSERT INTO `Products`(`product_name`, `price`, `quantity`, `user_id`) 
                    VALUES ('$product_name','$price','$quantity','$user_id');";
            if($this->conn->query($sql)) {
                header("location: ../views/dashboard.php");
                exit;
            } else {
                header("location: ../views/error.php");
                exit; 
            }
        }

        public function editProduct($request) {
            session_start();

            $product_id   = $_GET['id'];
            $product_name = $request['product_name'];
            $price        = $request['price'];
            $quantity     = $request['quantity'];
            $user_id      = $_SESSION['id'];

            $sql = "UPDATE `Products` 
                    SET `product_name`='$product_name',`price`='$price',`quantity`='$quantity',`user_id`='$user_id' 
                    WHERE id = $product_id;";

            if($this->conn->query($sql)) {
                header("location: ../views/dashboard.php");
                exit;
            } else {
                header("location: ../views/error.php");
                exit; 
            }
        }

        public function deleteProdocut() {
            $product_id   = $_GET['id'];
            $sql = "DELETE FROM `Products` WHERE id = $product_id;";

            if($this->conn->query($sql)) {
                header("location: ../views/dashboard.php");
                exit;
            } else {
                header("location: ../views/error.php");
                exit; 
            }
        }

        public function payment($request) {
            $product_id   = $_GET['id'];
            $buy_quantity = $_GET['qty'];
            $payment      = $_POST['payment'];

            $prdouct = $this->getProduct($product_id);
            $total_price = $buy_quantity * $prdouct['price'];
            $rest_quantity = $prdouct['quantity'] - $buy_quantity;

            if($payment < $total_price ) {
                header("location: ../views/error.php");
                exit; 
            } else {
                $sql = "UPDATE `Products` SET `quantity` = $rest_quantity WHERE id = $product_id;";

                if($this->conn->query($sql)) {
                    header("location: ../views/dashboard.php");
                    exit;
                } else {
                    header("location: ../views/error.php");
                    exit;   
                }
            }
        }
    }
?>
<?php
    class User {

        public function select_users(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM user");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $user[$row['id']] = new stdClass;
                $user[$row['id']]->id = $row['id'];
                $user[$row['id']]->login = $row['login'];
                $user[$row['id']]->password_crypted = $row['password_crypted'];
                $user[$row['id']]->email = $row['email'];
                $user[$row['id']]->name = $row['name'];
                $user[$row['id']]->surname = $row['surname'];
                $user[$row['id']]->date_of_create = $row['date_of_create'];
                $user[$row['id']]->date_of_last_login = $row['date_of_last_login'];
                $user[$row['id']]->privillenges_id = $row['privillenges_id'];
                $user[$row['id']]->status = $row['status'];
            }

            return $user;
        }

        public function select_custom_users($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM user WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $user[$row['id']] = new stdClass;
                $user[$row['id']]->id = $row['id'];
                $user[$row['id']]->login = $row['login'];
                $user[$row['id']]->password_crypted = $row['password_crypted'];
                $user[$row['id']]->email = $row['email'];
                $user[$row['id']]->name = $row['name'];
                $user[$row['id']]->surname = $row['surname'];
                $user[$row['id']]->date_of_create = $row['date_of_create'];
                $user[$row['id']]->date_of_last_login = $row['date_of_last_login'];
                $user[$row['id']]->privillenges_id = $row['privillenges_id'];
                $user[$row['id']]->status = $row['status'];
            }

            return $user;
        }

        public function update_users($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE user SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_user($login, $password, $email, $name, $surname, $privilenges_id, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO user (login, password_crypted, email, name, surname, date_of_create, date_of_last_login, privillenges_id, status) 
                VALUES ('$login', '$password', '$email', '$name', '$surname', now(), now(), '$privilenges_id', '$status')");
            $stmt->execute();
        }
    }
?>
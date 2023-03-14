<?php
    ini_set("error_reporting", 0);
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';

    $type = $_POST["type"];

    if($type == "LOGIN"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
        
        $login = $_POST['login'];
        $password = $_POST['password'];
        $crypted_pass = md5($password);
        $user_id = null;
        $response = null;

        $user = new User();
        $data = $user->select_custom_users("email = '$login' AND password_crypted = '$crypted_pass'");

        if(count($data) > 0){
            foreach($data as $k => $v){
                $user_id = $v->id;
            }

            $current_date = date("Y-m-d H:i:s");
    
            $_SESSION['id_user'] = $user_id;
            $user->update_users("date_of_last_login", $current_date, $user_id);
            $user->update_users("status", 1, $user_id);
            $response = array("value" => true);
        }
        else  $response = array("value" => false, "message" => "Nieprawidłowy email lub hasło");
        

        echo json_encode($response);
        
    }
    if($type == "LOGOUT"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
        $user_id = $_SESSION['id_user'];

        $user = new User();
        $user->update_users("status", 0, $user_id);

        unset($_SESSION['user_id']);
        session_destroy();

        $response = array("value" => true);
        echo json_encode($response);
    }
?>
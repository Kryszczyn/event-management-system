<?php
    ini_set("error_reporting", 0);
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';

    $type = $_POST["type"];

    if($type == "REGISTER"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/User.php';
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $response = null;
        
        $user = new User();
        
        $check = $user->select_custom_users("email = '$email'");
        
        if(count($check) > 0){
            $response = array("result" => false, "message" => "Podany adres email jest już zajęty");
        }
        else{
            $user->insert_user($login, md5($password), $email, $name, $surname, 2, 1);
            $response = array("result" => true);
        }
        
        echo json_encode($response);
    }
?>
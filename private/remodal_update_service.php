<?php
    ini_set("error_reporting", 1);
    session_start();

    include $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';

    $type = $_POST["type"];

    if($type == "ADD_EVENT_UPDATE"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';
        $name = $_POST['name'];
        $date_event = date("Y-m-d H:i:s", strtotime($_POST['date_event']));
        $ticket_counter = $_POST['ticket_counter'];
        
        $user_id = $_SESSION['id_user'];
        $response = null;

        if(!isset($name)){
            $response = array("result" => false, "message" => "Nie podano nazwy");
        }
        else if(!isset($date_event)){
            $response = array("result" => false, "message" => "Nie podano daty");
        }
        else if(!isset($ticket_counter)){
            $response = array("result" => false, "message" => "Nie podano ilości biletów");
        }

        else{
            $response = array("result" => true);
            $event = new Events();
            $event->insert_events($name, $date_event, $ticket_counter, $user_id, 1);
        }

        echo json_encode($response);
    }

    if($type == "ADD_TICKET_UPDATE"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';

        $name = $_POST['name'];
        $event_id = $_POST['event_id'];
        $user_id = $_SESSION['id_user'];
        $date_ticket = date('Y-m-d H:i:s');

        $response = null;

        if(!isset($name)){
            $response = array("result" => false, "message" => "Nie podano nazwy");
        }
        else if(!isset($event_id)){
            $response = array("result" => false, "message" => "Nie wybrano wydarzenia");
        }

        else{
            $response = array("result" => true);
            $ticket = new Ticket();
            $ticket->insert_ticket($name, $event_id, $user_id, $date_ticket, 1);
        }

        echo json_encode($response);
    }
    
    if($type == "ADD_PAYMENT_UPDATE"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Payment.php';
        $name = $_POST['name'];
        $event_id = $_POST['event_id'];
        $ticket_id = $_POST['ticket_id'];
        $user_id = $_SESSION['id_user'];

        $response = null;

        if(!isset($name)){
            $response = array("result" => false, "message" => "Nie podano nazwy");
        }
        else if(!isset($event_id)){
            $response = array("result" => false, "message" => "Nie wybrano wydarzenia");
        }
        else if(!isset($ticket_id)){
            $response = array("result" => false, "message" => "Nie wybrano biletu");
        }

        else{
            $response = array("result" => true);
            $payment = new Payment();
            $payment->insert_payments($name, $event_id, $ticket_id, $user_id, 1);
        }

        echo json_encode($response);
    }
?>
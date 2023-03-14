<?php
    ini_set("error_reporting", 0);
    session_start();
    
    include $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/functions/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/connect/Connect.php';

    $type = $_POST["type"];

    if($type == "EDIT_EVENT_STATUS"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Event.php';

        $id = $_POST['id'];
        $value = $_POST['value'];
        $response = null;

        $event = new Events();
        $event->update_events("status", $value, $id);

        $response = array("result" => true);
        echo json_encode($response);
    }
    if($type == "EDIT_PAYMENT_STATUS"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Payment.php';

        $id = $_POST['id'];
        $value = $_POST['value'];
        $response = null;

        $payment = new Payment();
        $payment->update_payments("status", $value, $id);

        $response = array("result" => true);
        echo json_encode($response);
    }
    if($type == "EDIT_TICKET_STATUS"){
        include_once $_SERVER['DOCUMENT_ROOT'].'/event-management-system/private/class/Ticket.php';

        $id = $_POST['id'];
        $value = $_POST['value'];
        $response = null;

        $ticket = new Ticket();
        $ticket->update_ticket("status", $value, $id);

        $response = array("result" => true);
        echo json_encode($response);
    }
?>
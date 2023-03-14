<?php
    class Payment {

        public function select_payment(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM payments");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $payments[$row['id']] = new stdClass;
                $payments[$row['id']]->id = $row['id'];
                $payments[$row['id']]->name = $row['name'];
                $payments[$row['id']]->event_id = $row['event_id'];
                $payments[$row['id']]->ticket_id = $row['ticket_id'];
                $payments[$row['id']]->user_id = $row['user_id'];
                $payments[$row['id']]->status = $row['status'];
            }

            return $payments;
        }

        public function select_custom_payments($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM payments WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $payments[$row['id']] = new stdClass;
                $payments[$row['id']]->id = $row['id'];
                $payments[$row['id']]->name = $row['name'];
                $payments[$row['id']]->event_id = $row['event_id'];
                $payments[$row['id']]->ticket_id = $row['ticket_id'];
                $payments[$row['id']]->user_id = $row['user_id'];
                $payments[$row['id']]->status = $row['status'];
            }

            return $payments;
        }

        public function update_payments($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE payments SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_payments($name, $event_id, $ticket_id, $user_id, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO payments (name, event_id, ticket_id, user_id, status) 
                VALUES ('$name', '$event_id', '$ticket_id', '$user_id', '$status')");
            $stmt->execute();
        }
    }
?>
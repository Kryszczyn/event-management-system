<?php
    class Ticket {

        public function select_ticket(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM tickets");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $tickets[$row['id']] = new stdClass;
                $tickets[$row['id']]->id = $row['id'];
                $tickets[$row['id']]->name = $row['name'];
                $tickets[$row['id']]->event_id = $row['event_id'];
                $tickets[$row['id']]->user_id = $row['user_id'];
                $tickets[$row['id']]->date_ticket = $row['date_ticket'];
                $tickets[$row['id']]->status = $row['status'];
            }

            return $tickets;
        }

        public function select_custom_ticket($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM tickets WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $tickets[$row['id']] = new stdClass;
                $tickets[$row['id']]->id = $row['id'];
                $tickets[$row['id']]->name = $row['name'];
                $tickets[$row['id']]->event_id = $row['event_id'];
                $tickets[$row['id']]->user_id = $row['user_id'];
                $tickets[$row['id']]->date_ticket = $row['date_ticket'];
                $tickets[$row['id']]->status = $row['status'];
            }

            return $tickets;
        }

        public function update_ticket($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE tickets SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_ticket($name, $event_id, $user_id, $date_ticket, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO tickets (name, event_id, user_id, date_ticket, status) 
                VALUES ('$name', '$event_id', '$user_id', '$date_ticket', '$status')");
            $stmt->execute();
        }
    }
?>
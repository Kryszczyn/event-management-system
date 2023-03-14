<?php
    class Events {

        public function select_events(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM events");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $events[$row['id']] = new stdClass;
                $events[$row['id']]->id = $row['id'];
                $events[$row['id']]->name = $row['name'];
                $events[$row['id']]->date_event = $row['date_event'];
                $events[$row['id']]->ticket_counter = $row['ticket_counter'];
                $events[$row['id']]->user_id = $row['user_id'];
                $events[$row['id']]->status = $row['status'];
            }

            return $events;
        }

        public function select_custom_events($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM events WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $events[$row['id']] = new stdClass;
                $events[$row['id']]->id = $row['id'];
                $events[$row['id']]->name = $row['name'];
                $events[$row['id']]->date_event = $row['date_event'];
                $events[$row['id']]->ticket_counter = $row['ticket_counter'];
                $events[$row['id']]->user_id = $row['user_id'];
                $events[$row['id']]->status = $row['status'];
            }

            return $events;
        }

        public function update_events($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE events SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_events($name, $date_event, $ticket_counter, $user_id, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO events (name, date_event, ticket_counter, user_id, status) 
                VALUES ('$name', '$date_event', '$ticket_counter', '$user_id', '$status')");
            $stmt->execute();
        }
    }
?>
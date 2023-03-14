<?php
    class StatusType {

        public function select_status_type(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM status_type");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $status_type[$row['id']] = new stdClass;
                $status_type[$row['id']]->id = $row['id'];
                $status_type[$row['id']]->type = $row['type'];
            }

            return $status_type;
        }

        public function select_custom_status_type($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM status_type WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $status_type[$row['id']] = new stdClass;
                $status_type[$row['id']]->id = $row['id'];
                $status_type[$row['id']]->type = $row['type'];
            }

            return $status_type;
        }

        public function update_status_type($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE status_type SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_status_type($type){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO status_type (type) 
                VALUES ('$type')");
            $stmt->execute();
        }
    }
?>
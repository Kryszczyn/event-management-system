<?php
    class StatusValue {

        public function select_status_value(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM status_value");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $status_value[$row['id']] = new stdClass;
                $status_value[$row['id']]->id = $row['id'];
                $status_value[$row['id']]->status_type_id = $row['status_type_id'];
                $status_value[$row['id']]->value = $row['value'];
                $status_value[$row['id']]->color = $row['color'];
                $status_value[$row['id']]->name = $row['name'];
                $status_value[$row['id']]->status = $row['status'];
            }

            return $status_value;
        }

        public function select_custom_status_value($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM status_value WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $status_value[$row['id']] = new stdClass;
                $status_value[$row['id']]->id = $row['id'];
                $status_value[$row['id']]->status_type_id = $row['status_type_id'];
                $status_value[$row['id']]->value = $row['value'];
                $status_value[$row['id']]->color = $row['color'];
                $status_value[$row['id']]->name = $row['name'];
                $status_value[$row['id']]->status = $row['status'];
            }

            return $status_value;
        }

        public function update_status_value($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE status_value SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_status_value($status_type_id, $value, $color, $name, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO status_value (status_type_id, value, color, name, status) 
                VALUES ('$status_type_id', '$value', '$color', '$name', '$status')");
            $stmt->execute();
        }
    }
?>
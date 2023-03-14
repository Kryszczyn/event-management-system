<?php
    class Privilenges {

        public function select_privilenges(){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM privilenges");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $privilenges[$row['id']] = new stdClass;
                $privilenges[$row['id']]->id = $row['id'];
                $privilenges[$row['id']]->type = $row['type'];
                $privilenges[$row['id']]->name = $row['name'];
                $privilenges[$row['id']]->status = $row['status'];
            }

            return $privilenges;
        }

        public function select_custom_privilenges($sql = '1=1'){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("SELECT * FROM privilenges WHERE $sql");
            $stmt->execute();

            while($row = $stmt->fetch()){
                $privilenges[$row['id']] = new stdClass;
                $privilenges[$row['id']]->id = $row['id'];
                $privilenges[$row['id']]->type = $row['type'];
                $privilenges[$row['id']]->name = $row['name'];
                $privilenges[$row['id']]->status = $row['status'];
            }

            return $privilenges;
        }

        public function update_privilenges($col, $colvalue, $idvalue){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare("UPDATE privilenges SET $col = '$colvalue' WHERE id='$idvalue'");
            $stmt->execute();
        }

        public function insert_privilenges($type, $name, $status){
            $database = new Database();
            $db = $database->__construct();
            $stmt = $db->prepare(
                "INSERT INTO privilenges (type, name, status) 
                VALUES ('$type', '$name', '$status')");
            $stmt->execute();
        }
    }
?>
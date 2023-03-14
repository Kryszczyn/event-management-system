<?php
    class Database {
        private $server =  "mysql:host=localhost;dbname=event_management_system";
        private $user = 'root';
        private $pwd = '';
        private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        protected $conn;

        public function __construct(){
            try{
                $this->conn = new PDO($this->server, $this->user, $this->pwd, $this->options);
                return $this->conn;
            } catch(PDOException $e){
                echo 'Error ' . $e->getMessage();
                die();
            }
        }

        public function __destruct()
        {
            $this->conn = null;
        }
    }
?>
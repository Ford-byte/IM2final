<?php
    require_once("define.php");

    class Server{
        private $dbcon;
        private $test;

        public function __construct(){
            try {
            $this->dbcon = new PDO("mysql:host=".servername.";dbname=".dbname,username,password);
            $this->dbcon -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->dbcon -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $this->test = true;
            } catch (PDOException $e) {
            echo "Error : ".$e -> getMessage();
            $this->test = false;
            }
        }
        public function _getConfig(){
            return $this->dbcon;
        }
        public function _getTest(){
            return $this->test;
        }
    }
?>
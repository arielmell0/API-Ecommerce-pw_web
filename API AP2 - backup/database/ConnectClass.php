<?php

    class ConnectClass{

        var $conn;

        public function openConnect(){
            $servername = 'localhost:3306';
            $username = 'root';
            $password = '';
            $dbname = 'pw_ap2';
            $this -> conn = new mysqli($servername, $username, $password, $dbname);
        }

        public function getConn() {
            return $this -> conn;
        }
    }
?>
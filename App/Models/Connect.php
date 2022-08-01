<?php

    namespace App\Models;

    use PDO;
    use PDOException;

    define( "DBDRIVE", "mysql");
    define( "DBHOST","localhost");
    define( "DBNAME","api_test");
    define( "DBUSER","root");
    define( "DBPASS","root");

    class Connect {

        private $db;

        private function Connection(){

            try {
                $this->db = new PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOExecption $errors) {
                die($errors->getMessage());
            }

            return $this->db;
        }

        public function getConnection(){
            
            return $this->Connection();
        }
    }
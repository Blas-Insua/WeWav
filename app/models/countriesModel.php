<?php
    class countriesModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getCountries() {
            $query = $this->db->prepare("SELECT * FROM countries");
            $query->execute();
            $countries = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $countries;
        }
    }
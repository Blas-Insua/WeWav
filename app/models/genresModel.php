<?php
    class genresModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getGenres() {
            $query = $this->db->prepare("SELECT * FROM genres");
            $query->execute();
            $genres = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $genres;
        }
    }
<?php
    class genresModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getGenres() {
            $query = $this->db->prepare("SELECT * FROM `genres` ORDER BY `genre`");
            $query->execute();
            $genres = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $genres;
        }

        public function editGenre($id, $genre) {
            try {
                $query = $this->db->prepare("UPDATE `genres` SET `genre` = ? WHERE `genres`.`id` = ?"); 
                $query->execute(array($genre, $id));

            } catch(PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }  
        }

        public function deleteGenre($id) {

        }
    }
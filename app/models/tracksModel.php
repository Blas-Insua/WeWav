<?php
    class tracksModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getTracks() {
            $query = $this->db->prepare("SELECT t.id, t.name, t.user_id, a.name as userName, t.genre_id, g.genre, date, folder_id
                                        FROM tracks t
                                        INNER JOIN accounts a ON a.id = t.user_id
                                        INNER JOIN genres g ON g.id = t.genre_id");
            $query->execute();
            $tracks = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $tracks;
        }

        public function getTracksByAcc($profile) {
            $query = $this->db->prepare("SELECT t.id, t.name, t.user_id, a.name as userName, t.genre_id, g.genre, date, folder_id
                                        FROM tracks t
                                        INNER JOIN accounts a ON a.id = t.user_id
                                        INNER JOIN genres g ON g.id = t.genre_id
                                        WHERE a.name = ?");
            $query->execute([$profile]);
            $tracks = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $tracks;
        }
    }
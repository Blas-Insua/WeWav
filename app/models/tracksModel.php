<?php
    class tracksModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getTracks() {
            $query = $this->db->prepare("SELECT t.id, t.name, t.user_id, a.name as userName, t.genre_id, g.genre, t.date, folder_id
                                        FROM tracks t
                                        INNER JOIN accounts a ON a.id = t.user_id
                                        INNER JOIN genres g ON g.id = t.genre_id");
            $query->execute();
            $tracks = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $tracks;
        }

        public function getTracksBy($filter) {
            $query = $this->db->prepare("SELECT t.id, t.name, t.user_id, a.name as userName, t.genre_id, g.genre, t.date, folder_id
                                        FROM tracks t
                                        INNER JOIN accounts a ON a.id = t.user_id
                                        INNER JOIN genres g ON g.id = t.genre_id
                                        WHERE g.genre = ? OR a.name = ?");
            $query->execute([$filter, $filter]);
            $tracks = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $tracks;
        }

        public function getFile($id) {
            $query = $this->db->prepare("SELECT * FROM tracks t WHERE t.id = ?");
            $query->execute([$id]);
            $track = $query->fetch(PDO::FETCH_OBJ); 
            
            return $track;
        }        

        public function uploadFile($user_id, $trackName, $trackGenre, $trackDate) {
            try {
                $query = $this->db->prepare("INSERT INTO `tracks`(`name`, `user_id`, `genre_id`, `date`) VALUES (?, ?, ?, ?)"); 
                $query->execute([$trackName, $user_id, $trackGenre, $trackDate]);
            } catch(PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }  
        }

        public function deleteFile($trackID) {                   
            try {
                $query = $this->db->prepare("DELETE FROM tracks WHERE `tracks`.`id` = ? AND (`tracks`.`user_id` = ? OR 0 = ? OR 1 = ?)"); 
                $query->execute([$trackID, $_SESSION["user_id"], $_SESSION["rol"], $_SESSION["rol"]]);

            } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }                        
        }

        public function editFile($trackID, $trackName, $trackGenre, $trackDate) { 
            try {
                $query = $this->db->prepare("UPDATE `tracks` SET `name` = ?, `genre_id` = ?, `date` = ? WHERE `tracks`.`id` = ?"); 
                $query->execute(array($trackName, $trackGenre, $trackDate, $trackID));

            } catch(PDOException $e) {
                echo $query . "<br>" . $e->getMessage();
            }            
        }
    }
<?php
    class accountsModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getAllAccounts() {
            $query = $this->db->prepare("SELECT a.*, g.genre, c.country, r.rol 
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id 
                                        INNER JOIN roles r ON r.id = a.rol_id");
            $query->execute();
            $accounts = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $accounts;
        }

        public function getAccount($profile) {
            $query = $this->db->prepare("SELECT a.*, g.genre, c.country, r.rol
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        INNER JOIN roles r ON r.id = a.rol_id
                                        WHERE a.name = ? OR a.aka = ?");
            $query->execute([$profile, $profile]);
            $account = $query->fetch(PDO::FETCH_OBJ); 

            return $account;
        }

        public function searchAccounts($profile) {
            $nameQuery = $this->db->prepare("SELECT a.*, g.genre, c.country, r.rol
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        INNER JOIN roles r ON r.id = a.rol_id
                                        WHERE a.name LIKE ?");
                                        
            $nameQuery->execute([$profile."%"]);
            $akaQuery = $this->db->prepare("SELECT a.*, g.genre, c.country, r.rol
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        INNER JOIN roles r ON r.id = a.rol_id
                                        WHERE a.AKA LIKE ?");

            $res = $nameQuery->fetchAll(PDO::FETCH_OBJ);
            foreach ($akaQuery->fetchAll(PDO::FETCH_OBJ) as $key) {
                array_push($res, $key);
            };   

            return $res;
        }

        public function getRoles() {
            $query = $this->db->prepare("SELECT * FROM roles WHERE id>0");
            $query->execute();
            $roles = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $roles;
        }

        public function createAccount($name, $AKA, $password, $genre, $country, $photo = null, $photo_dir = null) {
            if ($photo!=null) {
                move_uploaded_file($photo, $photo_dir);  
            }
            $query = $this->db->prepare("INSERT INTO accounts (name, AKA, password, genre_id, country_id, photo_dir) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$name, $AKA, $password, $genre, $country, $photo_dir]);
            $user = $query->fetch(PDO::FETCH_OBJ); 
        }       

        public function deleteProfile($id) {
            $query = $this->db->prepare("DELETE FROM `accounts` WHERE `accounts`.`id`=?");
            $query->execute([$id]);                          
        }

        public function editProfile($id, $name, $AKA, $genre, $country) {
            $query = $this->db->prepare("UPDATE `accounts` 
                        SET `name`= ?,`AKA`= ?,`genre_id` = ?,`country_id`= ? 
                        WHERE `accounts`.`id`= ?");
            $query->execute([$name, $AKA, $genre, $country, $id]);
        }

        public function editProfileRol($id, $rol) {
            $query = $this->db->prepare("UPDATE `accounts` SET `rol_id`= ? WHERE `accounts`.`id`= ?");
            $query->execute([$_POST["user_rol"], $id]); 
        }

        public function editProfilePassword($id, $password) {
            $query = $this->db->prepare("UPDATE `accounts` SET `password`= ? WHERE `accounts`.`id`= ?");
            $query->execute([$password, $id]);
        }

        public function editProfilePhoto($id, $photo, $photo_dir) {
            if (move_uploaded_file($photo, $photo_dir)) {
                $query = $this->db->prepare("UPDATE `accounts` SET `photo_dir`= ? WHERE `accounts`.`id`= ?");
                $query->execute([$photo_dir, $id]);  
            }    
        }

        public function deleteProfilePhoto($id) {
            $query = $this->db->prepare("UPDATE `accounts` SET `photo_dir`= '' WHERE `accounts`.`id`= ?");
            $query->execute([$id]);    
        }
    }
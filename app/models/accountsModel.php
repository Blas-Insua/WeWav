<?php
    class accountsModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getAllAccounts() {
            $query = $this->db->prepare("SELECT a.id, a.name, a.AKA, a.photo, a.artist, a.genre_id, g.genre, a.country_id, c.country, r.rol, a.rol_id
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id 
                                        INNER JOIN roles r ON r.id = a.rol_id");
            $query->execute();
            $accounts = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $accounts;
        }

        public function getAccount($profile) {
            $query = $this->db->prepare("SELECT a.id, a.name, a.password, a.AKA, a.photo, a.artist, a.genre_id, g.genre, a.country_id, c.country, r.rol, a.rol_id
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        INNER JOIN roles r ON r.id = a.rol_id
                                        WHERE a.name = ? OR a.aka = ?");
            $query->execute([$profile, $profile]);
            $account = $query->fetch(PDO::FETCH_OBJ); 

            return $account;
        }

        public function getRoles() {
            $query = $this->db->prepare("SELECT * FROM roles WHERE id>0");
            $query->execute();
            $roles = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $roles;
        }

        public function createAccount($name, $AKA, $password, $genre, $country, $imagen, $photo = null) {
            $query = $this->db->prepare("INSERT INTO accounts (name, AKA, password, artist, photo, genre_id, country_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$name, $AKA, $password, $imagen, $photo, $genre, $country]);
            $user = $query->fetch(PDO::FETCH_OBJ); 
        }       

        public function deleteProfile($id) {
            $usersQuery = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');
            $usersQuery->execute([$id]);
            $user = $usersQuery->fetch(PDO::FETCH_OBJ);         
            
            if ($_SESSION["rol"]==2) {
                if($user && password_verify($_POST["password"],($user->password))){
                    $query = $this->db->prepare("DELETE FROM `accounts` WHERE `accounts`.`id`=?");
                    $query->execute([$id]);                              
                } else {
                    $this->view->showProfileManagerErr($account);  
                }
            } else {
                $query = $this->db->prepare("DELETE FROM `accounts` WHERE `accounts`.`id`=?");
                $query->execute([$id]);
            }            
        }

        public function editProfile($id, $name, $AKA, $genre, $country, $photo = null) {
            $query = $this->db->prepare("UPDATE `accounts` 
                        SET `name`= ?,`AKA`= ?, `photo` = ?,`genre_id` = ?,`country_id`= ? 
                        WHERE `accounts`.`id`= ?");
            $query->execute([$name, $AKA, $photo, $genre, $country, $id]);
        }

        public function editProfileRol($id, $rol) {
            $query = $this->db->prepare("UPDATE `accounts` SET `rol_id`= ? WHERE `accounts`.`id`= ?");
            $query->execute([$_POST["user_rol"], $id]); 
        }

        public function editProfilePassword($id, $password) {
            $query = $this->db->prepare("UPDATE `accounts` SET `password`= ? WHERE `accounts`.`id`= ?");
            $query->execute([$password, $id]);
        }

        public function editProfilePhoto($id, $file, $path) {
            $query = $this->db->prepare("UPDATE `accounts` SET `artist`= ?, `photo`= ? WHERE `accounts`.`id`= ?");
            $query->execute([$file, $path, $id]);
        }
    }

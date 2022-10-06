<?php
    class accountsModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getAllAccounts() {
            $query = $this->db->prepare("SELECT a.id, a.name, a.AKA, a.genre_id, g.genre, a.country_id, c.country, r.rol, a.rol_id
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id 
                                        INNER JOIN roles r ON r.id = a.rol_id");
            $query->execute();
            $accounts = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $accounts;
        }

        public function getAccount($profile) {
            $query = $this->db->prepare("SELECT a.id, a.name, a.AKA, a.genre_id, g.genre, a.country_id, c.country, r.rol, a.rol_id
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        INNER JOIN roles r ON r.id = a.rol_id
                                        WHERE a.name = ?");
            $query->execute([$profile]);
            $account = $query->fetch(PDO::FETCH_OBJ); 

            return $account;
        }

        public function getRoles() {
            $query = $this->db->prepare("SELECT * FROM roles WHERE id>0");
            $query->execute();
            $roles = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $roles;
        }

        public function signupSubmit() {

            // name validation
            $nameParam = $_POST['name'];
            $queryName = $this->db->prepare("SELECT name FROM accounts WHERE name = ?");
            $queryName->execute([$nameParam]);
            $queryNameRes = $queryName->fetch(PDO::FETCH_OBJ);

            if ($queryNameRes) {
                $nameERR = 'This user name is already taken.';
            };

            // AKA validation
            $AKAParam = $_POST['AKA'];
            $queryAKA = $this->db->prepare("SELECT AKA FROM accounts WHERE AKA = ?");
            $queryAKA->execute([$AKAParam]);
            $queryAKAres = $queryAKA->fetch(PDO::FETCH_OBJ);

            if ($queryAKAres) {
                $nameERR = 'This user AKA is already taken.';
            };

            // Password validation
            if ( ($_POST['pass'] != $_POST['passConfirm'])) {
                $passERR = 'The passwords no match.';
            };

            $name = $nameParam;
            $AKA = $AKAParam;
            $password = password_hash($_POST['pass'], PASSWORD_BCRYPT); 

            $query = $this->db->prepare("INSERT INTO accounts (name, AKA, password, artist, genre_id, country_id) VALUES (?, ?, ?, ?, ?, ?)");
            
            if ($query->execute([$name, $AKA, $password, $_POST['artist'], $_POST['genre'], $_POST['country']])) {
                header("location:".BASE_URL."login/");
            }
    
        }

        public function loginSubmit() {
            if(!empty($_POST['name'])&& !empty($_POST['password'])){
                $nameParam = $_POST['name'];
                $password = $_POST['password'];
         
                $query = $this->db->prepare('SELECT * FROM accounts WHERE name = ? OR AKA = ?');
                $query->execute([$nameParam, $nameParam]);
                $user = $query->fetch(PDO::FETCH_OBJ);         
                
                if($user && password_verify($password,($user->password))){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["user_id"] = $user->id;
                    $_SESSION["name"] = $user->name;
                    $_SESSION["rol"] = $user->rol_id;
                    header("location:".BASE_URL."home/");
                }
            }         
        }
        
        public function logout() {
            session_start();
            session_destroy();
            header("location:".BASE_URL."home/");
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

        public function editProfile($id) {

            if ($_POST["user_rol"]) {
                $query = $this->db->prepare("UPDATE `accounts` SET `rol_id`= ? WHERE `accounts`.`id`= ?");
                $query->execute([$_POST["user_rol"], $id]); 
            } else {
                $usersQuery = $this->db->prepare('SELECT * FROM accounts WHERE id = ?');
                $usersQuery->execute([$id]);
                $user = $usersQuery->fetch(PDO::FETCH_OBJ); 

                if(password_verify($_POST["password"],($user->password))){
                    if ($_POST["passwordNew"]) {
                        if (($_POST['passwordNew']=$_POST['passwordConfirm'])) {
                            $password = password_hash($_POST['passwordNew'], PASSWORD_BCRYPT); 

                            $query = $this->db->prepare("UPDATE `accounts` SET `password`= ? WHERE `accounts`.`id`= ?");
                            $query->execute([$password, $id]);

                            header("location:".BASE_URL."logout/");  
                            header("Refresh:0; url=".BASE_URL."login/");
                        }                       
                    };
                    if ($_POST["name"]) {
                        $name = $_POST["name"];
                        $AKA = $_POST["AKA"];
                        $genre = $_POST["genre"];
                        $country = $_POST["country"];

                        $query = $this->db->prepare("UPDATE `accounts` 
                        SET `name`= ?,`AKA`= ?,`genre_id` = ?,`country_id`= ? 
                        WHERE `accounts`.`id`= ?");
                        $query->execute([$name, $AKA, $genre, $country, $id]);
                    };       
                }
            }
        }
    }

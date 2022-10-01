<?php
    class accountsModel {
        private $db; 

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=wewavdb;charset=utf8', 'root', '');
        }

        public function getAllAccounts() {
            $query = $this->db->prepare("SELECT a.id, a.name, a.AKA, a.genre_id, g.genre, a.country_id, c.country
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id");
            $query->execute();
            $accounts = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $accounts;
        }

        public function getAccount($profile) {
            $query = $this->db->prepare("SELECT a.id, a.name, a.AKA, a.genre_id, g.genre, a.country_id, c.country
                                        FROM accounts a 
                                        INNER JOIN genres g ON g.id = a.genre_id
                                        INNER JOIN countries c ON c.id = a.country_id
                                        WHERE a.name = ?");
            $query->execute([$profile]);
            $account = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $account;
        }

        public function signupSubmit() {

            // name validation
            $nameParam = $_POST['name'];
            $queryName = $this->db->prepare("SELECT name FROM accounts WHERE name = ?");
            $queryName->execute([$nameParam]);
            $queryNameRes = $queryName->fetch(PDO::FETCH_OBJ);

            if ($queryNameRes) {
                echo "<script type='javascript'>alert ('This user name is already taken.')</script>";
            };

            // AKA validation
            $AKAParam = $_POST['AKA'];
            $queryAKA = $this->db->prepare("SELECT AKA FROM accounts WHERE AKA = ?");
            $queryAKA->execute([$AKAParam]);
            $queryAKAres = $queryAKA->fetch(PDO::FETCH_OBJ);

            if ($queryAKAres) {
                echo "<script type='javascript'>alert ('This user AKA is already taken.')</script>";
            };

            // Password validation
            if ( ($_POST['pass'] = $_POST['passConfirm'])) {
                echo "<script type='javascript'>alert ('The passwords no match.')</script>";
            };

            $query = $this->db->prepare("INSERT INTO accounts (name, AKA, password, artist, genre_id, country_id) VALUES (?, ?, ?, ?, ?, ?)");
            $name = $nameParam;
            $AKA = $AKAParam;
            $password = password_hash($_POST['pass'], PASSWORD_BCRYPT); 

            if ($query->execute([$name, $AKA, $password, $_POST['artist'], $_POST['genre'], $_POST['country']])) {
                header("location:home");
            }
    
        }
    
    }

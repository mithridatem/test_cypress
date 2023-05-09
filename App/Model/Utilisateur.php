<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    class Utilisateur extends BddConnect{
        /*--------------------------------
                    Attributs
        --------------------------------*/
        private ?int $id;
        private ?string $nom;
        private ?string $prenom;
        private ?string $mail;
        private ?string $mdp;
        /*--------------------------------
                Getters and Setters
        --------------------------------*/
        public function getId():?int{
            return $this->id;
        }
        public function setId(int $id):self{
            $this->id = $id;
            return $this;
        }
        public function getNom():?string{
            return $this->nom;
        }
        public function setNom(string $nom):self{
            $this->nom = $nom;
            return $this;
        }
        public function getPrenom():?string{
            return $this->nom;
        }
        public function setPrenom(string $prenom):self{
            $this->prenom = $prenom;
            return $this;
        }
        public function getMail():?string{
            return $this->mail;
        }
        public function setMail(string $mail):self{
            $this->mail = $mail;
            return $this;
        }
        public function getPassword():?string{
            return $this->mdp;
        }
        public function setPassword(string $mdp):self{
            $this->mdp = $mdp;
            return $this;
        }
        /*--------------------------------
                    Méthodes
        --------------------------------*/
        public function addUser():void{
            try{
                $nom = $this->nom;
                $prenom = $this->prenom;
                $mail = $this->mail;
                $mdp = $this->mdp;
                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom, prenom, mail, mdp)
                VALUES(?,?,?,?)');
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $mdp, \PDO::PARAM_STR);
                $req->execute();
            } 
            catch (\Exception $e){
                die('Error : '.$e->getMessage());
            }
        }
        public function getUserByMail():?array{
            try{
                $mail = $this->mail;
                $req = $this->connexion()->prepare('SELECT id, nom, prenom, mail, mdp FROM utilisateur
                WHERE mail = ?');
                $req->bindParam(1, $mail, \PDO::PARAM_STR);
                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            } 
            catch (\Exception $e){
                die('Error : '.$e->getMessage());
            }
        }
        public function __toString(){
            return $this->nom;
        }
    }
?>
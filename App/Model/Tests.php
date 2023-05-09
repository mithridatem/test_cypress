<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    class Tests extends BddConnect{
        /*--------------------------------
                    Attributs
        --------------------------------*/
        private ?int $id;
        private ?string $name;
        private ?bool $valid;
        private ?string $date;
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
        public function getName():?string{
            return $this->name;
        }
        public function setName(?string $name):self{
            $this->name = $name;
            return $this;
        }
        public function getValid():bool{
            return $this->valid;
        }
        public function setValid(bool $value):self{
            $this->valid = $value;
            return $this;
        }
        public function getDate():?string{
            return $this->date;
        }
        public function setDate(?string $date):self{
            $this->date = $date;
            return $this;
        }
        /*--------------------------------
                    Méthodes
        --------------------------------*/
        public function getAllTests():?array{
            try{
               $name = $this->name;
               $valid = $this->valid;
               $date = $this->date;
               $req = $this->connexion()->prepare('SELECT id, name, valid, date 
               FROM tests ORDER BY name ASC');
               $req->execute();
               return $req->fetchAll(\PDO::FETCH_OBJ);;
            }
            catch (\Exception $e) {
                die('Error : '.$e->getMessage());
            }
        }
        public function getTestById():?array{
            try{
                $id = $this->id;
                $req = $this->connexion()->prepare('SELECT id, name, valid, date
                FROM tests WHERE id = ?');
                $req->bindParam(1, $id, \PDO::PARAM_INT);
                $req->execute();
                return $req->fetch(\PDO::FETCH_OBJ);
            }
            catch (\Exception $e) {
                die('Error : '.$e->getMessage());
            }
        }
        public function addTest():void{
            try {
                $name = $this->name;
                $valid = $this->valid;
                $date = $this->date;
                $req = $this->connexion()->prepare('INSERT INTO tests(name, valid, date)
                VALUES (?,?,?)');
                $req->bindParam(1, $name, \PDO::PARAM_STR);
                $req->bindParam(2, $valid, \PDO::PARAM_BOOL);
                $req->bindParam(3, $date, \PDO::PARAM_STR);
                $req->execute();
            } 
            catch (\Exception $e) {
                die('Error : '.$e->getMessage());
            }
        }
        public function __toString(){
            return $this->name;
        }
    }
?>
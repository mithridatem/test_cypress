<?php
    namespace App\Controller;
    use App\Utils\Fonctions;
    use App\Model\Utilisateur;
    class UtilisateurController extends Utilisateur{
        public function insertUser(){
            $msg = "";
            //Test si le formulaire à été submit
            if(isset($_POST['submit'])){
                //nettoyage des datas du formulaire
                $nom = Fonctions::cleanInput($_POST['nom']);
                $prenom = Fonctions::cleanInput($_POST['prenom']);
                $mail = Fonctions::cleanInput($_POST['mail']);
                $mdp = Fonctions::cleanInput($_POST['mdp']);
                //Test si tous les champs du formulaire sont remplis
                if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($mdp)){
                    $this->setMail($mail);
                    //Récupération du compte
                    $user = $this->getUserByMail();
                    //Test si le compte n'existe pas en BDD
                    if(!$user){
                        //Set des valeurs et hash du mot de passe
                        $this->setNom($nom);
                        $this->setPrenom($prenom);
                        $this->setPassword(password_hash($mdp, PASSWORD_DEFAULT));
                        //Ajout du compte en BDD
                        $this->addUser();
                        $msg = "Le compte a été ajouté en BDD";
                    }
                    //Test sinon affiche une erreur
                    else{
                        $msg = "Les informations sont incorrectes";
                    }
                }
                else{
                    $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }
            //Import de la vue
            include './App/Vue/vueAddUser.php';
        }
    }
?>
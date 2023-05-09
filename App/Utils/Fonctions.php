<?php
    namespace App\Utils;
    class Fonctions{
        //nettoyage des entrées de formulaire
        public static function cleanInput($value){
            return htmlspecialchars(strip_tags(trim($value)));
        }
    }
?>
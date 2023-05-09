<?php
    namespace App\Controller;
    use App\Utils\Fonctions;
    use App\Model\Tests;
    class ApiTestsController extends Tests{
        /*--------------------------------
                    Méthodes
        --------------------------------*/
        public function allTestsToJson(){
            //Construction du header
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET');
            header('Content-Type: application/json');
            $json = $this->getAllTests();
            if($json){
                http_response_code(200);
                echo json_encode($json);
            }
            else{
                http_response_code(404);
                echo json_encode(['Error'=>'il n\'y à pas de test dans la base']);
            }
        }
        public function addTestsToJson(){
            //Construction du header
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, PUT, PATCH, DELETE');
            header('Content-Type: application/json');
            header('Accept: application/json');
            //Test si la méthode est POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //récupération du json
                $json = file_get_contents("php://input");
                //Test si le json existe
                if($json != null){
                    //Décodage du json
                    $data = json_decode($json, true);
                    $this->setName($data['name']);
                    $this->setValid($data['valid']);
                    $this->setDate($data['date']);
                    $this->addTest();
                    header('HTTP/1.0 200');
                    echo json_encode(['Valid'=>'Le compte a ete ajouté']);
                }
                //Test le json n'existe pas
                else{
                    echo json_encode(['Erreur'=>'Le json n\'existe pas']);
                }
            }
            //Test si la méthode n'est pas POST
            if($_SERVER['REQUEST_METHOD'] != 'POST'){
                header('HTTP/1.0 405');
                echo json_encode(['Erreur'=>'Le protocole est incorrect']);
            }
        }
    }
?>
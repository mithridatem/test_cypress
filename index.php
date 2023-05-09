<?php
    use App\Utils\BddConnect;
    use App\Utils\Fonctions;
    use App\Model\Utilisateur;
    use App\Model\Tests;
    use App\Controller\UtilisateurController;
    use App\Controller\ApiTestsController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Utilisateur.php';
    include './App/Model/Tests.php';
    include './App/Controller/UtilisateurController.php';
    include './App/Controller/ApiTestsController.php';
    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //Instance des controllers
    $utilCtrl = new UtilisateurController();
    $apiTestsCtrl = new ApiTestsController();
    //routeur
    switch ($path) {
        case '/testingv2/':
            include './home.php';
            break;
        case '/testingv2/addUser':
            $utilCtrl->insertUser();
            break;
        case '/testingv2/test':
            include './test.php';
            break;
        case '/testingv2/api/addTest':
            $apiTestsCtrl->addTestsToJson();
            break;
        case '/testingv2/addTest':
            include './App/Vue/vueAddTest.php';
            break;
        default:
            include './error.php';
            break;
    }
?>

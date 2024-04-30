<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexion':
    {
        include("views/v_connexion.php");
        break;
    }

    case 'valideConnexion':
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $Admin = $pdo->getInfosAdmin($login, $mdp);
        if (!is_array($Admin)) {
            include("views/v_connexion.php");
            echo "Login ou mot de passe incorrecte !";
        } else {

            $login = $Admin['login'];
            $mdp= $Admin['mdp'];
            $message = "Bonjour Admin ";
            include("views/v_accueil.php");
        }
        break;
    }
    default :
    {
        include("views/v_connexion.php");
        break;
    }
}
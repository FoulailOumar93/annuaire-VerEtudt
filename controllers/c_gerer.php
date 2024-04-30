<?php
switch ($action) {
    case 'accueil':
    {
            $message="Ce site permet d'enregistrer les participants à une épreuve.";
            include("views/v_accueil.php");
        break;
    }
    case 'lister': {
        $les_membres=$pdo->getLesMembres();
        require 'views/v_listemembres.php';
        break;
    }
    case 'saisir':
    {
        require "views/v_saisie.php";
        break;
    }
    case 'controlesaisie':
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        // affecter $prenom

        if (empty($nom) || empty($prenom)) {
            require "views/v_saisie.php";
        } else {
            $resultat = $pdo->insertMembre($nom, $prenom);
            $message="Membre $prenom $nom inséré";
            include("views/v_accueil.php");
        }
        break;
    }

    case 'supprimer_membre':
    { 
       
        $les_membres=$pdo->getLesMembres();
        include("views/v_suprimer_listemembre.php");
        break;
    }

    case 'controlesupprimer_membre':
    { 
        $id = $_REQUEST['id'];
        $resultat = $pdo->dltMembre($id);
        $les_membres=$pdo->getLesMembres();
        include("views/v_listemembres.php");
        break;
    }
    

    default:
    {
        $_SESSION["message_erreur"] = "Site en construction";
        include("views/404.php");
        break;
    }


}

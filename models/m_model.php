<?php

class PdoBridge
{
    private static string $serveur = 'mysql:host=localhost';
    private static string $bdd = 'dbname=annuaire';
    private static string $user = 'root';
    private static string $mdp = '';
    private static $monPdoBridge = null;
    /**
     * @var PDO   <--- need by PhpStorm to find Methods of PDO
     */
    private static PDO $monPdo;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoBridge::$monPdo = new PDO(PdoBridge::$serveur . ';' . PdoBridge::$bdd, PdoBridge::$user, PdoBridge::$mdp);
        PdoBridge::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct()
    {
        PdoBridge::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdolafleur = PdoBridge::getPdoBridge();
     * @return l'unique objet de la classe PdoBridge
     */
    public static function getPdoBridge()
    {
        if (PdoBridge::$monPdoBridge == null) {
            PdoBridge::$monPdoBridge = new PdoBridge();
        }
        return PdoBridge::$monPdoBridge;
    }

    public function getLesMembres()
    {
        // modifiez la requête sql
        $sql = 'SELECT * FROM membres';
        $lesLignes = PdoBridge::$monPdo->query($sql);
        return $lesLignes->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getMaxId()
    {
        // modifiez la requête sql
        $req = "SELECT max(id) AS maxi FROM membres";
        $res = PdoBridge::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return 1 + intval($lesLignes["maxi"]);
    }

    public function insertMembre($nom, $prenom)
    {
        $id = $this->getMaxId();
        // modifiez la requête sql
        $sql = "INSERT INTO membres (id,nom,prenom) Values('$id' , '$nom' , '$prenom')";
        $req = PdoBridge::$monPdo->exec($sql);
    }
    
    public function dltMembre($id)
    {
        $sql = "DELETE  from membres where id='$id'";
     $req = PdoBridge::$monPdo->exec($sql);
    }  
 

    public function getInfosAdmin($login, $mdp){
        $req = "SELECT id,login, mdp from Admin where login='$login' and mdp='$mdp'";
        $rs = PdoBridge::$monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }


}
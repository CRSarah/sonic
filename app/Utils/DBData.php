<?php

//  Classe permettant de retourner des données stockées dans la base de données
class DBData {
    private $dbh; // Database Handler

    // Constructeur se connectant à la base de données à partir des informations du fichier de configuration
    public function __construct() {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        $configData = parse_ini_file(__DIR__.'/../config.conf');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    // Méthode permettant de retourner les données des personnages
    public function getCharacterDetails() {
        $sql = '
        SELECT c.*, t.name AS type_name 
        FROM `character` AS c 
        INNER JOIN `type` AS t 
        ON c.type_id = t.id
        ORDER BY c.name
        ';
        $pdoStatement = $this->dbh->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'CharacterModel');
        return $results;
    }

    // '
    // SELECT c.*, t.name AS type_name //? j\'utilise des ALIAS
    // FROM `character` AS c //? on définit les alias ici grâce au AS
    // INNER JOIN `type` AS t //? on définit le INNER JOIN ici où on dit
    // ON c.type_id = t.id //? que le type_id de characters = à l\'id de type donc le type 1 de character est = à Gentils de type
    // ORDER BY c.name //? je classe par nom de caractère/personnage
    // ';
    
/*     // Méthode permettant de retourner les données sur un type de personnage
    public function getCharacterTypeDetails() {
        $sql = '
        SELECT *
        FROM `type`
        ';
        $pdoStatement = $this->dbh->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'TypeModel');
        return $results;
    } */

    // Méthode permettant de retourner le type d'un personnage
/*     public function getType() {
        $sql = '
        SELECT type.id `type_id`, type.name `type_name`, `character`.id `character_id`, `character`.name `character_name`
        FROM type, `character`
        WHERE type.id = `character`.type_id
        ';
        $pdoStatement = $this->dbh->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'TypeModel');
        return $results;
    } */

    // Quand je crée une méthode dans DBData
    /*
    1 - déclarer la méthode
    2 - écrire la requête SQL dans une variable de type String
    3 - sur le connecteur (objet PDO) exécute la méthode query avec la requête en paramètre
    4 - 2 cas de figure :
        4-a) 1 seul résultat => $pdoStatement->fetch ou $pdoStatement->fetchObject
        4-b) plusieurs résultats => $pdoStatement->fetchAll
    5 - Retour en Objet ou Tableau :
        5-a) requête sur 1 seule table :
            5-a-i) 1 seul résultat => fetchObject(le Model correspondant)
            5-a-ii) plusieurs résultats => fetchAll(PDO::FETCH_CLASS, le Model correspondant)
        5-b) requête sur plusieurs tables => PDO::FETCH_ASSOC
    6 - retourner le tableau
    */
}
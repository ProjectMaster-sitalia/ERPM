<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _FacturationArtisan
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/FacturationArtisan.php';

class _FacturationArtisan extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des FacturationArtisans
    function getAllFacturationArtisans() {
// Initialiser la connexion BDD
        try {
            // LIST: CONTIENDRA UN TABLEAU D'OBJETS
            $list = array();
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
// Query SQL
            $query = "SELECT * FROM Intervention_artisan";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new FacturationArtisan($data['interventionID'], $data['artisanID']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS

                if (isset($data['accompte '])) {
                    $object->setAccompte($data['accompte ']);
                }
                if (isset($data['coutHT'])) {
                    $object->setCoutHT($data['coutHT']);
                }



                // REMPLIR LA LISTE AVEC
                array_push($list, $object);
            }
            $response->closeCursor();
            if (empty($list)) {
                return null;
            }
            return $list;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }

    function getFacturationArtisanByID($interventionID, $artisanID) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Intervention_artisan WHERE interventionID = :interventionID and artisanID =:artisanID";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':interventionID', $interventionID);
            $request->bindParam(':artisanID', $artisanID);
            $request->execute();
            $data = $request->fetch();

            //INSTENTIER L'OBJET
            $object = new FacturationArtisan($data['interventionID'], $data['artisanID']);
            if (isset($data['accompte'])) {
                $object->setAccompte($data['accompte']);
            }
            if (isset($data['coutHT'])) {
                $object->setCoutHT($data['coutHT']);
            }


            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }

}

?>
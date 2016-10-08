<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Affilie
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Affilie.php';

class _Affilie extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des affilies
    function getAllAffilies() {
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
            $query = "SELECT * FROM Affilies";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['magasinID'])) {
                    $object = new Affilie($data['magasinID']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS

                
                if (isset($data['adresseFacturation '])) {
                    $object->setAdresseFacturation($data['adresseFacturation ']);
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

    function getAffilieByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Affilie WHERE magasinID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $Data = $request->fetch();
            
            //INSTENTIER L'OBJET
            $objet = new Affilie($Data['magasinID']);
            $objet->setAdresseFacturation($Data['adresseFacturation']);
            $request->closeCursor();
            return $objet;
        } catch (Exception $e) {    
            error_log($e->getMessage());
        }
        return null;
    }

}

?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _NAffilie
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/NAffilie.php';

class _NAffilie extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des NAffilies
    function getAllNAffilies() {
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
            $query = "SELECT * FROM NAffilie";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['magasinID'])) {
                    $object = new NAffilie($data['magasinID']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS



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

    function getNAffilieByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM NAffilie WHERE magasinID = :magasinID";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':magasinID', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new NAffilie($data['magasinID']);
            




            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }

}

?>
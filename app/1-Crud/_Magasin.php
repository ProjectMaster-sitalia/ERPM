<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Magasin
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Magasin.php';

class _Magasin extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des Magasins
    function getAllMagasins() {
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
            $query = "SELECT * FROM Magasins";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new Magasin($data['id']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS


                if (isset($data['companieID'])) {
                    $object->setCompanieID($data['companieID']);
                }
                if (isset($data['adresseFacturation'])) {
                    $object->setAdresseFacturation($data['adresseFacturation']);
                }
                if (isset($data['adressePhysique'])) {
                    $object->setAdressePhysique($data['adressePhysique']);
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

    function getMagasinByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Magasin WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new Magasin($data['ID']);
            if (isset($data['companieID'])) {
                $object->setCompanieID($data['companieID']);
            }
            if (isset($data['adresseFacturation'])) {
                $object->setAdresseFacturation($data['adresseFacturation']);
            }
            if (isset($data['adressePhysique'])) {
                $object->setAdressePhysique($data['adressePhysique']);
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
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Compagnie
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Compagnie.php';

class _Compagnie extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des Compagnies
    function getAllCompagnies() {
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
            $query = "SELECT * FROM Compagnies";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new Compagnie($data['id']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS

                if (isset($data['adresseFacturation'])) {
                    $object->setAdresseFacturation($data['adresseFacturation']);
                }
                if (isset($data['manager'])) {
                    $object->setManager($data['manager']);
                }
                if (isset($data['libelle'])) {
                    $object->setLibelle($data['libelle']);
                }
                if (isset($data['logo'])) {
                    $object->setLogo($data['logo']);
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

    function getCompagnieByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Compagnie WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            
            //INSTENTIER L'OBJET
            $object = new Compagnie($data['ID']);
            if (isset($data['adresseFacturation'])) {
                $object->setAdresseFacturation($data['adresseFacturation']);
            }
            if (isset($data['manager'])) {
                $object->setManager($data['manager']);
            }
            if (isset($data['libelle'])) {
                $object->setLibelle($data['libelle']);
            }
            if (isset($data['logo'])) {
                $object->setLogo($data['logo']);
            }

            
            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }
    
    function updateTeam($CompagnieObject){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            

            // PREPARER LA SQL QUERY
            //On récupere l'id du libelle dans la table TypeCompte
//            $query = "SELECT libelle FROM TypeCompteDefinition WHERE ID = :typeCompte";
//            $request = parent::getBdd()->prepare($query);
//            $request->bindParam(':typeCompte', $newTypeCompte);
//            $request->execute();
//            $newTypeCompteLibelle = $request->fetch();
//            $newTypeCompteLibelle = $newTypeCompteLibelle['libelle'];
            
//            $request->closeCursor();
            //echo $newTypeCompte;

            $managerUpdated = $CompagnieObject->getManager();
            $libelleUpdated = $CompagnieObject->getLibelle();
            $logoUpdated = $CompagnieObject->getLogo();
            //$listeMagasinsUpdated = $CompagnieObject->getListeMagasins();
            $AdresseFacturationUpdated = $CompagnieObject->getAdresseFacturation();
            $ID = $CompagnieObject->getID();
            
            //On update la table
            $query = "UPDATE Team SET manager = :manager,libelle = :libelle,logo = :logo,adresseFacturation = :adresse WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':manager', $managerUpdated);
            $request->bindParam(':libelle', $libelleUpdated);
            $request->bindParam(':logo', $logoUpdated);
            //$request->bindParam(':password', $listeMagasinsUpdated);
            $request->bindParam(':adresse', $AdresseFacturationUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

}

?>
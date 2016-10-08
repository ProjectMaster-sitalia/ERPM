<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Devis
 *
 * @author user
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Devis.php';

class _Devis extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des Devis
//    function getAllDevis() {
//// Initialiser la connexion BDD
//        try {
//            // LIST: CONTIENDRA UN TABLEAU D'OBJETS
//            $list = array();
//            if (is_null(parent::getBdd())) {
//                parent::__construct();
//            }
//            if (!parent::getBdd()->inTransaction()) {
//                parent::getBdd()->beginTransaction();
//            }
//// Query SQL
//            $query = "SELECT * FROM Devis";
//
//
//            $response = parent::getBdd()->query($query);
//// Boucler sur les resultats            
//            while ($data = $response->fetch()) {
//                // SI ID exite => Creer l'objet
//                if (isset($data['id'])) {
//                    $object = new Devis($data['id']);
//                } else {
//                    // ERROR
//                    return null;
//                }
//
//                // REMPLIR LOBJET AVEC LES ATTRIBUTS
//
//
//                if (isset($data['devisID'])) {
//                   // $object->setTypeCompte($data['typeCompte']);
//                    
//                }
//                if (isset($data['user'])) {
//                    $object->setTypeDevis($data['user']);
//                }
//                if (isset($data['password'])) {
//                    $object->setTypeDevis($data['password']);
//                }
//
//
//                // REMPLIR LA LISTE AVEC
//                array_push($list, $object);
//            }
//            $response->closeCursor();
//            if (empty($list)) {
//                return null;
//            }
//            return $list;
//        } catch (Exception $e) {
//            error_log($e->getMessage());
//        }
//        return null;
//    }

    function getDevisByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Devis WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new Devis($data['ID']);
            if (isset($data['ID'])) {
                $object->setID($data['ID']);
                
//                $object->setTypeCompte($data['interventionID']);
//                $query = "SELECT libelle FROM TypeCompte WHERE ID = :id";
//                $request = parent::getBdd()->prepare($query);
//                $request->bindParam(':id', $data['interventionID']);
//                $request->execute();
//                $data = $request->fetch();
            }
            if (isset($data['statusDevis'])) {
                $object->setStatusDevis($data['statusDevis']);
            }
            if (isset($data['InterventionID'])) {
                $object->setInterventionID($data['InterventionID']);
            }
            
            if (isset($data['artisanID'])) {
                $object->setArtisanID($data['artisanID']);
            }

            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }
    
    function updateDevis($DevisObject){
        
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
            
            $statusDevisUpdated = $DevisObject->getStatusDevis();
            $interventionIDUpdated = $DevisObject->getInterventionID();
            $artisanIDUpdated = $DevisObject->getArtisanID();
            $ID = $DevisObject->getID();
            
            //On update la table
            $query = "UPDATE Devis SET InterventionID = :interventionID, statusDevis = :statusDevis, artisanID = :artisanIDUpdated  WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':statusDevis', $statusDevisUpdated);
            $request->bindParam(':interventionID', $interventionIDUpdated);
            $request->bindParam(':artisanID', $artisanIDUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
            
           

}

?>

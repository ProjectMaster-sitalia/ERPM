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
            }
            if (isset($data['statusDevis'])) {
                $query = "SELECT libelle FROM DevisStatusDefinition WHERE ID = :id";
                $request = parent::getBdd()->prepare($query);
                // MAPPER L'ID
                $request->bindParam(':id', $data['statusDevis']);
                $request->execute();
                $data2 = $request->fetch();
                $object->setStatusDevis($data2['libelle']);
            }
            if (isset($data['interventionID'])) {
                $intervention = new _Intervention();
                $intervention = $intervention->getInterventionByID($data['interventionID']);
                $object->setIntervention($intervention);
            }
            
//            if (isset($data['artisanID'])) {
//                $object->setArtisanID($data['artisanID']);
//            }

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
            
            $statusDevisUpdated = $DevisObject->getStatusDevis();
            $interventionIDUpdated = $DevisObject->getIntervention();
            $artisanIDUpdated = $DevisObject->getArtisan();
            $ID = $DevisObject->getID();
            
            //On update la table
            $query = "UPDATE Devis SET interventionID = :interventionID, statusDevis = :statusDevis, artisanID = :artisanID  WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':statusDevis', $statusDevisUpdated);
            $request->bindParam(':interventionID', $interventionIDUpdated);
            $request->bindParam(':artisanID', $artisanIDUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function addDevis($devisObject){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            $statusDevis = $devisObject->getStatusDevis();
            $interventionID = $devisObject->getIntervention();
            $artisanID = $devisObject->getArtisan();
            $ID = $devisObject->getID();
            
            //On update la table
            $query = "INSERT INTO Devis VALUES(:id,:statusDevis,:interventionID,:artisanID)";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':statusDevis', $statusDevis);
            $request->bindParam(':interventionID', $interventionID);
            $request->bindParam(':artisanID', $artisanID);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    function deleteDevis($ID){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            
            //On supprime la table
            $query = "DELETE FROM Devis WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
            
           

}

?>

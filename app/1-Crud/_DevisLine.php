<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _DevisLine
 *
 * @author user
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/DevisLine.php';

class _DevisLine extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des DevisLines
    function getAllDevisLines() {
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
//            $query = "SELECT * FROM DevisLine";
//
//
//            $response = parent::getBdd()->query($query);
//// Boucler sur les resultats            
//            while ($data = $response->fetch()) {
//                // SI ID exite => Creer l'objet
//                if (isset($data['id'])) {
//                    $object = new DevisLine($data['id']);
//                } else {
//                    // ERROR
//                    return null;
//                }
//
//                // REMPLIR LOBJET AVEC LES ATTRIBUTS
//
//
//                if (isset($data['teamID'])) {
//                   // $object->setTypeCompte($data['typeCompte']);
//                    
//                }
//                if (isset($data['user'])) {
//                    $object->setTypeDevisLine($data['user']);
//                }
//                if (isset($data['password'])) {
//                    $object->setTypeDevisLine($data['password']);
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
    }

    function getDevisLineByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM DevisLine WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new DevisLine($data['ID']);

            if (isset($data['devisID'])) {
                $objectDevis = new _Devis();
                $objectDevis = $objectDevis->getDevisByID($data['devisID']);
                $object->setDevis($objectDevis);
            }
            if (isset($data['description'])) {
                $object->setDescription($data['description']);
            }
            if (isset($data['unite'])) {
                $object->setUnite($data['unite']);
            }
            if (isset($data['prixUnitaire'])) {
                $object->setPrixUnitaire($data['prixUnitaire']);
            }
            if (isset($data['quantite'])) {
                $object->setQuantite($data['quantite']);
            }
            if (isset($data['prixHT'])) {
                $object->setPrixHT($data['prixHT']);
            }
            if (isset($data['typeInterventionID'])) {
                $query = "SELECT libelle FROM DevisTypeInterventionDefinition WHERE ID = :id";
                $request = parent::getBdd()->prepare($query);
                $request->bindParam(':id', $data['typeInterventionID']);
                $request->execute();
                $data2 = $request->fetch();
                $object->setTypeIntervention($data2['libelle']);
            }

            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }
    
    function updateDevisLine($DevisLineObject){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            $devisIDUpdated = $DevisLineObject->getDevis();
            $descriptionUpdated = $DevisLineObject->getDescription();
            $uniteUpdated = $DevisLineObject->getUnite();
            $prixUnitaireUpdated = $DevisLineObject->getPrixUnitaire();
            $quantiteUpdated = $DevisLineObject->getQuantite();
            $prixHTUpdated = $DevisLineObject->getPrixHT();
            $typeInterventionIDUpdated = $DevisLineObject->getTypeIntervention();
            $ID = $DevisLineObject->getID();
            
            //On update la table
            $query = "UPDATE DevisLine SET devisID = :devisID,description = :description,unite = :unite, prixUnitaire = :prixUnitaire, quantite = :quantite, prixHT = :prixHT, typeInterventionID = :typeInterventionID WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':devisID', $devisIDUpdated);
            $request->bindParam(':description', $descriptionUpdated);
            $request->bindParam(':unite', $uniteUpdated);
            $request->bindParam(':prixUnitaire', $prixUnitaireUpdated);
            $request->bindParam(':quantite', $quantiteUpdated);
            $request->bindParam(':prixHT', $prixHTUpdated);
            $request->bindParam(':typeInterventionID', $typeInterventionIDUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function addDevisLine($DevisLineObject){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            $devisID = $DevisLineObject->getDevis();
            $description = $DevisLineObject->getDescription();
            $unite = $DevisLineObject->getUnite();
            $prixUnitaire = $DevisLineObject->getPrixUnitaire();
            $quantite = $DevisLineObject->getQuantite();
            $prixHT = $DevisLineObject->getPrixHT();
            $typeInterventionID = $DevisLineObject->getTypeIntervention();
            $ID = $DevisLineObject->getID();
            
            //On update la table
            $query = "INSERT INTO DevisLine VALUES(:id,:devisID,:description,:unite,:prixUnitaire,:quantite,:prixHT,:typeInterventionID)";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':devisID', $devisID);
            $request->bindParam(':description', $description);
            $request->bindParam(':unite', $unite);
            $request->bindParam(':prixUnitaire', $prixUnitaire);
            $request->bindParam(':quantite', $quantite);
            $request->bindParam(':prixHT', $prixHT);
            $request->bindParam(':typeInterventionID', $typeInterventionID);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function deleteDevisLine($ID){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            
            //On supprime la table
            $query = "DELETE FROM DevisLine WHERE ID = :id";
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

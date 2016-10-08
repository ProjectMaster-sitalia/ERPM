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
//            if (isset($data['typeCompteID'])) {
//                $typeCompte = new _TypeCompte();
//                $typeCompte = $typeCompte->getTypeCompteByID($data['typeCompteID']);
//                $object->setTypeCompte($typeCompte);
                
//                $object->setTypeCompte($data['typeCompteID']);
//                $query = "SELECT libelle FROM TypeCompte WHERE ID = :id";
//                $request = parent::getBdd()->prepare($query);
//                $request->bindParam(':id', $data['typeCompteID']);
//                $request->execute();
//                $data = $request->fetch();
//            }

            if (isset($data['devisID'])) {
                $object->setDevisID($data['devisID']);
            }
            if (isset($data['description'])) {
                $object->setDescription($data['description']);
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
                $object->setTypeInterventionID($data['typeInterventionID']);
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
            
            $devisIDUpdated = $DevisLineObject->getDevisID();
            $descriptionUpdated = $DevisLineObject->getDescription();
            $uniteUpdated = $DevisLineObject->getUnite();
            $prixUnitaireUpdated = $DevisLineObject->getPrixUnitaire();
            $quantiteUpdated = $DevisLineObject->getQuantite();
            $prixHTUpdated = $DevisLineObject->getPrixHT();
            $typeInterventionIDUpdated = $DevisLineObject->getTypeInterventionID();
            $ID = $DevisLineObject->getID();
            
            //On update la table
            $query = "UPDATE DevisLine SET devisID = :devisID,description = :description,unite = :unite, prixUnitaire = : prixUnitaire, quantite = :quantite, prixHT = :prixHT, typeInterventionID = :typeInterventionID WHERE ID = :id";
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
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
                    

}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Intervention
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Intervention.php';

class _Intervention extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des Interventions
    function getAllInterventions() {
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
            $query = "SELECT * FROM Interventions";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new Intervention($data['id']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS

                if (isset($data['dateReception'])) {
                    $time = strtotime($data['dateReception']);
                    $myFormatForView = dateReception("m/d/y g:i A", $time);
                    $object->setDateReception($myFormatForView);
                }
                if (isset($data['dateIntervention'])) {
                    $time = strtotime($data['dateIntervention']);
                    $myFormatForView = dateIntervention("m/d/y g:i A", $time);
                    $object->setDateIntervention($myFormatForView);
                }
                if (isset($data['magasinID'])) {
                    $object->setMagasin($data['magasinID']);
                }
                if (isset($data['teamID'])) {
                    $object->setIntervention($data['teamID']);
                }
                if (isset($data['statusIntervention'])) {
                    $object->setStatus($data['statusIntervention']);
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

    function getInterventionByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Intervention WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new Intervention($data['ID']);
            if (isset($data['dateReception'])) {
                $time = strtotime($data['dateReception']);
                $myFormatForView = dateReception("m/d/y g:i A", $time);
                $object->setDateReception($myFormatForView);
            }
            if (isset($data['dateIntervention'])) {
                $time = strtotime($data['dateIntervention']);
                $myFormatForView = dateIntervention("m/d/y g:i A", $time);
                $object->setDateIntervention($myFormatForView);
            }
            if (isset($data['magasinID'])) {
                $object->setMagasin($data['magasinID']);
            }
            if (isset($data['teamID'])) {
                $object->setIntervention($data['teamID']);
            }
            if (isset($data['statusIntervention'])) {
                $object->setStatus($data['statusIntervention']);
            }



            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }
    
    function updateIntervention($InterventionObject){
        
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
            
            $typeCompteIDUpdated = $InterventionObject->getTypeCompte();
            $userUpdated = $InterventionObject->getUser();
            $passwordUpdated = $InterventionObject->getPassword();
            $ID = $InterventionObject->getID();
            
            //On update la table
            $query = "UPDATE Intervention SET typeCompteID = :typeCompteID,user = :user,password = :password WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':typeCompteID', $typeCompteIDUpdated);
            $request->bindParam(':user', $userUpdated);
            $request->bindParam(':password', $passwordUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function deleteIntervention($ID){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            
            //On supprime la table
            $query = "DELETE FROM Intervention WHERE ID = :id";
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
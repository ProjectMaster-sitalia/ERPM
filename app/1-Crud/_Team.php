<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Team
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Team.php';

class _Team extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des Teams
    function getAllTeams() {
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
            $query = "SELECT * FROM Team";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new Team($data['id']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS


                if (isset($data['teamID'])) {
                   // $object->setTypeCompte($data['typeCompte']);
                    
                }
                if (isset($data['user'])) {
                    $object->setTypeTeam($data['user']);
                }
                if (isset($data['password'])) {
                    $object->setTypeTeam($data['password']);
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

    function getTeamByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM Team WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new Team($data['ID']);
            if (isset($data['typeCompteID'])) {
                $typeCompte = new _TypeCompte();
                $typeCompte = $typeCompte->getTypeCompteByID($data['typeCompteID']);
                $object->setTypeCompte($typeCompte);
                
//                $object->setTypeCompte($data['typeCompteID']);
//                $query = "SELECT libelle FROM TypeCompte WHERE ID = :id";
//                $request = parent::getBdd()->prepare($query);
//                $request->bindParam(':id', $data['typeCompteID']);
//                $request->execute();
//                $data = $request->fetch();
            }
            if (isset($data['user'])) {
                $object->setUser($data['user']);
            }
            if (isset($data['password'])) {
                $object->setPassword($data['password']);
            }

            $request->closeCursor();
            return $object;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        return null;
    }
    
    function updateTeam($TeamObject){
        
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
            
            $typeCompteIDUpdated = $TeamObject->getTypeCompte();
            $userUpdated = $TeamObject->getUser();
            $passwordUpdated = $TeamObject->getPassword();
            $ID = $TeamObject->getID();
            
            //On update la table
            $query = "UPDATE Team SET typeCompteID = :typeCompteID,user = :user,password = :password WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':typeCompteID', $typeCompteIDUpdated);
            $request->bindParam(':user', $userUpdated);
            $request->bindParam(':password', $passwordUpdated);
            $request->bindParam(':id',$ID);
            $request->execute();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
            
           

}

?>
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
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function addteam($teamObject){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            $typeCompteID = $teamObject->getTypeCompte();
            $user = $teamObject->getUser();
            $password = $teamObject->getPassword();
            $ID = $teamObject->getID();
            
            //On update la table
            $query = "INSERT INTO Team VALUES(:id,:typeCompteID,:user,:password)";
            $request = parent::getBdd()->prepare($query);
            $request->bindParam(':typeCompteID', $typeCompteID);
            $request->bindParam(':user', $user);
            $request->bindParam(':password', $password);
            $request->bindParam(':id',$ID);
            $request->execute();
            parent::getBdd()->commit();
            
            $request->closeCursor();
            
                    } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    function deleteTeam($ID){
        
         try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }
            
            
            //On supprime la table
            $query = "DELETE FROM Team WHERE ID = :id";
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
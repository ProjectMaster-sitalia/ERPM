<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _Mails
 *
 * @author kzexo
 */
require_once 'DataBaseConnection.php';
require_once './2-Model/Mails.php';

class _Mails extends DataBaseConnection {

    function __construct() {
        parent::__construct();
    }

    //Recuperer la liste des mail
    function getAllMails() {
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
            $query = "SELECT * FROM InterventionMails";


            $response = parent::getBdd()->query($query);
// Boucler sur les resultats            
            while ($data = $response->fetch()) {
                // SI ID exite => Creer l'objet
                if (isset($data['id'])) {
                    $object = new Mails($data['id']);
                } else {
                    // ERROR
                    return null;
                }

                // REMPLIR LOBJET AVEC LES ATTRIBUTS

                if (isset($data['date'])) {
                    $time = strtotime($data['date']);
                    $myFormatForView = date("m/d/y g:i A", $time);
                    $object->setDate($myFormatForView);
                }
                if (isset($data['objet'])) {
                    $object->setObjet($data['objet']);
                }
                if (isset($data['content'])) {
                    $object->setContent($data['content']);
                }
                if (isset($data['typeMailID'])) {
                    $object->setTypeMail($data['typeMailID']);
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

    function getMailsByID($id) {
        try {
            // INITIALISER LA CONNEXION BDD
            if (is_null(parent::getBdd())) {
                parent::__construct();
            }
            if (!parent::getBdd()->inTransaction()) {
                parent::getBdd()->beginTransaction();
            }

            // PREPARER LA SQL QUERY
            $query = "SELECT * FROM InterventionMails WHERE ID = :id";
            $request = parent::getBdd()->prepare($query);
            // MAPPER L'ID
            $request->bindParam(':id', $id);
            $request->execute();
            $data = $request->fetch();
            //INSTENTIER L'OBJET
            $object = new Mails($data['ID']);

            if (isset($data['date'])) {
                $time = strtotime($data['date']);
                $myFormatForView = date("m/d/y g:i A", $time);
                $object->setDate($myFormatForView);
            }
            if (isset($data['objet'])) {
                $object->setObjet($data['objet']);
            }
            if (isset($data['content'])) {
                $object->setContent($data['content']);
            }
            if (isset($data['typeMailID'])) {
                $object->setTypeMail($data['typeMailID']);
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
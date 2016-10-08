<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailsComponent
 *
 * @author kzexo
 */
require_once './3-Controller/MailsController.php';
require_once './2-Model/Mails.php';
require_once './1-Crud/_Mails.php';

class mailsComponent {

    //put your code here

    private $mailsController;
    private $mails;

    function __construct() {

        $this->mailsController = new mailsController();
        
    }

    public function getmailsTestVue($id) {

        $this->mails = $this->mailsController->getmailsByID($id);
        if ($this->mails) {
            var_dump($this->mails);
            $ID = $this->mails->getID();
            $objet = $this->mails->getObjet();
            
            $output = ("<h1>$ID</h1>");
            $output.=("<p>$objet</p>");
            return $output;
        }
        else
            return null;
    }

    public function setmailsController($mailsController) {
        $this->mailsController = $mailsController;
    }

}

?>
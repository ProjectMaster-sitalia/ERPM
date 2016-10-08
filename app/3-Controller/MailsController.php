<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mails
 *
 * @author kzexo
 */
require_once './1-Crud/_Mails.php';

class mailsController {

    //put your code here

    private $mailsCrud;

    function __construct() {
        $this->mailsCrud = new _mails();
    }

    public function getmailsByID($id) {
        return $this->mailsCrud->getmailsByID($id);
    }

    public function getAllmails() {
        return $this->mailsCrud->getAllmails();
    }

}

?>
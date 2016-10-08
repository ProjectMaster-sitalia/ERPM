<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBaseConnection
 *
 * @author kzexo
 */
class DataBaseConnection {
    //put your code here
    
    private $bdd; 

    public function __construct(){
        try {
            $this->bdd = new PDO('mysql:host=sqlgold.phpnet.org:48393;dbname=ERPMASTORE;charset=utf8', 'ERPMASTORE', '55Qb98TqljYm',
                array(
                    PDO::ATTR_TIMEOUT => "1000",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => true
                )); 
            ini_set('mysql.connect_timeout', 300);
            ini_set('default_socket_timeout', 300);
           /* $this->bdd = new PDO('mysql:host=cl1-sql21.phpnet.org;dbname=kzexo3;charset=utf8', 'kzexo3', '66fEUEqLQdj9',
                array(
                    PDO::ATTR_TIMEOUT => "100",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));*/
            $this->bdd->exec("SET CHARACTER SET utf8");
        }catch(Exception $e){
            error_log($e->getMessage());
            $bdd=null;
        }
    }

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
    }
}

?>

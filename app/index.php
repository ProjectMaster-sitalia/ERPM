<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '4-Vue/initVue.php';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
//        echo $teamComponent->getTeamTestVue(1);
//        $teamComponent->updateTeamTestVue(1,2,"userUpdated3","passwordUpdated3");
//        echo $teamComponent->getTeamTestVue(1);
        
//        echo $compagnieComponent->getCompagnieTestVue(1);
//        $compagnieComponent->updateCompagnieTestVue(1,"managerUpdated","libelleUpdated","logoUpdated","adresseFacturationUpdated");
//        echo $compagnieComponent->getCompagnieTestVue(1);
        
//        echo $devisComponent->getDevisTestVue(1);
//        $devisComponent->updateDevisTestVue(1,2,3,1);
//        echo $devisComponent->getDevisTestVue(1);

          echo $devisLineComponent->getDevisLineTestVue(1);
//          $devisLineComponent->updateDevisLineTestVue(2,2,"description",20,3,250,2);
//          echo $devisLineComponent->getDevisTestVue(1);
          
        ?>
    </body>
</html>

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
        echo $teamComponent->getTeamTestVue(1);
        $teamComponent->updateTeamTestVue(1,2,"userUpdated3","passwordUpdated3");
        echo $teamComponent->getTeamTestVue(1);
        ?>
    </body>
</html>

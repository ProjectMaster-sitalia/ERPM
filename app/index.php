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
        
        /* Compagnie */
          //add
//        $compagnieComponent->addCompagnieTestVue(1,"manager1","libelle1","logo1","adressFacturation1");
//        //update   
//        echo $compagnieComponent->getCompagnieTestVue(1);
//        $compagnieComponent->updateCompagnieTestVue(1,"manager18","libelle18","logo18","adressFacturation18");
//        echo $compagnieComponent->getCompagnieTestVue(1);
//        //delete
//        $compagnieComponent->deleteCompagnieTestVue(1);
//        echo $compagnieComponent->getCompagnieTestVue(1);
        /*Compagnie*/
        
//        /* Magasin */
//        //add
//        $magasinComponent->addMagasinTestVue(2,"adresseFacturation2",2,"adressePhysique2");//compagnie ID
//        //update
//        echo $magasinComponent->getMagasinTestVue(1);
//        $magasinComponent->updateMagasinTestVue(1,"adresseFacturation1",3,"adressePhysique1");
//        echo $magasinComponent->getMagasinTestVue(1);
//        //delete
//        $magasinComponent->deleteMagasinTestVue(2);
//        echo $magasinComponent->getMagasinTestVue(2);
//        /*Magasin*/
//        
//        /* Team */
//        //add
//        $teamComponent->addTeamTestVue(4,1,"user4","password4");//typeCompteID
//        //update
//        echo $teamComponent->getTeamTestVue(5);
//        $teamComponent->updateTeamTestVue(5,2,"user55","password55");
//        echo $teamComponent->getTeamTestVue(5);
//        //delete
//        $teamComponent->deleteTeamTestVue(4);
//        echo $teamComponent->getTeamTestVue(4);
//        /*Team*/
//        
//        /* Intervention */
          //add
//        $interventionComponent->addInterventionTestVue(2,"2016-10-11","2016-10-15",1,2,2);//magasinID,teamID,statusInterventionID
//        //update
//        echo $interventionComponent->getInterventionTestVue(1);
//        $interventionComponent->updateInterventionTestVue(1,"2018-10-13","2019-12-31",2,3,3);
//        echo $interventionComponent->getInterventionTestVue(1);
//        //delete
//        $interventionComponent->deleteInterventionTestVue(2);
//        /*Intervention*/
//        
//        
//        Tout est fait et testé jusqu'ici
//        
//        
//        
//        /* Devis */
//        $devisComponent->addDevisTestVue(1);
//        echo $devisComponent->getDevisTestVue(1);
//        $devisComponent->updateDevisTestVue(1);
//        $devisComponent->deleteDevisTestVue(1);
//        /*Devis*/
//        
//        /* DevisLine */
//        $devisLineComponent->addDevisLineTestVue(1);
//        echo $devisLineComponent->getDevisLineTestVue(1);
//        $devisLineComponent->updateDevisLineTestVue(1);
//        $devisLineComponent->deleteDevisLineTestVue(1);
//        /*DevisLine*/
//        
//        /* InterventionMails */
//        $interventionMailsComponent->addInterventionMailsTestVue(1);
//        echo $interventionMailsComponent->getInterventionMailsTestVue(1);
//        $interventionMailsComponent->updateInterventionMailsTestVue(1);
//        $interventionMailsComponent->deleteInterventionMailsTestVue(1);
//        /*InterventionMails*/
//        
//        /* InterventionMailsPJ */  //Probleme : le model Mail doit etre créé
////        $interventionMailsPJComponent->addInterventionMailsPJTestVue(1);
////        echo $interventionMailsPJComponent->getInterventionMailsPJTestVue(1);
////        $interventionMailsPJComponent->updateInterventionMailsPJTestVue(1);
////        $interventionMailsPJComponent->deleteInterventionMailsPJTestVue(1);
//        /*InterventionMailsPJ*/
//        
//        /* InterventionMedia */
//        $interventionMediaComponent->addInterventionMediaTestVue(1);
//        echo $interventionMediaComponent->getInterventionMediaTestVue(1);
//        $interventionMediaComponent->updateInterventionMediaTestVue(1);
//        $interventionMediaComponent->deleteInterventionMediaTestVue(1);
//        /*InterventionMedia*/
//        
//        /* InterventionArtisanMedia */  //Probleme : le model Mail doit etre créé
////        $interventionArtisanMediaComponent->addInterventionArtisanMediaTestVue(1);
////        echo $interventionArtisanMediaComponent->getInterventionArtisanMediaTestVue(1);
////        $interventionArtisanMediaComponent->updateInterventionArtisanMediaTestVue(1);
////        $interventionArtisanMediaComponent->deleteInterventionArtisanMediaTestVue(1);
//        /*InterventionArtisanMedia*/
//        
//        /* Todo */
//        $todoComponent->addTodoTestVue(1);
//        echo $todoComponent->getTodoTestVue(1);
//        $todoComponent->updateTodoTestVue(1);
//        $todoComponent->deleteTodoTestVue(1);
//        /*Todo*/
//        
//        /* Wiki */
//        $wikiComponent->addWikiTestVue(1);
//        echo $wikiComponent->getWikiTestVue(1);
//        $wikiComponent->updateWikiTestVue(1);
//        $wikiComponent->deleteWikiTestVue(1);
//        /*Wiki*/

//        echo $teamComponent->getTeamTestVue(1);
//        $teamComponent->updateTeamTestVue(1,2,"userUpdated3","passwordUpdated3");
//        echo $teamComponent->getTeamTestVue(1);
        
//        echo $compagnieComponent->getCompagnieTestVue(1);
//        $compagnieComponent->updateCompagnieTestVue(1,"managerUpdated","libelleUpdated","logoUpdated","adresseFacturationUpdated");
//        echo $compagnieComponent->getCompagnieTestVue(1);
        
//        echo $devisComponent->getDevisTestVue(1);
//        $devisComponent->updateDevisTestVue(1,2,3,1);
//        echo $devisComponent->getDevisTestVue(1);

//          echo $devisLineComponent->getDevisLineTestVue(1);
//          $devisLineComponent->updateDevisLineTestVue(1,2,"description",20,3,250,842,3);
//          echo $devisLineComponent->getDevisLineTestVue(1);
//          

//          echo $magasinComponent->getmagasinTestVue(1);
//          $magasinComponent->updatemagasinTestVue(1,"adressFact1",2,"adressePhhysique1");
//          echo $magasinComponent->getmagasinTestVue(1);
          
        //$teamComponent->deleteTeamTestVue();
//        $affilieComponent->deleteAffilieTestVue(1);
        //$compagnieComponent->deleteCompagnieTestVue();
//        $facturationArtisanComponent->deleteFacturationArtisanTestVue(1);
//        $interventionComponent->deleteInterventionTestVue();
//        $magasinComponent->deleteMagasinTestVue(1);
//        $mailsComponent->deleteMailsTestVue(1);
//        $mediaComponent->deleteMediaTestVue(1);
//        $nAffilieComponent->deleteNAffilieTestVue(1);
//        $teamComponent->deleteTeamTestVue(1);
//        $typeCompteComponent->deleteTypeCompteTestVue(1);
//        $typeInterventionComponent->deleteTypeInterventionTestVue(1);
//        $devisComponent->deleteDevisTestVue(1);
//        $devisLineComponent->deleteDevisLineTestVue(1);
        ?>
    </body>
</html>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'Composants/AffilieComponent.php';
require 'Composants/CompagnieComponent.php';
require 'Composants/FacturationArtisanComponent.php';
require 'Composants/InterventionComponent.php';
require 'Composants/MagasinComponent.php';
require 'Composants/MailsComponent.php';
require 'Composants/MediaComponent.php';
require 'Composants/NAffilieComponent.php';
require 'Composants/TeamComponent.php';
require 'Composants/TypeCompteComponent.php';
require 'Composants/TypeInterventionComponent.php';
/**
 * Description of initVue
 *
 * @author kzexo
 */
 $affilieComponent = new AffilieComponent();
$facturationArtisanComponent = new FacturationArtisanComponent(1, 1);
$compagnieComponent = new CompagnieComponent();
$InterventionComponent = new InterventionComponent();
$MagasinComponent = new MagasinComponent();
$MailComponent = new mailsComponent();
$MediaComponent = new mediaComponent(); 
$NAffilieComponent = new NAffilieComponent();
$teamComponent = new teamComponent();
$typeCompteComponent = new typeCompteComponent();
$typeInterventionComponent = new typeInterventionComponent();
?>

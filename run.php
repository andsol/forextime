<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:22
 */

require_once('vendor/autoload.php');

$agency = \City\Company\ConstructionAgency::getInstance();

$building = \City\Company\ConstructionCompany::build();
$agency->addBuilding($building);

$building = \City\Company\ConstructionCompany::build();
$agency->addBuilding($building);

$family = new \City\Family(4, 'Stephanides');

$agency->registerFamily($family);

$docs = $family->getDocuments();
$docs[0]->printCertificate();


$family = new \City\Family(20, 'Nikolaides');

$agency->registerFamily($family);

$docs = $family->getDocuments();
$docs[0]->printCertificate();

$family = new \City\Family(2, 'Safin');

$agency->registerFamily($family);

$docs = $family->getDocuments();
$docs[0]->printCertificate();




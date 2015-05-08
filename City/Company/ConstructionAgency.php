<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:09
 */

namespace City\Company;

use \City\Building as Building;
use City\Company\ConstructionAgency\Certificate;

class ConstructionAgency {

    /**
     * @var Building\Unlimited[]
     */
    protected static $buildings = [];

    private static $_instance = null;

    private function __construct() {

    }

    protected function __clone() {

    }

    static public function getInstance() {
        if(is_null(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function addBuilding(Building\Unlimited $building){

        self::$buildings[] = $building;
        $number = count(self::$buildings);
        $building->setBuildingNumber($number);
    }

    public function registerFamily(\City\Family $family){

        $building = $this->_getBuilding();
        $flats = $building->getFlatList();

        $max = $building->getMaxPerFlat();
        if($max == null){
            $flatsNeeded = 1;
        } else {
            $flatsNeeded = ceil($family->getPeopleQty() / $max);
        }

        $freeFlats = [];
        $flatStep = 0;
        foreach($flats as $flatNumber => $busy){
            if($flatStep == $flatsNeeded){
                break;
            }
            if($busy == false){
                $freeFlats[] = $flatNumber;
                $flatStep ++;
            }
        }

        if($flatsNeeded == count($freeFlats)){

            foreach($freeFlats as $flatNumber){
                $building->registerFlat($flatNumber);
            }
            $this->_addCertificate($family, $freeFlats, $building);
        } else {
            throw new \Exception('No space for family: ' . $family->secondName);
        }

    }

    /**
     * @return Building\Unlimited
     */
    protected function _getBuilding(){
        $key = array_rand(self::$buildings);
        return self::$buildings[$key];
    }

    protected function _addCertificate(\City\Family $family, $flats, Building\Unlimited $building){

        $certificate = new Certificate($family, $building);
        $certificate->setBuildingNumber($building->getBuildingNumber());
        $certificate->setFlats($flats);

        $family->addDocument($certificate);

    }

}
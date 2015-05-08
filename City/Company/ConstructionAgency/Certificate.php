<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:15
 */

namespace City\Company\ConstructionAgency;


use City\Building\Unlimited;
use City\Family;

class Certificate {

    protected $_flats;
    protected $_building;

    protected $_buildingNumber;

    protected $_family;

    public function __construct(Family $family, Unlimited $building){
        $this->_family = $family;
        $this->_building = $building;
    }

    public function setFlats($flats){
        $this->_flats = $flats;
    }

    public function setBuildingNumber($number){
        $this->_buildingNumber = $number;
    }

    public function printCertificate(){

        $max = $this->_building->getMaxPerFlat() == null ? 'Unlimited' :  $this->_building->getMaxPerFlat();

        echo 'Family name: ' . $this->_family->secondName . PHP_EOL;
        echo 'People qty: ' . $this->_family->getPeopleQty() . PHP_EOL;
        echo 'Property data: ' . get_class($this->_building) . '. Max per flat: ' . $max . PHP_EOL;
        echo 'Building: ' . $this->_buildingNumber . PHP_EOL;
        echo 'Flats: ' . implode(' , ', $this->_flats)  . PHP_EOL;
        echo PHP_EOL;

    }
}
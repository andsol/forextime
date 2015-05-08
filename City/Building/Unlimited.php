<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:03
 */

namespace City\Building;


class Unlimited {

    protected $_maxPeopleLimit = null;

    protected $_buildingNumber = null;

    protected $_totalFlats;

    protected $_flats = [];

    public function __construct($floors, $porch, $flatsPerFloor){
        $this->_totalFlats = $floors * $porch * $flatsPerFloor;
        $this->_flats = array_fill(1, $this->_totalFlats, false);
    }

    public function setBuildingNumber($number){
        $this->_buildingNumber = $number;
    }

    public function getTotalFlatsQty(){
        return $this->_totalFlats;
    }

    public function registerFlat($flatNumber){

        if($this->_flats[$flatNumber] == true){
            throw new \Exception('Flat: ' . $flatNumber . ' already busy');
        }
        $this->_flats[$flatNumber] = true;
    }

    public function getFlatList(){
        return $this->_flats;
    }

    public function getMaxPerFlat(){
        return $this->_maxPeopleLimit;
    }

    public function getBuildingNumber(){
        return $this->_buildingNumber;
    }
}
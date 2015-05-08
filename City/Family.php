<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:00
 */

namespace City;

use \City\Company\ConstructionAgency as ConstructionAgency;


class Family {

    protected $_peopleCount;
    public $secondName;

    protected $_certificates = [];

    public function __construct($peopleCount, $secondName){
        $this->_peopleCount = $peopleCount;
        $this->secondName = $secondName;
    }

    public function addDocument(ConstructionAgency\Certificate $certificate){
        $this->_certificates[] = $certificate;
    }

    public function getPeopleQty(){

        return $this->_peopleCount;

    }

    /**
     * @return ConstructionAgency\Certificate[]
     */
    public function getDocuments(){

        return $this->_certificates;

    }

}
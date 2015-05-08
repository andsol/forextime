<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:04
 */

namespace City\Building;


class Luxury extends Unlimited {


    public function setMaxPeopleLimit($qty){

        $this->_maxPeopleLimit = $qty;

    }

}
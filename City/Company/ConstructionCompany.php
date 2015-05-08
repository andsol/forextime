<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 5/7/2015
 * Time: 21:23
 */

namespace City\Company;


class ConstructionCompany {

    protected static $_availableProjects = [
        'Luxury',
        'Unlimited'
    ];

    /**
     * @param string $projectName
     * @return \City\Building\Unlimited
     */
    public static function build($projectName = null)
    {

        if($projectName == null){
            $projectKey = rand(0, count(static::$_availableProjects) - 1);
            $projectName = self::$_availableProjects[$projectKey];
        }

        $class = '\City\Building\\' . $projectName;

        /**
         * @var \City\Building\Unlimited $building;
         */
        $building =  new $class(rand(1, 5), rand(1,3), rand(1,3));

        if($building instanceof \City\Building\Luxury){
            $building->setMaxPeopleLimit(rand(2,5));
        }

        return $building;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: astro
 * Date: 25-Feb-18
 * Time: 13:42
 */

class Guard {
    /**
     * Guard constructor.
     *
     * @param $loggedinuser
     * @param $roles
     */
    public function __construct($loggedinuser,$roles) {
		if($loggedinuser === null || !$loggedinuser->hasRole($roles)){
    //	Core::unauthorized('Access denied (incorrect role)');
          Redirecting::location('front/pages/login');
		}
	}
}
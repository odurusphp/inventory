<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 1/14/2020
 * Time: 2:14 PM
 */

class Loandata extends  tableDataObject
{

    const TABLENAME  = 'loans';

    public static function getLoanByCustomerID($bid){
        global $fdadb;
        $getdata = "SELECT *  from loans where bid = $bid  ";
        $fdadb->prepare($getdata);
        return $fdadb->singleRecord();
    }


}
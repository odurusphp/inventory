<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 12/15/2019
 * Time: 9:15 AM
 */

class Identification extends tableDataObject
{
    const TABLENAME  =  'identification';

    public static function getIdentificationByBid($bid){
        global $fdadb;
        $query = "select *  from identification where bid = $bid ";
        $fdadb->prepare($query);
        return  $fdadb->singleRecord();
    }
}
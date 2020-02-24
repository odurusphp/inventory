<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 1/16/2020
 * Time: 11:47 AM
 */

class Customernumbers extends tableDataObject
{
     const TABLENAME =  'customernumbers';

    public static function getnextaccount()
    {
        global $fdadb;
        $query = "select min(nid) as id  code  from customernumbers where status = 0 ";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();
    }

}
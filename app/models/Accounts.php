<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 1/2/2020
 * Time: 4:17 AM
 */

class Accounts extends tableDataObject
{
    const TABLENAME = 'accounts';

    public static function getCountbyAccounttype($accounttype, $bid){
        global $fdadb;
        $getdata = "SELECT count(*) as ct from accounts where accounttype = '$accounttype' and bid = $bid  ";
        $fdadb->prepare($getdata);
        return $fdadb->fetchColumn();
    }

    public static function getCountbyType($accounttype){
        global $fdadb;
        $getdata = "SELECT count(*) as ct from accounts where accounttype = '$accounttype' ";
        $fdadb->prepare($getdata);
        return $fdadb->fetchColumn();
    }

    public static function getCustomeraccounts($bid){
        global $fdadb;
        $getdata = "SELECT * from accounts where bid = $bid  ";
        $fdadb->prepare($getdata);
        return $fdadb->resultSet();
    }

    public static function getACountbyType($accounttype){
        global $fdadb;
        $getdata = "SELECT * from accounts where accounttype = '$accounttype' ";
        $fdadb->prepare($getdata);
        return $fdadb->resultSet();
    }

    public static function allAccounts(){
        global $fdadb;
        $getdata = "SELECT * from accounts order by accountname asc";
        $fdadb->prepare($getdata);
        return $fdadb->resultSet();
    }

    public static function getAccountTypebyAccountNumber($accountnumber){
        global $fdadb;
        $getdata = "SELECT * from accounts where where accountnumber = '$accountnumber'";
        $fdadb->prepare($getdata);
        return $fdadb->singleRecord();
    }

}
<?php

class Basicinformation extends tableDataObject{


    const TABLENAME = 'basicinformation';

     public static function getBasicid($uid){
        global $fdadb;
        $getrecords = "select basicid from basicinformation where uid = $uid ";
        $fdadb->prepare($getrecords);
        $fdadb->execute();
        return $fdadb->singleRecord();
    }

    public static function customercount(){
        global $fdadb;
        $getrecords = "select count(*) as ct from  basicinformation";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getCusterCountByTelephone($telephone){
        global $fdadb;
        $getrecords = "select count(*) as ct from  basicinformation where telephone = '$telephone'";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function approvedCustomers(){
        global $fdadb;
        $query = "Select * from basicinformation where status = 1";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }

    public static function pendingCustomers(){
        global $fdadb;
        $query = "Select * from basicinformation where status is null ";
        $fdadb->prepare($query);
        return $fdadb->resultSet();
    }







  }


 ?>

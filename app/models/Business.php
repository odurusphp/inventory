<?php

class Business extends  tableDataObject{

	const TABLENAME = 'business';

    
     public static function getExistingUserBusiness($uid){
          global $fdadb;
          $getrecords = "Select count(*) as buscount from business  where uid = '$uid' ";
          $fdadb->prepare($getrecords);
          $fdadb->execute();
          return $fdadb->fetchColumn();
      }




}


?>
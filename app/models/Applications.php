<?php

class Applications extends tableDataObject{

      const TABLENAME = 'applications';

      public static function getapplications($category){
          global $fdadb;
          $getrecords = "Select * from applications  where category = '$category' ";
          $fdadb->prepare($getrecords);
          $fdadb->execute();
          return $fdadb->resultSet();
      }




}



?>
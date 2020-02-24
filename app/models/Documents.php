<?php

class Documents extends tableDataObject{

      const TABLENAME = 'documents';

    public static function getDocumentbyID($bid, $type){
        global $fdadb;
        $query = "select *  from documents where bid = $bid and type = '$type' ";
        $fdadb->prepare($query);
        return  $fdadb->singleRecord();

    }

    public static function getDocumentbyIDCount($bid, $type){
        global $fdadb;
        $query = "select count(*) as ct  from documents where bid = $bid and type = '$type'";
        $fdadb->prepare($query);
        return $fdadb->fetchColumn();


    }


}



 ?>

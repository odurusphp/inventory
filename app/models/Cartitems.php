<?php

class Cartitems extends tableDataObject
{
  const TABLENAME  = 'cartitems';

    public static function getProductsBYID($productid){
        global $connectedDb;
        $query = "select * from cartitems where  productid = $productid  ";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }

    public static function getProductsBYCode($code){
        global $connectedDb;
        $query = "select * from cartitems where  cartcode = '$code'  ";
        $connectedDb->prepare($query);
        return $connectedDb->resultSet();
    }
}
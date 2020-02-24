<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 12/19/2019
 * Time: 4:09 PM
 */

class Payments extends tableDataObject
{

    const TABLENAME = 'payments';

    public static function getAllpaymentCount(){
        global $fdadb;
        $getrecords = "select count(*) from payments ";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getAllpaymentCountBydate($date){
        global $fdadb;
        $getrecords = "select count(*) from payments where dateofpayment = '$date' ";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getTotalpaymentsBydate($date){
        global $fdadb;
        $getrecords = "select sum(amount)as total  from payments where dateofpayment = '$date' ";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getTotalPayments(){
        global $fdadb;
        $getrecords = "select sum(amount) as total from payments ";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getTotalPaymentsbycustomer($bid){
        global $fdadb;
        $getrecords = "select sum(amount) as total from payments where bid = $bid ";
        $fdadb->prepare($getrecords);
        return $fdadb->fetchColumn();
    }

    public static function getAllpaymentsbyCustomer($bid){
        global $fdadb;
        $getrecords = "select * from payments where bid = $bid ";
        $fdadb->prepare($getrecords);
        return $fdadb->resultSet();
    }

    public static function getAllpaymentsbyToday(){
        global $fdadb;
        $today = date('Y-m-d');
        $getrecords = "SELECT * FROM payments INNER JOIN basicinformation ON
          payments.bid = basicinformation.bid where dateofpayment = '$today' ";
        $fdadb->prepare($getrecords);
        return $fdadb->resultSet();
    }

    public static function getAllpayments(){
        global $fdadb;
        $today = date('Y-m-d');
        $getrecords = "SELECT * FROM payments INNER JOIN basicinformation ON
          payments.bid = basicinformation.bid  ";
        $fdadb->prepare($getrecords);
        return $fdadb->resultSet();
    }

    public static function getAllpaymentsbyDate($from, $to){
        global $fdadb;
        $getrecords = "SELECT * FROM payments INNER JOIN basicinformation ON
          payments.bid = basicinformation.bid where dateofpayment between '$from' and '$to' ";
        $fdadb->prepare($getrecords);
        return $fdadb->resultSet();
    }

    public static function getAllpaymentByAccountnumber($accountnumber){
        global $fdadb;
        $getrecords = "select * from payments where accountnumber  = '$accountnumber' ";
        $fdadb->prepare($getrecords);
        return $fdadb->resultSet();
    }





}
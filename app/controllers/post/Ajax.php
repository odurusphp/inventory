<?php
/**
 * Created by PhpStorm.
 * User: oduru
 * Date: 1/1/2020
 * Time: 3:25 PM
 */

class Ajax extends PostController
{

    public function payments(){
        $from = date('Y-m-d', strtotime($_POST['from']));
        $to =  date('Y-m-d', strtotime($_POST['to']));
        $paymentdata =  Payments::getAllpaymentsbyDate($from, $to);
        $data = ['allpayments'=>$paymentdata];
        $this->view('pages/ajaxpayments', $data);
    }

    public function deletecustomer(){
        $homeservice = new Basicinformation($_POST['bid']);
        $homeservice->deleteFromDB();
    }

    public function approvecustomer(){

        $bid = $_POST['bid'];

        $ba = new Basicinformation($bid);
        $ba->recordObject->status = 1;
        $ba->store();
    }

    public function deletepayment(){
        $homeservice = new Payments($_POST['payid']);
        $homeservice->deleteFromDB();
    }

    public function viewaccounts(){
        $accountnumber = $_POST['accountnumber'];
        $accounttype = $_POST['accounttype'];
        $paydata = Payments::getAllpaymentByAccountnumber($accountnumber);
        $data = ['type'=>$accounttype, 'payments'=>$paydata];
        $this->view('pages/viewaccount', $data);

    }


}
<?php

class Invoicing extends Controller
{
   public function index(){
       new Guard();
       new RoleGuard('Create Invoice');
       $paymentstoday = Payments::listAllPaymentstoday();
       $data = ['paymentstoday'=>$paymentstoday];
       $this->view('pages/invoices', $data);
   }
    public function create(){
        new RoleGuard('Create Invoice');
        ini_set('display_errors', false);
        new Guard();
        if($_SESSION['invoicecode'] == null) {
            $_SESSION['invoicecode'] = uniqid();
        }
        $cartdata = Cartitems::getProductsBYCode($_SESSION['invoicecode']);
        $invociedata = Invoices::getInvoiceBYCode($_SESSION['invoicecode']);
        $products = Product::listAll();
        $data = ['cartdata' => $cartdata, 'products'=>$products ];
        $this->view('pages/createinvoice', $data);
    }

    public function refund(){
        new Guard();
        new RoleGuard('Refund Invoice');

        $refunddata = Refund::listAll();
        $data = ['refunddata' => $refunddata];
        $this->view('pages/refund', $data);
    }

    public function searchproduct(){
        $term =$_GET['term'];
        $prodata = Product::getProductByName($term);
        $productdata=[];
        foreach($prodata as $get){
            $productname = $get->productname;
            $productid = $get->productid;
            $productdata[] = array("productid"=>$productid,"productname"=>$productname);
        }
        echo json_encode($productdata);
    }

}
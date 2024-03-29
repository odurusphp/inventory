<?php


use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

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

        $refunddata = [];
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


    public function test($discountpercent=10, $userid=21, $invoicecode='5f2ed629c43e9',  $balance = null, $amountpaid = null)
    {
        $curl = curl_init();
        $user = new User($userid);
        $name = $user->recordObject->firstname;

        $invoicedata = Invoices::getInvoiceBYCode($invoicecode);
        $gettotalpayments = Payments::getPaymentsbyCode($invoicecode);
        $finalamount = $gettotalpayments->finalamount;
        $totalamtonivoice = $gettotalpayments->amount;
        $totalamt = $discountpercent + $finalamount;

        $data = json_encode(['invoicedata' => $invoicedata, 'discountpercent' => $discountpercent,
            'finalamount' => $finalamount, 'name' => $name, 'invoicecode' => $invoicecode,
            'totalamt' => $totalamt,  'balance'=>$balance, 'amountpaid'=>$amountpaid]);

        echo '<pre>';
        print_r($data);

    }
    public function testrefund($invoicecode = '5f85a00f52986',$totalrefund='200')
    {
        $user = new User(21);
        $name = $user->recordObject->firstname;
        $rdata = [];
        $refunddata = Refund::getRefundDetails($invoicecode);
        foreach($refunddata as $get){
            $refunddate = $get->refunddate;
            $productid = $get->productid;
            $quantity = $get->quantity;
            $amt = $get->totalamount;
            $pro = new Product($productid);
            $productname = $pro->recordObject->productname;
            $rdata[]  = ['refunddate'=>$refunddate, 'product'=>$productname,
                'quantity'=>$quantity, 'amount'=>$amt];
        }

        $data = json_encode(['refunddata'=>$rdata, 'name'=>$name, 'invoicecode'=>$invoicecode,
            'totalrefund'=>$totalrefund]);

        echo '<pre>';
        print_r($data);

    }

    public function reprint($invoicecode){

        $userid = $_SESSION['userid'];
        $user = new User($userid);
        $name = $user->recordObject->firstname;

        $invoicedata = Invoices::getInvoiceBYCode($invoicecode);
        $gettotalpayments =  Payments::getPaymentsbyCode($invoicecode);
        $finalamount = $gettotalpayments->finalamount;
        //$totalamtonivoice = $gettotalpayments->amount;
        $discountpercent = $invoicedata->discount;
        $totalamt = $discountpercent + $finalamount;

        $idata = [];
        foreach ($invoicedata as $get){
            $amount = $get->amount;
            $quantity = $get->quantity;
            $type = $get->type;
            $productid = $get->productid;
            $pro = new Product($productid);
            $productname = $pro->recordObject->productname;
            $idata[]  = ['amount'=>$amount, 'product'=>$productname,
                'quantity'=>$quantity, 'type'=>$type];


        }

        $data = ['invoicedata'=>$idata, 'discountpercent'=>$discountpercent,
            'finalamount'=>$finalamount, 'name'=>$name, 'invoicecode'=>$invoicecode,
            'totalamt'=>$totalamt];

        $this->view('pages/reprint', $data);


    }

    public function onlinereprint($invoicecode){
        $curl = curl_init();
        $invoicecode = $_GET['invoicecode'];
        $userid = $_SESSION['userid'];
        $user = new User($userid);
        $name = $user->recordObject->firstname;

        $invoicedata = Invoices::getInvoiceBYCode($invoicecode);
        $gettotalpayments =  Payments::getPaymentsbyCode($invoicecode);
        $finalamount = $gettotalpayments->finalamount;
        //$totalamtonivoice = $gettotalpayments->amount;
        $discountpercent = $invoicedata->discount;
        $totalamt = $discountpercent + $finalamount;

        $idata = [];
        foreach ($invoicedata as $get){
            $amount = $get->amount;
            $quantity = $get->quantity;
            $type = $get->type;
            $productid = $get->productid;
            $pro = new Product($productid);
            $productname = $pro->recordObject->productname;
            $idata[]  = ['amount'=>$amount, 'product'=>$productname,
                'quantity'=>$quantity, 'type'=>$type];


        }

        $data = json_encode(['invoicedata'=>$idata, 'discountpercent'=>$discountpercent,
            'finalamount'=>$finalamount, 'name'=>$name, 'invoicecode'=>$invoicecode,
            'totalamt'=>$totalamt]);



        curl_setopt_array($curl, array(
            CURLOPT_URL => NGROK_URL.'/print/reprint.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>$data,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        //echo $response;

    }



}
<?php

class Pages extends Controller{


    public function dashboard(){
        //new Guard($this->loggedInUser,['Regular']);
        $today  = date('Y-m-d');
        $basicdata = Basicinformation::listAll();
        $customercount = Basicinformation::customercount();
        $usercount =  count(User::listAll());
        $totalpayments = Payments::getTotalPayments();
        $paymentstoday = Payments::getTotalpaymentsBydate($today);
        $allpayments =   Payments::getAllpaymentsbyToday();

        $data = ['basicdata'=>$basicdata, 'customercount'=>$customercount,
            'usercount'=>$usercount, 'totalpayments'=>$totalpayments,
            'paymentstoday'=>$paymentstoday, 'allpayments'=>$allpayments];
        $this->view( 'pages/index', $data);
    }

    public function customerprofile($bid = null){
        //new Guard($this->loggedInUser,['Regular']);
        $cus = new Basicinformation($bid);
        $customerdata = $cus->recordObject;

        $payments = Payments::getAllpaymentsbyCustomer($bid);
        $toalpayments = Payments::getTotalPaymentsbycustomer($bid);
        $doc = Documents::getDocumentbyID($bid, 'Profile');
        $image = isset($doc->name) ? $doc->name :  'noimage.jpg';

        $iden = Documents::getDocumentbyID($bid, 'Identity');
        $idimage = isset($iden->name) ? $iden->name :  'noimage.jpg';

        //Identifcation Data
        $id =  Identification::getIdentificationByBid($bid);
        $idtype = isset($id->idtype) ? $id->idtype :  '';
        $idnumber = isset($id->idnumber) ? $id->idnumber :  '';
        $dateofissue = isset($id->dateofissue) ? $id->dateofissue :  '';
        $expirydate = isset($id->idnumber) ? $id->expirydate :  '';

        $accountdata  = Accounts::getCustomeraccounts($bid);
        $data = ['customerdata'=>$customerdata,  'payments'=>$payments,
            'totalpayments'=>$toalpayments, 'image'=>$image, 'accountdata'=>$accountdata,
             'idimage'=>$idimage, 'idtype'=>$idtype, 'idnumber'=>$idnumber, 'expirydate'=>$expirydate,
              'dateofissue'=>$dateofissue];

        $this->view( 'pages/customerprofile', $data);
    }

    public function customers(){
        //new Guard($this->loggedInUser,['Regular']);
        $pendingcustomers = Basicinformation::pendingCustomers();
        $approvedcustomers = Basicinformation::approvedCustomers();
        $data = ['pendingcustomers'=>$pendingcustomers, 'approvedcustomers'=>$approvedcustomers ];
        $this->view( 'pages/customer', $data);
    }

    public function payments($bid){
        //new Guard($this->loggedInUser,['Regular']);
        $paymentdata = Payments::getAllpaymentsbyCustomer($bid);
        $cus =  new Basicinformation($bid);
        $customerdata  = $cus->recordObject;
        $accounts  = Accounts::getCustomeraccounts($bid);
        $data = ['paymentdata'=>$paymentdata, 'customerdata'=>$customerdata, 'accountsdata'=>$accounts];
        $this->view( 'pages/payments', $data);
    }


    public function accounts($bid){
        //new Guard($this->loggedInUser,['Regular']);

        $cus =  new Basicinformation($bid);
        $customerdata  = $cus->recordObject;
        $accounts  = Accounts::getCustomeraccounts($bid);
        $data = ['customerdata'=>$customerdata, 'accountsdata'=>$accounts];
        $this->view( 'pages/accounts', $data);
    }

    public function users(){

        $users = User::listAll();
        $data = ['users'=>$users];
        $this->view( 'pages/users', $data);
    }

    public function blank(){
        //new Guard($this->loggedInUser,['Regular']);
        $this->view( 'pages/blank');
    }


    public function index(){
        //new Guard($this->loggedInUser,['Regular']);
        $this->view( 'pages/login');
    }


    public function logout(){
        session_destroy();
        header('Location:'.URLROOT.'/pages/index');
    }

    public function allpayments(){
        //new Guard($this->loggedInUser,['Regular']);
        $today  = date('Y-m-d');
        $basicdata = Basicinformation::listAll();
        $customercount = Basicinformation::customercount();
        $usercount =  count(User::listAll());
        $totalpayments = Payments::getTotalPayments();
        $paymentstoday = Payments::getTotalpaymentsBydate($today);
        $allpayments =   Payments::getAllpaymentsbyDate($today,$today);

        $data = ['basicdata'=>$basicdata, 'customercount'=>$customercount,
            'usercount'=>$usercount, 'totalpayments'=>$totalpayments,
            'paymentstoday'=>$paymentstoday, 'allpayments'=>$allpayments];
        $this->view( 'pages/allpayments', $data);
    }

    public function paymentscsv(){

        $allpayments =   Payments::getAllpayments();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.'tenant list.csv');
        $csvheader = array('Customer Name', 'Account Number', 'Payment Date', 'Amount');
        $output = fopen('php://output', 'w');
        fputcsv($output, $csvheader );

        foreach($allpayments as $get){

            $data = [$get->fullname, $get->accountnumber, $get->dateofpayment, $get->amount];
            fputcsv($output, $data);
        }

        exit();

    }


}



?>

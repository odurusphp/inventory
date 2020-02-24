<?php
class Pages extends PostController {

    public function index(){

        if(isset($_POST['login'])){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $usercount = User:: checkUserCredentials($email, $password);

            if($usercount > 0){
                $info = User::userinfo($email);
                $role = $info->role;
                $uid = $info->uid;
                $_SESSION['uid'] = $uid;
                header('Location:' . URLROOT . '/pages/dashboard');
            }else{
                $message = ['message'=>'Incorrect email or password'];
                $this->view('pages/login', $message);
                exit;
            }
        }else{
            $this->view('pages/login');
            exit;
        }

    }

    public function users(){

        if(isset($_POST['adduser'])){

            $usercount = User::getUserCountByEmail($_POST['email']);
            if($usercount == 0){
                $userdata = new User();
                $datarow =&  $userdata->recordObject;
                $datarow->telephone = $_POST['telephone'];
                $datarow->email = $_POST['email'];
                $datarow->lastname = $_POST['lastname'];
                $datarow->firstname =  $_POST['firstname'];
                $datarow->role =  $_POST['role'];
                $datarow->password = User::passwordMD5($_POST['password']);
                $datarow->datecreated = date('Y-m-d');
                if($userdata->store()) {
                    $uid = $userdata->recordObject->uid;
                    $this->insertuserrole($uid, $_POST['role']);
                    $users = User::listAll();
                    $data = ['users' => $users, 'response' => 'User successfully addded',
                        'class' => 'aler alert-success'];
                    $this->view('pages/users', $data);
                }
            }else{
                $users = User::listAll();
                $data = ['users'=>$users, 'response'=>'Error adding User. Email may exist already',
                    'class'=>'alert alert-danger' ];
                $this->view( 'pages/users', $data);
            }
        }
    }


    public function editusers($userid){
        if(isset($_POST['updateuser'])){
            $u = new User($userid);
            $datarow =&  $u->recordObject;
            $datarow->username = $_POST['email'];
            $datarow->email = $_POST['email'];
            $datarow->lastname = $_POST['lastname'];
            $datarow->firstname =  $_POST['firstname'];
            $datarow->role =  $_POST['role'];
            $datarow->password = User::encryptPassword($_POST['password']);
            $u->store();

            $u = new User($userid);
            $userdata = $u->recordObject;
            $alluserdata =  User::getUsers();
            $data = ['alluserdata'=>$alluserdata, 'user'=> $userdata];

            $this->view( 'pages/editusers', $data);
        }
    }

    public function customers(){

        if(isset($_POST['addcustomer'])){
            $usercount = Basicinformation::getCusterCountByTelephone($_POST['telephone']);
            if($usercount == 0){
                $userdata = new Basicinformation();
                $datarow =& $userdata->recordObject;
                $datarow->telephone = $_POST['telephone'];
                $datarow->email = $_POST['email'];
                $datarow->lastname = $_POST['lastname'];
                $datarow->firstname =  $_POST['firstname'];
                $datarow->gender =  $_POST['gender'];
                $datarow->dateofbirth = $_POST['dateofbirth'];
                $datarow->fullname = $_POST['firstname'].' '.$_POST['lastname'];
                //$datarow->accountnumber = $_POST['accountnumber'];
                $datarow->userid  = 1;
                $datarow->dateregistered = date('Y-m-d');
                if($userdata->store()) {
                    $users = Basicinformation::listAll();
                    $data = ['customerdata' => $users, 'response' => 'Customer successfully addded',
                        'class' => 'aler alert-success'];
                    $this->view('pages/customer', $data);
                }

            }else{
                $users = Basicinformation::listAll();
                $data = ['customerdata'=>$users,   'response'=>'Error adding Customer. Telephone may exist already',
                    'class'=>'alert alert-danger' ];
                $this->view( 'pages/customer', $data);
            }
        }
    }

    public function payments(){

        if(isset($_POST['addpayment'])){

                $bid = $_POST['bid'];
                $userdata = new Payments();
                $datarow =& $userdata->recordObject;
                $datarow->amount = $_POST['amount'];
                $datarow->bid = $_POST['bid'];
                $datarow->dateofpayment =  date('Y-m-d', strtotime($_POST['paymentdate']));
                $datarow->accountnumber = $_POST['accountnumber'];

                if($userdata->store()) {
                    $paymentdata = Payments::getAllpaymentsbyCustomer($bid);
                    $cus =  new Basicinformation($bid);
                    $customerdata  = $cus->recordObject;
                    $data = ['paymentdata'=>$paymentdata, 'customerdata'=>$customerdata,
                            'response' => 'Payment successfully addded',
                            'class' => 'aler alert-success'];
                    $this->view('pages/payments', $data);
                }
        }
    }


    private function insertuserrole($uid, $roleid){
        User::insertUserRoles($uid, $roleid);
    }


    public function  allpayments(){


        if(isset($_POST['downloadxml'])){
            $from = date('Y-m-d', strtotime($_POST['from']));
            $to =  date('Y-m-d', strtotime($_POST['to']));
            $paymentdata =  Payments::getAllpaymentsbyDate($from, $to);
            $xm  = new Xmlreport();
            $xm->createXml($paymentdata);
            exit;
        }


        if(isset($_POST['downloadexcel'])){
            $from = date('Y-m-d', strtotime($_POST['from']));
            $to =  date('Y-m-d', strtotime($_POST['to']));
            $paymentdata =  Payments::getAllpaymentsbyDate($from, $to);
            Excelreport::payments($from, $to);
            exit;
        }



    }


    public function accounts($bid = null){

        $bid  = $_POST['bid'];
        $accounttype  = $_POST['accounttype'];

        $ba =  new Basicinformation($bid);
        $staffnumber = $ba->recordObject->staffnumber;
        $accountname = $ba->recordObject->fullname;

        $accountcode = '';
        if($accounttype  ==  'Loan Account'){
            $accountcode = '01';
        }elseif($accounttype  ==  'Susu Account'){
            $accountcode = '02';
        }elseif($accounttype  ==  'Savings Account'){
            $accountcode = '03';
        }elseif($accounttype  ==  'Cash Collateral'){
            $accountcode = '04';
        }elseif($accounttype  ==  'Current Account'){
            $accountcode = '05';
        }

        $currency = '001';
        $branchcode = '021';
        $accountnumber = $branchcode.$accountcode.$currency.$staffnumber;

        $accountcount = Accounts::getCountbyAccounttype($accounttype, $bid);

        //Checking if Account Type exists
        if($accountcount > 0){
            $cus =  new Basicinformation($bid);
            $customerdata  = $cus->recordObject;
            $accounts  = Accounts::getCustomeraccounts($bid);
            $data = ['customerdata'=>$customerdata, 'accountsdata'=>$accounts,
                      'alert'=> 'alert alert-danger', 'message'=> 'Account type already exists'];
            $this->view( 'pages/accounts', $data);
            exit;
        }


        //Insert account
        $ac = new Accounts();
        $ac->recordObject->accountnumber = $accountnumber;
        $ac->recordObject->accounttype = $accounttype;
        $ac->recordObject->accountname = $accountname;
        $ac->recordObject->bid = $bid;
        if($ac->store()){
            $cus =  new Basicinformation($bid);
            $customerdata  = $cus->recordObject;
            $accounts  = Accounts::getCustomeraccounts($bid);
            $data = ['customerdata'=>$customerdata, 'accountsdata'=>$accounts,
                     'alert'=> 'alert alert-success', 'message'=> 'Acount created successfully'];
            $this->view( 'pages/accounts', $data);
            exit;
        }

    }












}

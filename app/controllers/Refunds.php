<?php


class Refunds extends Controller
{
    public function index(){
        new Guard();
        new RoleGuard('Refund Invoice');
        $refunddata = Refund::listAll();
        $data = ['refunddata' => $refunddata];
        $this->view('pages/refundreport', $data);
    }

}
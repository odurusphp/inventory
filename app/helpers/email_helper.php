<?php
/**
 * Created by PhpStorm.
 * User: cassie
 * Date: 5/3/18
 * Time: 4:14 PM
 */
    function sendEmail($senderemail, $receiveremail, $subject, $message, $customer, $atttach=true, $attachtype=null)
    {
        $error = 'Error';
        $success = 'Success';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = "smtp.gmail.com"; //"smtp.mailgun.org";
        $mail->Port       = 465;
        $mail->Username   = USERNAME;
        $mail->Password   = PASSWORD;

        $mail->From = $senderemail;
        $mail->FromName = $customer;
        $mail->Sender = $senderemail;

        $mail->AddAddress($receiveremail);
        $mail->Subject = $subject;

        $mail->IsHTML(true);
        $mail->Body = $message;

        if ($atttach == true){
            if (is_null($attachtype)){
                $mail->addAttachment(APPROOT.'/uploads/menteeRegistration.xlsx');
            }else{
                $mail->addAttachment(EMENTORINGUPLOAD . '/public/uploads/calendarimport.ics');
            }
        }

        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return $success;
        }


    }

function sendproductSMS($telephone, $product, $quantity, $newquantity, $remaining){

     $key=SMS_KEY;
     $message =  'Product '.$product . ' has sold '. $newquantity. ' and remaining '. $remaining ;
     $message=urlencode($message);
     $sender_id = 'NMNAMU';

    $url="https://apps.mnotify.net/smsapi?key=$key&to=$telephone&msg=$message&sender_id=$sender_id";
    $result=file_get_contents($url);

    $apiresponse = json_decode($result, true);
    $apicode = $apiresponse['code'];

    if($apicode == '1000') {
        return 'success';
    }else{
        return  'error';
    }


}

function sendrefundSMS($telephone, $product, $quantity, $newquantity, $remaining){

    $key=SMS_KEY;
    $message =  'Product '.$product . ' has  been refunded '. $newquantity. ' and remaining '. $remaining ;
    $message=urlencode($message);
    $sender_id = 'NMNAMU';

    $url="https://apps.mnotify.net/smsapi?key=$key&to=$telephone&msg=$message&sender_id=$sender_id";
    $result=file_get_contents($url);

    $apiresponse = json_decode($result, true);
    $apicode = $apiresponse['code'];

    if($apicode == '1000') {
        return 'success';
    }else{
        return  'error';
    }


}


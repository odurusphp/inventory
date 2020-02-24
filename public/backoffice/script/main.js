$(document).ready(function() {


  const urlroot = fdacfg.urlroot;

	$('#dateofcommencement,#dateofbirth, #paymentdate').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'yy-mm-dd'
      });

    $("#from, #to").datepicker({inline: true,
        changeMonth: true, changeYear: true, yearRange: "1920:2020",
        dateFormat: 'yy-mm-dd', autoclose: true,
        todayHighlight: true });


    $('.apptables').DataTable();


    function AjaxPostRequest(ajaxurl, postdata){

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data : postdata,
            beforeSend: function () {
                $.blockUI();
            },
            success: function (text) {
                $("#ajaxcontainer").html(text);
            },
            complete: function () {
                $.unblockUI();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });
    }


    function AjaxPostRedirection(ajaxurl, postdata, redirectionurl){

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data : postdata,
            beforeSend: function () {
                $.blockUI();
            },
            success: function (text) {
                window.location.href = redirectionurl;
            },
            complete: function () {
                $.unblockUI();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });
    }

    $(document).on('click', '#searchpayment', function(){
        var from  = $('#from').val();
        var to  = $('#to').val();
        var postdata = {from:from, to:to};
        var ajaxurl =  urlroot + '/ajax/payments/';
        AjaxPostRequest(ajaxurl, postdata)
    })

    $(document).on('click', '#downloadxml', function(){
        var from  = $('#from').val();
        var to  = $('#to').val();
        var postdata = {from:from, to:to};
        var ajaxurl =  urlroot + '/ajax/paymentxml/';
        AjaxPostRequest(ajaxurl, postdata)
    })

    $(document).on('click', '.approvecustomer', function(){
        var bid =  $(this).attr('bid');
        var ajaxurl = '';
        var postdata = {bid:bid};

        if($(this).is(':checked') == true){
             ajaxurl =  urlroot + '/ajax/approvecustomer';
              var redirectionurl=  urlroot + '/pages/customers';
            if(confirm('Do you want to  approve customer ?')) {
                AjaxPostRedirection(ajaxurl, postdata, redirectionurl)
            }
        }

    })

    $(document).on('click', '.deletecustomer', function(){
        var bid =  $(this).attr('bid');

        var postdata = {bid:bid};

        ajaxurl =  urlroot + '/ajax/deletecustomer';
        var redirectionurl=  urlroot + '/pages/customers';
        if(confirm('Do you want to delete customer ?')) {
            AjaxPostRedirection(ajaxurl, postdata, redirectionurl)
        }


    })

    $(document).on('click', '.deletepayment', function(){

        var bid =  $(this).attr('bid');
        var payid =  $(this).attr('payid');

        var postdata = {payid:payid};

        ajaxurl =  urlroot + '/ajax/deletepayment';
        var redirectionurl=  urlroot + '/pages/customerprofile/'+ bid;
        if(confirm('Do you want to delete payment ?')) {
            AjaxPostRedirection(ajaxurl, postdata, redirectionurl)
        }

    })

    $(document).on('click', '.accountview', function(){

        $('#viewmodal').modal('show');
        var accountnumber =  $(this).attr('account');
        var accounttype =  $(this).attr('accounttype');
        var postdata = {accountnumber : accountnumber, accounttype:accounttype};

        ajaxurl =  urlroot + '/ajax/viewaccounts';
        AjaxPostRequest(ajaxurl, postdata)


    })


})
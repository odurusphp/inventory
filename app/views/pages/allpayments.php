<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <form method="post">
                <table>
                    <tr>
                        <td><input class="form-control" placeholder="From" name="from" id="from"/></td>
                        <td><input class="form-control" placeholder="To" name="to" id="to" /></td>
                        <td><a href='#' id="searchpayment" style="color:#fff" class="btn btn-sm btn-warning pull-right">
                                <i class = 'fa fa-search'></i> Search </a></td>
                        <td> <button type='submit' name="downloadxml" style="color:#fff"
                                class="btn btn-sm btn-primary pull-right">
                                <i class = 'fa fa-folder-open-o'></i> Download XML File </button></td>
                        <td> <button type='submit' name="downloadexcel" style="color:#fff"
                                     class="btn btn-sm btn-success pull-right">
                                <i class = 'fa fa-folder-open-o'></i> Download Excel File </button></td>
                    </tr>
                </table>
                </form>

                <br/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        Summary of Collections and Payments

                    </div>
                    <div class="table-responsive" id="ajaxcontainer">
                        <table class="table table-condensed align-items-center table-striped" style="font-size: 12px">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Account No:</th>
                                <th>Telephone </th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                            </tr>
                            </thead>
                            <?php foreach ($data['allpayments'] as $get):   ?>
                                <tr>
                                    <td><a href="<?php echo URLROOT.'/pages/customerprofile/'.$get->bid  ?>"><?php echo $get->fullname ?></td>
                                    <td><?php echo $get->accountnumber ?></td>
                                    <td><?php echo $get->telephone ?></td>
                                    <td><?php echo $get->amount ?></td>
                                    <td><?php echo $get->dateofpayment ?></td>

                                </tr>
                            <?php  endforeach;  ?>



                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Row-->



        <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->

</div><!--End content-wrapper-->
<!--Start Back To Top Button-->


<!--End Back To Top Button-->

<?php  require ("includes/footer.php"); ?>

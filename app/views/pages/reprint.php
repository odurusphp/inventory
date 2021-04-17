<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">



        <div class="row">


            <div class="col-lg-6" style="margin-top: 5px">
                <div class="card" style="padding:10px">
                    <form method="post">
                        <table class="table">
                            <tr>
                                <input type="hidden" name="invoicecode" value="<?php  echo $data['invoicecode'] ?>">
                                <td align="right">
                                    <button type="submit" name="reprint"  style="color:#fff"
                                            class="btn btn-sm btn-danger pull-right">
                                        <i class = 'fa fa-print'></i> Re-print</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                        <table class="table table-bordered table-sm" style="font-size: 12px">
                            <tr style="font-weight: 700; font-size: 15px">
                                <td>Transaction Code</td>
                                <td> <?php  echo $data['invoicecode'] ?></td>
                            </tr>
                            <?php  foreach($data['invoicedata'] as $key=>$get): ?>
                            <tr>
                                <td><?php echo $key+1?>:  Product</td>
                                <td><?php  echo $get['product']  ?></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td><?php  echo $get['quantity'] .' - '.$get['type']   ?></td>
                            </tr>

                            <tr>
                                <td>Unit Price</td>
                                <td> <?php  echo $get['amount']  ?></td>
                            </tr>

                            <tr>
                                <td>Total Price</td>
                                <td> <?php  echo $get['amount'] * $get['quantity'] ?></td>
                            </tr>

                                <tr>
                                    <td colspan="2"><br/></td>
                                </tr>
                            <?php  endforeach; ?>

                            <tr style="font-weight: 700; font-size: 15px">
                                <td>Total Amount before discount</td>
                                <td> <?php  echo $data['totalamt'] ?></td>
                            </tr>
                            <tr style="font-weight: 700; font-size: 15px">
                                <td>Discount</td>
                                <td> <?php  echo $data['discountpercent'] ?></td>
                            </tr>

                            <tr style="font-weight: 700; font-size: 15px">
                                <td>Total Paid</td>
                                <td> <?php  echo $data['finalamount'] ?></td>
                            </tr>

                        </table>


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

<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>
<style>
    tr, td{
        padding: 2px;
    }
</style>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Invoicing</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Refund </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Refund Invoice</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-sm apptables" style="font-size: 12px">
                    <thead>
                    <tr>
                        <td>Code</td>
                        <td>Product</td>
                        <td>Quantity</td>
                        <td>Refund Amt</td>
                        <td>Inv Amt</td>
                        <td>Date</td>
                    </tr>
                    </thead>
                    <?php  foreach($data['refunddata'] as $get){
                        $productcount = Product::getProductCountById($get->productid);
                        if($productcount > 0) {
                            $p = new Product($get->productid);
                            $finalpaydata = Payments::getPaymentsbyCode($get->invoicecode);
                            $pay = isset($finalpaydata->finalamount) ? $finalpaydata->finalamount : 0;
                            ?>
                            <tr>
                                <td><?php echo $get->invoicecode ?></td>
                                <td><?php echo $p->recordObject->productname ?></td>
                                <td><?php echo $get->quantity ?></td>
                                <td><?php echo($get->amount * $get->quantity) ?></td>
                                <td><?php echo $pay ?></td>
                                <td><?php echo $get->refunddate ?></td>

                            </tr>
                            <?php
                        }

                    }  ?>

                </table>
            </div>

        </div>
    </div>


    <?php  require ("includes/footer.php"); ?>

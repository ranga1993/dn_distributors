<?php require_once ('cus_header.php') ?>
<?php require_once ('top.php') ?>
<?php require_once ('customer_side_bar.php') ?>

<div class="container">
        <h1>Pending Orders</h1>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Delivery Address </th>
                        <th>Order Date </th>
                        <th>View Details</th>

                    </tr>
                </thead>

                <tbody>
                <?php
                //print_r($pending_orders);
                $num_pending=$pending_orders->num_rows();

                if($num_pending>0){

                    foreach($pending_orders->result() as $rec){?>
                        <tr>
                            <td> <?php echo $rec-> order_no ; ?> </td>
                            <td> <?php echo $rec-> delivery_address ; ?> </td>
                            <td> <?php echo $rec-> order_date ; ?> </td>
                            <td> <div class="form-group">
                                    <button type="button" class="form-control" data-toggle="modal" data-target="#myModal">view</button>

                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Order Details</h4>
                                                </div>

                                                <div class="modal-body">


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>


                            <br>
                        </tr>
                    <?php }
                }

                else{ ?><
                    <tr>
                        <td> No Pending Orders </td>
                    </tr>

                <?php }?>

                </tbody>

            </table>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Order Number">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cancel Order</button>
                          </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div>

</div>



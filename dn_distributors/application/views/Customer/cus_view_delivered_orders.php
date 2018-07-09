<?php require_once ('cus_header.php') ?>
<?php require_once ('top.php') ?>
<?php require_once ('customer_side_bar.php') ?>

<div class="container">
    <h1>Delivered Orders</h1>
    <div class="table-responsive">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Order Number</th>
                <th>Ordered Date</th>
                <th>Delivered Date </th>
                <th>Delivered Address </th>
                <th>View Details </th>
                <th>Give Feedback</th>
            </tr>
            </thead>

            <tbody>
            <?php

            $num=$delivered_order->num_rows();
            if($num>0){
                //print_r($delivered_order->result());
                $order_id['id']=0;
                foreach($delivered_order->result() as $rec){
                    if($order_id['id']!=$rec->order_id){
                        $order_id['id'] = $rec->order_id;
                    ?>
                    <tr>
                        <td> <?php echo $rec-> order_id ; ?> </td>
                        <td> <?php echo $rec-> ordered_date ; ?> </td>
                        <td> <?php echo $rec-> delevered_date ; ?> </td>
                        <td> <?php echo $rec-> delivery_address ; ?> </td>
                        <td>
                            <div class="form-group">
                                <button type="button" class="form-control btn-info" data-toggle="modal" data-target="#myModal">view</button>

                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Order Details</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Product ID</th>
                                                            <th>Product Price </th>
                                                            <th>Quantity </th>
                                                            <th>Total Price</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $order_id['price']=0 ?>
                                                        <?php foreach($delivered_order->result() as $op){
                                                            //print_r($op);
                                                            if($op->order_id==$order_id['id']){
                                                                //print_r($order_id['id']);
                                                                //$order_id['id2']=$op->order_id;
                                                                $order_id['price']+=$op-> total_price ; ?>
                                                                <tr>
                                                                    <td><?php echo $op-> product_id ; ?></td>
                                                                    <td><?php echo $op-> product_price ; ?></td>
                                                                    <td><?php echo $op-> quantity ; ?></td>
                                                                    <td><?php echo $op-> total_price ; ?></td>
                                                                </tr>

                                                            <?php }
                                                            else{
                                                                //$order_id['id2']=$op->order_id;
                                                            }
                                                            //print_r($order_id['price']);
                                                        }

                                                        ?>

                                                        <tr>
                                                            <td><?php echo "Total Price : Rs.".$order_id['price'] ; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </td>
                        <?php echo '<td><button type="button" name="give_feedback" class="form-control btn-success give_feedback" data-order_id="'.$rec->order_id.'">Feedback</button></td>' ?>

                        <br>
                    </tr>
                <?php
                    }
                    else{

                    }
                }
            }

            else{?>
                <tr>
                    <td> No Delivered Orders Yet.. </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

    <?php /*echo form_open('Customer/LoadFeedback');*/?><!--
    <div class="container">
        <div class="row">
            <div class="col-lg-5" style="padding-left: 60px">
                <div class="input-group">
                    <input type="text" class="form-control" name="order_no" id="order_no" placeholder="Order Number" required>
                          <span class="input-group-btn">
                           <button type="submit" class="btn btn-success">Give Feedback</button>
                          </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>

    <?php /*echo form_close();*/?>

</div>

<script>
    $(document).ready(function() {
        $('.give_feedback').click(function () {
            if(confirm("Do you want to give feedback fo this order..?")){
                var order_id = $(this).data("order_id");
                //alert(order_id);
                $.ajax({
                    url: "http://localhost/dn_distributors/index.php/Customer/LoadFeedback/",
                    method: "POST",
                    data: {order_id: order_id},
                    success: function (data) {
                        window.location.href ='http://localhost/dn_distributors/index.php/Customer/LoadFeedback';
                    }
                });
            }
            else{
                return false;
            }


        });
    });
</script>

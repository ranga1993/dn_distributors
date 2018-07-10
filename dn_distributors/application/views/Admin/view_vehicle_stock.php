<?php require_once 'header.php'; ?>
<?php require_once 'top2.php'; ?>
<?php require_once 'admin_side_bar.php' ?>
<div class="container col-md-10"><br>
    <!--    <div class="w3-left-align">-->
    <!--        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search by customer name" style="width: 50%">-->
    <!--    </div>-->
    <!--    <br>-->
    <!--    <div id="result"></div>-->

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Date</th>
            <th>Product Name</th>
            <th>Added Quantity</th>
            <th>Remain Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($h->result() as $row)
        {
            ?><tr>
            <td><?php echo $row->date; ?></td>
            <td><?php echo $row->product_name; ?></td>
            <td><?php echo $row->added_quantity; ?></td>
            <td><?php echo $row->remain_quantity; ?></td>
            <td><button type="button" class="btn btn-info" onclick="view_stock(<?php echo $row->id; ?>)">View</button></td>
            <!--                <td>--><?php //echo anchor("Admin/view_each_customer/{$row-> customer_id}",'View',['class'=>'btn btn-info']);?><!--</td>-->
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

<div class="container modal fade" style="padding-top: 20px" id="viewMainStockModal">
    <div class="w3-card-2 text-center modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" value="" name="product_id">
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="product_name" style="color: grey">Product Name</label>
                        </div>
                        <div class="col-md-7">
                            <input name="product_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="stock_quantity" style="color: grey">Stock Quantity</label>
                        </div>
                        <div class="col-md-7">
                            <input name="stock_quantity" class="form-control" type="text">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
    var save_method;
    function view_stock(stock_id){
        save_method = 'update';
        $.ajax({
            url: "<?php echo site_url(); ?>/Admin/view_each_product_stock/" + stock_id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="stock_id"]').val(data.stock_id);
                $('[name="product_name"]').val(data.product_name);
                $('[name="stock_quantity"]').val(data.stock_quantity);

                $('#viewMainStockModal').modal('show');
            }
        })
    }

</script>


</body>
</html>

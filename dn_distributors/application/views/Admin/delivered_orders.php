<?php require_once 'header.php'; ?>
<?php if($this->session->userdata('loggedin') == TRUE)  {?>
    <?php require_once 'top2.php'; ?>
<?php } else {?>
    <?php require_once 'top.php'; ?>
    <?php require_once 'login.php'; ?>
    <?php require_once 'registration.php'; ?>
<?php } ?>
<?php require_once 'admin_side_bar.php' ?>
<div class="container col-md-10"><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Order Number</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Delivery Address</th>
            <th>Contact Number</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th style="vertical-align: top">Amount</th>
            <th>Customer Feedback</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($h->result() as $row)
        {
            ?><tr>
            <td><?php echo $row->order_number; ?></td>
            <td><?php echo $row->oredr_date; ?></td>
            <td><?php echo $row->customer_name; ?></td>
            <td><?php echo $row->delivery_address; ?></td>
            <td><?php echo $row->contact_number; ?></td>
            <td><?php echo $row->product_code; ?></td>
            <td><?php echo $row->product_name; ?></td>
            <td><?php echo $row->amount; ?></td>
            <td><?php echo $row->customer_feedback; ?></td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
</div>


</body>
</html>

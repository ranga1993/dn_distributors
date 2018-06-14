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
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Image</th>
            <th>Unit Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($h->result() as $row)
        {
            ?><tr>
            <td><?php echo $row->product_code; ?></td>
            <td><?php echo $row->product_name; ?></td>
            <td><?php echo $row->type; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->image; ?></td>
            <td><?php echo $row->unit_price; ?></td>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
</div>


</body>
</html>

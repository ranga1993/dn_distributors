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
                <th>Customer Name</th>
                <th>Company Name</th>
                <th>Address</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($h->result() as $row)
            {
                ?><tr>
                <td><?php echo $row->customer_name; ?></td>
                <td><?php echo $row->company_name; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->nic; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->contact_number; ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
</div>


</body>
</html>

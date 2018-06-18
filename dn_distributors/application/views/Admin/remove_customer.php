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
            <th></th>
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
            <td><button type="button" class="btn btn-warning" onclick="remove_each_customer(<?php echo $row->customer_id; ?>)">Delete</button></td>
            <!--                <td>--><?php //echo anchor("Admin/view_each_customer/{$row-> customer_id}",'View',['class'=>'btn btn-info']);?><!--</td>-->
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">
    var save_method;
    function remove_each_customer(customer_id){
        if(confirm('Are you sure you want to delete this data?')){
            $.ajax({
                url: "<?php echo site_url(); ?>/Admin/remove_each_customer/" + customer_id,
                type: "POST",
                dataType: "JSON",
                success: function(data){
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Error Deleting Data');
                }
            });
        }
    }
</script>


</body>
</html>

<?php require_once 'header.php'; ?>
<?php if($this->session->userdata('loggedin') == TRUE)  {?>
    <?php require_once 'top2.php'; ?>
<?php }?>
<?php require_once 'admin_side_bar.php' ?>
<div class="container col-md-10"><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Company Address</th>
            <th>NIC</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Company Contact Number</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($h->result() as $row)
        {
            ?><tr>
            <td><?php echo $row->cus_name; ?></td>
            <td><?php echo $row->cus_company_name; ?></td>
            <td><?php echo $row->cus_company_address; ?></td>
            <td><?php echo $row->cus_nic; ?></td>
            <td><?php echo $row->cus_email; ?></td>
            <td><?php echo $row->cus_phone; ?></td>
            <td><?php echo $row->cus_company_phone; ?></td>
            <td><button type="button" class="btn btn-warning" onclick="remove_each_customer(<?php echo $row->cus_id; ?>)">Delete</button></td>
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
    function remove_each_customer(cus_id){
        if(confirm('Are you sure you want to delete this data?')){
            $.ajax({
                url: "<?php echo site_url(); ?>/Admin/remove_each_customer/" + cus_id,
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

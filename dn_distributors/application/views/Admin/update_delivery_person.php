<?php require_once 'header.php'; ?>
<?php if($this->session->userdata('loggedin') == TRUE)  {?>
    <?php require_once 'top2.php'; ?>
<?php } ?>
<?php require_once 'admin_side_bar.php' ?>
<div class="container col-md-10"><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Delivery Person Name</th>
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
            <td><?php echo $row->dp_name; ?></td>
            <td><?php echo $row->dp_address; ?></td>
            <td><?php echo $row->dp_nic; ?></td>
            <td><?php echo $row->dp_email; ?></td>
            <td><?php echo $row->dp_phone; ?></td>
            <td><button type="button" class="btn btn-success" onclick="edit_delivery_person(<?php echo $row->dp_id; ?>)">Update</button></td>
            <!--                <td>--><?php //echo anchor("Admin/view_each_customer/{$row-> customer_id}",'View',['class'=>'btn btn-info']);?><!--</td>-->
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

<div class="container modal fade" style="padding-top: 20px" id="updateDPModal">
    <div class="w3-card-2 text-center modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" value="" name="dp_id">
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="dp_name" style="color: grey">Delivery Person Name</label>
                        </div>
                        <div class="col-md-7">
                            <input name="dp_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="dp_address" style="color: grey">Address</label>
                        </div>
                        <div class="col-md-7">
                            <input name="dp_address" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="dp_nic" style="color: grey">NIC</label>
                        </div>
                        <div class="col-md-7">
                            <input name="dp_nic" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="dp_email" style="color: grey">Email</label>
                        </div>
                        <div class="col-md-7">
                            <input name="dp_email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="dp_phone" style="color: grey">Contact Number</label>
                        </div>
                        <div class="col-md-7">
                            <input name="dp_phone" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <button class="btn btn-success" type="button" id="btnsave" onclick="save()">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
    var save_method;
    function edit_delivery_person(dp_id){
        save_method = 'update';
        $.ajax({
            url: "<?php echo site_url(); ?>/Admin/view_each_dp/" + dp_id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="dp_id"]').val(data.dp_id);
                $('[name="dp_name"]').val(data.dp_name);
                $('[name="dp_address"]').val(data.dp_address);
                $('[name="dp_nic"]').val(data.dp_nic);
                $('[name="dp_email"]').val(data.dp_email);
                $('[name="dp_phone"]').val(data.dp_phone);

                $('#updateDPModal').modal('show');
            }
        })
    }

    function save(){
        $.ajax({
            url: "<?php echo site_url(); ?>/Admin/update_dp_details",
            type: "POST",
            data: $('#form'). serialize(),
            dataType: "JSON",
            success: function(data){
                $('#updateDPModal').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error Updating Data');
            }
        });
    }


</script>
</body>
</html>

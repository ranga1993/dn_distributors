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
    <div class="w3-left-align">
        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search by customer name" style="width: 50%">
    </div>
    <br>
    <div id="result"></div>

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
            <td><button type="button" class="btn btn-success" onclick="edit_customer(<?php echo $row->customer_id; ?>)">Update</button></td>
            <!--                <td>--><?php //echo anchor("Admin/view_each_customer/{$row-> customer_id}",'View',['class'=>'btn btn-info']);?><!--</td>-->
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>

<div class="container modal fade" style="padding-top: 20px" id="updateCustomerModal">
    <div class="w3-card-2 text-center modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" id="form">
                    <input type="hidden" value="" name="customer_id">
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="customer_name" style="color: grey">Customer Name</label>
                        </div>
                        <div class="col-md-7">
                            <input name="customer_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="company_name" style="color: grey">Company Name</label>
                        </div>
                        <div class="col-md-7">
                            <input name="company_name" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="address" style="color: grey">Address</label>
                        </div>
                        <div class="col-md-7">
                            <input name="address" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="nic" style="color: grey">NIC</label>
                        </div>
                        <div class="col-md-7">
                            <input name="nic" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="email" style="color: grey">Email</label>
                        </div>
                        <div class="col-md-7">
                            <input name="email" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 8px">
                        <div class="col-md-3">
                            <label for="contact_number" style="color: grey">Contact Number</label>
                        </div>
                        <div class="col-md-7">
                            <input name="contact_number" class="form-control" type="text">
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
    function edit_customer(customer_id){
        save_method = 'update';
        $.ajax({
            url: "<?php echo site_url(); ?>/Admin/view_each_customer/" + customer_id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="customer_id"]').val(data.customer_id);
                $('[name="customer_name"]').val(data.customer_name);
                $('[name="company_name"]').val(data.company_name);
                $('[name="address"]').val(data.address);
                $('[name="nic"]').val(data.nic);
                $('[name="email"]').val(data.email);
                $('[name="contact_number"]').val(data.contact_number);

                $('#updateCustomerModal').modal('show');
            }
        })
    }

    function save(){
        $.ajax({
            url: "<?php echo site_url(); ?>/Admin/update_customer_details",
            type: "POST",
            data: $('#form'). serialize(),
            dataType: "JSON",
            success: function(data){
                $('#updateCustomerModal').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Error Updating Data');
            }
        });
    }

//    function load_data(query){
//        $.ajax({
//            url: "<?php //echo site_url(); ?>///Admin/search_customer",
//            type: "POST",
//            data: {query:query},
//            success: function(data){
//                $(#result).html(data);
//            }
//        });
//    }
//
//    $('#search_text').keyup(function(){
//       var search = $(this).val();
//        if(search != ''){
//            load_data(search);
//        }
//        else {
//            load_data();
//        }
//    });


</script>


</body>
</html>

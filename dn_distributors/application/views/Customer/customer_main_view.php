<?php require_once ('cus_header.php') ?>
<?php require_once ('top.php') ?>
<?php require_once ('customer_side_bar.php') ?>



<!--<div class="container">
    <?php /*if($this->session->flashdata('massage')) {echo "<h3>".$this->session->flashdata('massage')."</h3>";}*/?>
</div>-->


<div class="col-md-7">
    <div class="container" >
        <?php echo form_open('Customer_Main/EditRegDetails',array("id" =>"form-edit","class" => "form-horizontal"));?>


        <div class="container" >

            <div id="the-massage"> </div>

            <div class="container">
                <h1>Your Details</h1>

                <div class="form-group">
                    <label for="cus_name">Name</label>
                    <input type="text" class="form-control" id="cus_name" name="cus_name" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_name; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_nic">NIC</label>
                    <input type="text" class="form-control" id="cus_nic" name="cus_nic" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_nic; ?><?php }?>">
                </div>

                <div class="form-group">
                    <label for="cus_address">Address</label>
                    <input type="text" class="form-control" id="cus_address" name="cus_address" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_address; ?><?php }?>">
                </div>

                <div class="form-group">
                    <label for="cus_fixed_phone">Phone Number (Pixed) </label>
                    <input type="text" class="form-control" id="cus_fixed_phone" name="cus_fixed_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_fixed_phone; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_mobile_phone">Phone Number (Mobile)</label>
                    <input type="text" class="form-control" id="cus_mobile_phone" name="cus_mobile_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_mobile_phone; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_email">E-mail</label>
                    <input type="text" class="form-control" id="cus_email" name="cus_email" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_email; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_com_name">Company Name</label>
                    <input type="text" class="form-control" id="cus_com_name" name="cus_com_name" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_com_name; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_com_address">Company Address</label>
                    <input type="text" class="form-control" id="cus_com_address" name="cus_com_address" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_com_address; ?><?php }?>" >
                </div>

                <div class="form-group">
                    <label for="cus_com_phone">Company Phone Number</label>
                    <input type="text" class="form-control" id="cus_com_phone" name="cus_com_phone" value="<?php foreach ($customer as $cus) {?><?php echo $cus->cus_com_phone; ?><?php }?>">
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success" onclick="func()">Update Details</button>
                    </div><!-- /.col-lg-6 -->
                </div>
                
            </div>
        </div>

            <?php echo form_close();?>
    </div>
</div>
</body>
</html>
        <script>

            $('#form-edit').submit(function(e){
                e.preventDefault();
                //alert('submit');

                var me= $(this);

                $.ajax ({
                    url : me.attr('action'),
                    type : 'post',
                    data : me.serialize(),
                    dataType : 'json',
                    success : function (response) {
                        if(response.success == true){
                            //alert('success');
                            //show success massage
                            //remove error class
                            $('#the-massage').append('<div class= "alert alert-success" >'+
                                '<span class="glyphicon glyphicon-ok "></span>'+
                                'Register Successful' + '</div>');

                            $('.form-group').removeClass('has-error')
                                .removeClass('has-success');

                            $('.text-danger').remove();

                            //reset form
                            me[0].reset();

                            //close the massage after seconds
                            $('.alert-success').delay(500).show(10,function(){
                                $(this).delay(3000).hide(10,function(){
                                    $(this).remove();
                                });
                            })
                        }
                        else{
                            //alert('failed');
                            $.each(response.massages, function(key,value){
                                var element = $("#"+ key);

                                element.closest('div.form-group')
                                    .removeClass('has-error')
                                    .addClass(value.length > 0 ? 'has-error':'has-success')
                                    .find('.text-danger')
                                    .remove();

                                element.after(value);
                            });
                        }
                    }
                });

            });


        </script>
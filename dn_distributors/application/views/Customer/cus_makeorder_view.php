<?php require_once ('header.php') ?>

<?php echo form_open('Customer/MakeOrder');?>

<div class="container" >

    <h2>Please Make Your Order By Filling This Form</h2>

    <?php  echo validation_errors();?>

    <div class="container">

        <?php if($this->session->flashdata('massage')) {echo "<h3>".$this->session->flashdata('massage')."</h3>";}?>

    </div>

    <div class="container" >

        <h3>Your Details</h3>


        <?php if ($customer!=NULL ) {?>
        <div class="form-group">
            <label for="cus_name">Name</label>
            <input type="text" class="form-control" id="cus_name" name="cus_name" value="<?php foreach ($customer as $cus) {?><?php echo $cus->customer_name; ?><?php }?>" >
        </div>
        <div class="form-group">
            <label for="cus_nic">NIC</label>
            <input type="text" class="form-control" id="cus_nic" name="cus_nic" value="<?php foreach ($customer as $cus) {?><?php echo $cus->nic; ?><?php }?>">
        </div>
        <div class="form-group">
            <label for="cus_address">Address</label>
            <input type="text" class="form-control" id="cus_address" name="cus_address" value="<?php foreach ($customer as $cus) {?><?php echo $cus->address; ?><?php }?>">
        </div>

        <?php } ?>

    </div>



    <div class="container" >

        <h3>Order Details</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <?php $select=''; ?>
                    <input type="text" class="form-control" aria-label="..."id="cus_name" name="cus_name" value="" placeholder="Select Item from Dropdown Menu">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  >Select Item <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <?php foreach ($product as $res):?>
                            <li id="" name="first"><a ><?php echo $res->product_name;?></a></li>
                            <?php endforeach ; ?>
                            <!--<li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>-->
                        </ul>
                    </div><!-- /btn-group -->
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

        <div class="form-group">
            <label for="application_id">Quantity</label>
            <input type="text" class="form-control" id="cus_name" name="cus_name" value="<?php $selected_value = $this->input->post('city');?>">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-info">Add to Order</button>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Item ID </th>
                    <th>Item Name </th>
                    <th>Item Price </th>
                    <th>Quantity</th>
                    <th>Price*Quantity</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        /*            if($application->num_rows()>0){

                                    foreach($application->result() as $rec){
                                    */?>
                        <!--<tr>
                                <td> <?php /*echo $rec-> application_id ; */?> </td>
                                <td> <?php /*echo $rec-> init_name ; */?> </td>
                                <td> <?php /*echo $rec-> last_name ; */?> </td>
                                <td> <?php /*echo $rec-> owner_nic ; */?> </td>
                                <td> <?php /*echo $rec-> ward_no ; */?> </td>
                                <br>
                            </tr>-->
                        <?php
                            //}

                            //}
                            /*else{
                        */?><!--
                            <tr>
                                <td> No Application Pending </td>
                            </tr>

                        --><?php
                    /*                    }
                                    */?>
                </tbody>

            </table>

        </div>
    </div>

    <div class="container" >
        <div class="form-group">
            <label for="delevery_address">Delevery Address</label>
            <input type="text" class="form-control" id="delevery_address" name="delevery_address" value="" placeholder="Delevery Address">
        </div>

    </div>

    <div class="container" >
        <div class="form-group">
            <label for="delevery_date">Delevery Date</label>
            <input type="text" class="form-control" id="delevery_date" name="delevery_date" value="" placeholder="Delevery Date">
        </div>

        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-success">Complete Your Order</button>
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <button type="button" class="btn btn-warning">Cancel Your Order</button>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>
</div>

<?php echo form_close();?>
<!--<div class="input-append date form_datetime">
    <input size="16" type="text" value="" readonly >
    <span class="add-on"><i class="icon-th"></i></span>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
</script>-->
    <!--<div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Select Item
                <span class="caret"></span>
            </button>


            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php /*$select=''; */?>

                    <?php /*foreach ($product as $res):*/?>
                <select id="<?php /*echo $res->id; */?>" ">
                        <li><a href="#"><?php /*echo $res->product_name; */?></a></li>
                            <?php /*  */?>
                    <?php /*endforeach ; */?>


            </ul>
        </div>

        <label class="paylabel" for="cardtype">Card Type:</label>
        <select id="cardtype" name="cards">
            <option value="selectcard">--- Please select ---</option>
            <option value="mastercard">Mastercard</option>
            <option value="maestro">Maestro</option>
            <option value="solo">Solo (UK only)</option>
            <option value="visaelectron">Visa Electron</option>
            <option value="visadebit">Visa Debit</option>
        </select><br/>
        <script>
        var card = document.getElementById("cardtype");
        if(card.selectedIndex == 0) {
        alert('select one answer');
        }
        else {
        var selectedText = card.options[card.selectedIndex].text;
        alert(selectedText);
        }
        </script>-->


    <!--<div class="form-group">
            <label for="application_id">Item Name</label>
                <select name="name" >
                    <?php /*foreach ($product as $res):*/?>
                        <option value="<?php /*echo $res->id; */?>">
                            <?php /*echo $res->product_name;*/?>
                        </option>
                    <?php /*endforeach ; */?>
                </select>
            <input type="text" class="form-control" id="cus_name" name="cus_name" value="">
        </div>
            --!>

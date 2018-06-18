<?php require_once ('cus_header.php') ?>
<?php require_once ('top.php') ?>
<?php require_once ('customer_side_bar.php') ?>

<div class="container" >

    <h2>Please Give Your Feedback By Filling This Form</h2>


    <div class="container">

        <?php if($this->session->flashdata('massage')) {
            echo "<h3>".$this->session->flashdata('massage')."</h3>";

        }?>

    </div>

    <div class="container" >

        <h3>Your Details</h3>

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

    </div>

    <div class="container" >

        <h3>Order Details</h3>

        <div class="form-group">
            <label for="order_no">Order Number</label>
            <input type="text" class="form-control" id="order_no" name="order_no" value="<?php foreach ($order as $res) {?><?php echo $res->order_no; ?><?php }?>" >
        </div>
        <div class="form-group">
            <label for="order_date">Order Date</label>
            <input type="text" class="form-control" id="order_date" name="order_date" value="<?php foreach ($order as $res) {?><?php echo $res->order_date; ?><?php }?>">
        </div>
        <div class="form-group">
            <label for="order_status">Order Status</label>
            <input type="text" class="form-control" id="order_status" name="order_status" value="<?php foreach ($order as $res) {?><?php echo $res->order_status; ?><?php }?>">
        </div>

    </div>

    <?php echo form_open('Customer_Feedback/Feedback', array("id" =>"form-feedback","class" => "form-horizontal"));?>

    <?php echo validation_errors(); ?>

    <div class="container">

        <div class="the-massage"> </div>

        <h3>Your Feedback</h3>


        <div class="container">
            <div class="form-group">
                <label for="cus_feedback">Give Your Feedback Here</label>
                <input type="text" class="form-control" rows="3" id="cus_feedback" name="cus_feedback" placeholder="Please Write Youre Feedback Here About Our Delevery Process"></input>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success">Submit Your Feedback</button>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_close();?>





</div>





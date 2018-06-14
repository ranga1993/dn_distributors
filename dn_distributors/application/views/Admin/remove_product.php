<?php require_once 'header.php'; ?>
<?php if($this->session->userdata('loggedin') == TRUE)  {?>
    <?php require_once 'top2.php'; ?>
<?php } else {?>
    <?php require_once 'top.php'; ?>
    <?php require_once 'login.php'; ?>
    <?php require_once 'registration.php'; ?>
<?php } ?>
<?php require_once 'admin_side_bar.php' ?>
<div class="col-md-10" style="padding-left: 120px">
    <div class="container" style="padding-top: 10px">
        <?php echo form_open('Admin/remove_product'); ?>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="product_code" style="color: grey"">Product Code</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="product_code" required>
            </div>
        </div>
        <div class="row text-center" style="padding-top: 8px">
            <button type="submit" class="w3-button btn-primary" style="border-radius: 8px">Submit</button>
            <button type="reset" class="w3-button btn-info" style="border-radius: 8px">Reset</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>


</body>
</html>

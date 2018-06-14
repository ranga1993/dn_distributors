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
        <?php echo form_open('Admin/update_product_details'); ?>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="product_code" style="color: grey">Product Code</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="product_code" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="product_name" style="color: grey">Product Name</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="product_name" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="type" style="color: grey">Type</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="type" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="description" style="color: grey">Description</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="description" required>
            </div>
        </div>
        <div class="row file-field" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="description" style="color: grey">Image</label>
            </div>
            <div class="col-md-7" style="padding-left:17px; height: 100px">
                <input type="file" name="image" name="image">
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="price" style="color: grey">Unit Price</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="price" required>
            </div>
        </div>
        <br>
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

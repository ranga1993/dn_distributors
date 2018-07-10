<?php require_once 'header.php'; ?>
<?php require_once 'top2.php'; ?>
<?php require_once 'admin_side_bar.php' ?>
<div class="col-md-10" style="padding-left: 120px">
    <div class="container" style="padding-top: 10px">
        <?php echo form_open('Admin/add_vehicle_stock'); ?>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="date" style="color: grey">Date</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="date" value="<?php echo date('m/d/Y'); ?>" required>
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
                <label for="added_quantity" style="color: grey">Adding Quantity</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="added_quantity" required>
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

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
        <?php echo form_open('Admin/update_dp_details'); ?>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="name" style="color: grey">Delivery Person Name</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="address" style="color: grey">Address</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="address" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="nic" style="color: grey">NIC</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="nic" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="email" style="color: grey">Email</label>
            </div>
            <div class="col-md-7">
                <input type="email" class="form-control" name="email" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="contact_number" style="color: grey">Contact Number</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="contact_number" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="password" style="color: grey">Password</label>
            </div>
            <div class="col-md-7">
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="confirm_password" style="color: grey">Confirm Password</label>
            </div>
            <div class="col-md-7">
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
        </div>
        <br>
        <div class="row text-center" style="padding-top: 8px">
            <button type="submit" class="w3-button btn-primary" style="border-radius: 8px">Update</button>
            <button type="reset" class="w3-button btn-info" style="border-radius: 8px">Reset</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>

</body>
</html>

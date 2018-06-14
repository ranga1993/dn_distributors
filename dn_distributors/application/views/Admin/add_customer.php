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
        <?php echo form_open('User_authentication/user_registration'); ?>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="name" style="color: grey">Customer Name</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" required>
            </div>
        </div>
        <div class="row" style="padding-top: 8px">
            <div class="col-md-2">
                <label for="company_name" style="color: grey">Company Name</label>
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="company_name" required>
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
            <button type="submit" class="w3-button btn-primary" style="border-radius: 8px">Submit</button>
            <button type="reset" class="w3-button btn-info" style="border-radius: 8px">Reset</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
</div>

<script>
    function myAccFunc1() {
        var x = document.getElementById("demoAcc1");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }

    function myAccFunc2() {
        var x = document.getElementById("demoAcc2");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }

    function myAccFunc3() {
        var x = document.getElementById("demoAcc3");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }

    function myAccFunc4() {
        var x = document.getElementById("demoAcc4");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
    }

    function scrollWin() {
        window.scrollBy(0, 100);
    }

</script>


</body>
</html>

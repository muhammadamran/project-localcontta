<?php
include "include/flogin.php";
include "include/lhead.php";
?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/app/images/3.jpeg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" role="form" method="post" action="">
                <div class="login-logo">
                    <center>
                        <img src="assets/app/logo/logo-white.png" style="width: 345px;">
                        <span class="login100-form-title p-b-5 p-t-5">
                            <!-- LocalContta -->
                        </span>
                    </center>
                </div>
                <hr>
                <div style="display: flex;justify-content: center;">
                    <font style="font-size: 35px;font-weight:700;color:#fff">Localcontta</font>
                </div>
                <div style="display: flex;justify-content: center;">
                    <font style="font-size: 14px;font-weight: 100;color:#fff">
                        Please Log In to start your session.
                    </font>
                </div>
                <hr>
                <!-- <div class="menu__divider"></div> -->
                <!-- <?php if ($alertWrong == 'YES') { ?>
                    <div class="p-b-20">
                        <div class="alert-danger ">
                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                          <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                        </div>
                    </div>
                    <?php } ?> -->
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="user_name" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" onclick="myFunction()" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Show password
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn btn-block" type="submit" name="submit" value="submit">
                        Log In
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <hr>
                    <a class="txt1" href="#">
                        Copyright 2019 | Version 3.0.10
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "include/lfooter.php";
?>
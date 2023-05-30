<!-- Show Password -->
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script type="text/javascript">
    if (window?.location?.href?.indexOf('error') > -1) {
        Swal.fire({
            title: 'Sign In Failed!',
            icon: 'error',
            text: 'Wrong username or password. Try again or contact JKT CI Team!',
        })
        history.replaceState({}, '', './login.php');
    }

    if (window?.location?.href?.indexOf('errorAccess') > -1) {
        Swal.fire({
            title: 'Access Failed!',
            icon: 'error',
            text: 'Please contact your administrator!',
        })
        history.replaceState({}, '', './login.php');
    }
</script>
<!-- End Show Password -->
<div id="dropDownSelect1"></div>
<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/login/vendor/select2/select2.min.js"></script>
<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<script src="assets/login/js/main.js"></script>
<style type="text/css">
    body {
        padding-right: 0 !important;
    }
</style>
</body>

</html>
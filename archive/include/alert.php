<!-- Sign in Success -->
<script type="text/javascript">
    if (window?.location?.href?.indexOf('SignInsuccess') > -1) {
        Swal.fire({
            title: 'Sign In Success!',
            icon: 'success',
            text: 'Application Localcontta for Customs!',
        })
        history.replaceState({}, '', './index.php');
    }
</script>

<!-- Swal.fire({
  icon: 'info',
  title: 'Failed Input!',
  imageWidth: 400,
  imageHeight: 250,
  imageAlt: 'Custom image',
  html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
  showCloseButton: false,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText: 'OK'
}) -->
<!-- End Sign in Success -->

<style>
    .swal2-styled.swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #002765 !important;
        color: #fff;
        font-size: 1.0625em;
    }
</style>
<script type="text/javascript">
    // notif_login_successfully
    if (window?.location?.href?.indexOf('notif_login_successfully') > -1) {
        Swal.fire({
            title: 'Success!',
            html: '<font style="font-size: 16px;font-weight: 400;">Log In Success!</font>',
            imageUrl: 'assets/alert/success.gif',
            imageHeight: 200,
        })
        history.replaceState({}, '', './index.php');
    };

    // notif_login_unsuccessfully
    if (window?.location?.href?.indexOf('notif_login_unsuccessfully') > -1) {
        Swal.fire({
            title: 'Failed!',
            html: '<font style="font-size: 16px;font-weight: 400;">You failed to Log In, please check your <b>Email</b> or <b>Password</b>!</font>',
            imageUrl: 'assets/alert/failed.gif',
            imageHeight: 200,
        })
        history.replaceState({}, '', './index.php');
    };

    // notif_logout
    if (window?.location?.href?.indexOf('notif_logout') > -1) {
        Swal.fire({
            title: 'Information!',
            html: '<font style="font-size: 16px;font-weight: 400;">You Have Left Our Page Session!</font><br><font style="font-size: 12px;font-weight: 400;">Thank You For Visiting Our Page. We are waiting for your return.</font>',
            imageUrl: 'assets/alert/logout.gif',
            imageHeight: 200,
        })
        history.replaceState({}, '', './index.php');
    };

    // start_session
    if (window?.location?.href?.indexOf('start_session') > -1) {
        Swal.fire({
            title: 'Information!',
            html: '<font style="font-size: 16px;font-weight: 400;">You didnt have access!</font>',
            imageUrl: 'assets/alert/info.gif',
            imageHeight: 200,
        })
        history.replaceState({}, '', './index.php');
    };
</script>
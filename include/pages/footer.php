<!-- js -->
<script src="assets/vendors/scripts/core.js"></script>
<script src="assets/vendors/scripts/script.min.js"></script>
<script src="assets/vendors/scripts/process.js"></script>
<script src="assets/vendors/scripts/layout-settings.js"></script>
<script src="assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="assets/sweet/sweetalert2.all.js"></script>
<script src="assets/sweet/sweetalert2.all.min.js"></script>
<script src="assets/sweet/sweetalert2.js"></script>
<script src="assets/sweet/sweetalert2.min.js"></script>
<script type="text/javascript">
    function display_ct() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';

        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " + x.getHours() + ":" + x.getMinutes() + ":" + x.getSeconds() + "" + ampm;
        document.getElementById('ct').innerHTML = x1;
        display_c();
    }
</script>
</body>

</html>
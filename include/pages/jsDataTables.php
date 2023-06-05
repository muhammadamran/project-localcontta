<script src="assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="assets/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="assets/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="assets/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="assets/vendors/scripts/datatable-setting.js"></script>
<script type="text/javascript">
    // TABLE
    // TABLE DEFAULT LENGHT
    $(document).ready(function() {
        $('#TableDefault_L').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    $(document).ready(function() {
        $('#TableDefault_L2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    // TABLE DEFAULT
    $(document).ready(function() {
        $('#TableDefault').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            iDisplayLength: -1
        });
    });

    // COPY,PDF FINDreftnImport
    // TABLE DEFAULT LENGHT FINDreftnImport
    // 10
    $(document).ready(function() {
        $('#FREFTNIM').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'csvHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });

    // COPY,PDF
    // TABLE DEFAULT LENGHT
    // 10
    $(document).ready(function() {
        $('#C_TableDefault_L').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'csvHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    // 3
    $(document).ready(function() {
        $('#C_TableDefault_L_3').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'csvHtml5'
            ],
            "order": [],
            lengthMenu: [
                [3, 5, 10, 15, 20, 25, 50, -1],
                [3, 5, 10, 15, 20, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    // 5
    $(document).ready(function() {
        $('#C_TableDefault_L_5').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'csvHtml5'
            ],
            "order": [],
            lengthMenu: [
                [5, 10, 15, 20, 25, 50, -1],
                [5, 10, 15, 20, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    // TABLE DEFAULT
    $(document).ready(function() {
        $('#C_TableDefault').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'csvHtml5'
            ],
            "order": [],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            iDisplayLength: -1
        });
    });
    // TABLE DEFAULT
    $(document).ready(function() {
        $('#C_TableDefault_LIST').DataTable({
            lengthMenu: [
                [10, 25, 50, 75, 100, 150, 200, 250, 300, 350, 400, 450, 500, -1],
                [10, 25, 50, 75, 100, 150, 200, 250, 300, 350, 400, 450, 500, 'All'],
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            // iDisplayLength: -1
        });
    });
    // END TABLE
</script>
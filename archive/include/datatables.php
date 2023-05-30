<!-- <script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script> -->
<!-- <scrpit src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script> -->
<!-- <script>
	$(document).ready(function() {
		$('#dataTables-example').dataTable();
	});
</script> -->
<style type="text/css">
	.btn {
		display: inline-block;
		margin-bottom: 0;
		font-weight: 400;
		text-align: center;
		vertical-align: middle;
		cursor: pointer;
		background-image: none;
		border: 1px solid transparent;
		white-space: nowrap;
		padding: 9px 12px;
		font-size: 14px;
		line-height: 1.428571429;
		border-radius: 4px;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
	}
</style>
<script src="assets/js/dataTables.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#dahsboardOne').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#FINDreftnImport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#FINDreftnExport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#FINDAjuImport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#FINDAjuExport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#TruckConfirmJob').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#TruckConfirmed').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#users').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#consignee').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#shipper').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#trucker').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#document').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#PricingRate').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#RecordManagementExport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
		$('#RecordManagementImport').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
			}]
		});
	});
</script>
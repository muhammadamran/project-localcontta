<title>Edit Management Users - Localcontta | Kuehne + Nagel Indonesia</title>
<script src="assets/js/jquery.min.js"></script>
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

$con = mysqli_connect("localhost", "root", "", "contta");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$uid    = $_GET['user_id'];
$result = mysqli_query($con, "SELECT * FROM tb_user WHERE user_id ='$uid'");
$row = mysqli_fetch_array($result);

// EDIT
if (isset($_POST["edit"])) {
	// Admin
	$cekRole =  $_POST['user_role_edit'];
	if ($cekRole == 'admin') {
		$email                = $_POST['admin_user_mail_edit'];
		$role                 = $_POST['user_role_edit'];
		$scope                = $_POST['admin_scope_edit'];
		$department           = $_POST['admin_dept_edit'];
		$user_branches        = $_POST['user_branches'];
		$user_modules         = $_POST['user_modules'];
		$modules              = "";
		foreach ($user_modules as $row_modules) {
			$modules .= $row_modules . ",";
		}

		// CRUD
		if ($_POST['AddInsert'] != 'Y') {
			$AddInsert = '0';
		} else {
			$AddInsert = '1';
		}
		if ($_POST['AddUpdate'] != 'Y') {
			$AddUpdate = '0';
		} else {
			$AddUpdate = '1';
		}
		if ($_POST['AddDelete'] != 'Y') {
			$AddDelete = '0';
		} else {
			$AddDelete = '1';
		}
		// END CRUD

		$query = mysql_query("UPDATE tb_user SET user_mail='$email',
			user_role='$role',
			user_scope='$scope',
			user_dept='$department',
			user_branches='$user_branches'
			WHERE user_id='$uid'");
		if ($query) {
			header("Location: ./iou_adm_user.php?UpdateSuccess=true");
		} else {
			header("Location: ./iou_adm_user.php?UpdateFailed=true");
		}
		// General Manager
	} else if ($cekRole == 'gm') {
		$email                = $_POST['gm_user_mail_edit'];
		$role                 = $_POST['user_role_edit'];
		$scope                = $_POST['gm_scope_edit'];
		$department           = $_POST['gm_dept_edit'];
		$user_branches        = $_POST['user_branches'];

		$query = mysql_query("UPDATE tb_user SET user_mail='$email',
			user_role='$role',
			user_scope='$scope',
			user_dept='$department',
			user_branches='$user_branches'
			WHERE user_id='$uid'");
		if ($query) {
			header("Location: ./iou_adm_user.php?UpdateSuccess=true");
		} else {
			header("Location: ./iou_adm_user.php?UpdateFailed=true");
		}
		// Manager
	} else if ($cekRole == 'manager') {
		$email                = $_POST['manager_user_mail_edit'];
		$role                 = $_POST['user_role_edit'];
		$scope                = $_POST['manager_scope_edit'];
		$department           = $_POST['manager_dept_edit'];
		$user_branches        = $_POST['user_branches'];

		$query = mysql_query("UPDATE tb_user SET user_mail='$email',
			user_role='$role',
			user_scope='$scope',
			user_dept='$department',
			user_branches='$user_branches'
			WHERE user_id='$uid'");
		if ($query) {
			header("Location: ./iou_adm_user.php?UpdateSuccess=true");
		} else {
			header("Location: ./iou_adm_user.php?UpdateFailed=true");
		}
		// User
	} else if ($cekRole == 'user') {
		$email                = $_POST['user_user_mail_edit'];
		$role                 = $_POST['user_role_edit'];
		$scope                = $_POST['user_scope_edit'];
		$department           = $_POST['user_dept_edit'];
		$user_branches        = $_POST['user_branches'];

		$query = mysql_query("UPDATE tb_user SET user_mail='$email',
			user_role='$role',
			user_scope='$scope',
			user_dept='$department',
			user_branches='$user_branches'
			WHERE user_id='$uid'");
		if ($query) {
			header("Location: ./iou_adm_user.php?UpdateSuccess=true");
		} else {
			header("Location: ./iou_adm_user.php?UpdateFailed=true");
		}
		// Guest
	} else if ($cekRole == 'guest') {
		$email                = $_POST['guest_user_mail_edit'];
		$role                 = $_POST['user_role_edit'];
		$scope                = $_POST['guest_scope_edit'];
		$department           = $_POST['guest_dept_edit'];
		$user_branches        = $_POST['user_branches'];

		$query = mysql_query("UPDATE tb_user SET user_mail='$email',
			user_role='$role',
			user_scope='$scope',
			user_dept='$department',
			user_branches='$user_branches'
			WHERE user_id='$uid'");
		if ($query) {
			header("Location: ./iou_adm_user.php?UpdateSuccess=true");
		} else {
			header("Location: ./iou_adm_user.php?UpdateFailed=true");
		}
	}
}
?>
<?php include 'include/head.php'; ?>
<div id="wrapper">
	<?php include 'include/header.php'; ?>
	<div id="page-wrapper">
		<!-- Page -->
		<div class="row" style="display: flex;justify-content: space-between;align-items: center;">
			<div class="col-lg-8">
				<div style="display: flex;justify-content: flex-start;align-items: center;">
					<div>
						<h1 class="page-header"><i class="fas fa-house-user icon-title"></i></h1>
					</div>
					<div style="margin-left: 10px;">
						<div style="margin-top: -30px;">
							<h1>Edit Management Users</h1>
						</div>
						<div style="margin-top: -10px;">
							<font>Administration Section</font>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4" style="display: flex;justify-content: flex-end;">
				<span id="ct" class="clock-ct btn btn-primary" style="font-size: 12px;"></span>
			</div>
		</div>
		<!-- End Page -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-table"></i> [Edit] Management Users - <?= $row['user_name']; ?>
					</div>
					<div class="panel-body">
						<form method="post" action=" ">
							<div class="modal-body">
								<!-- Read Only Edut -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>User Name</label>
											<input type="text" name="username" class="form-control" value="<?= $row['user_name']; ?>" readonly>
											<input type="hidden" name="uid" value="<?= $row['user_id']; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Current Role</label>
											<input type="text" name="cur_role" class="form-control" value="<?= $row['user_role']; ?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Current Branch</label>
											<select class="form-control" name="user_branches">
												<option value="<?= $row['user_branches']; ?>"><?= $row['user_branches']; ?></option>
												<option value="">-- Select Branch --</option>
												<option value="JKT">JKT</option>
												<option value="CGK">CGK</option>
												<option value="SUB">SUB</option>
												<option value="CHB">CHB</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Modules</label>
											<select class="form-control" name="user_modules[]" multiple>
												<optgroup label="APPLICATION SECTION" class="group-1">
													<option value="Export">Export</option>
													<option value="Import">Import</option>
													<option value="Trucker">Trucker</option>
												</optgroup>
												<optgroup label="REPORT SECTION" class="group-2">
													<option value="Daily Report">Daily Report</option>
													<option value="Air Report">Air Report</option>
													<option value="Sea Report">Sea Report</option>
												</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>CRUD</label>
											<br>
											<?php if ($row['INSERT'] == '1') { ?>
												<input name="EditInsert" type="checkbox" id="IDInsert" class="chkbox" value="Y" checked> <label for="IDInsert" style="font-weight: 300;">Insert</label>
											<?php } else { ?>
												<input name="EditInsert" type="checkbox" id="IDInsert" class="chkbox" value="Y"> <label for="IDInsert" style="font-weight: 300;">Insert</label>
											<?php } ?>
											<?php if ($row['UPDATE'] == '1') { ?>
												<input name="EditUpdate" type="checkbox" id="IDUpdate" class="chkbox" value="Y" checked> <label for="IDUpdate" style="font-weight: 300;">Update</label>
											<?php } else { ?>
												<input name="EditUpdate" type="checkbox" id="IDUpdate" class="chkbox" value="Y"> <label for="IDUpdate" style="font-weight: 300;">Update</label>
											<?php } ?>
											<?php if ($row['DELETE'] == '1') { ?>
												<input name="EditDelete" type="checkbox" id="IDDelete" class="chkbox" value="Y" checked> <label for="IDDelete" style="font-weight: 300;">Delete</label>
											<?php } else { ?>
												<input name="EditDelete" type="checkbox" id="IDDelete" class="chkbox" value="Y"> <label for="IDDelete" style="font-weight: 300;">Delete</label>
											<?php } ?>
										</div>
									</div>
								</div>
								<!-- End Read Only Edit -->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Choose New Role</label>
											<div class="form-group">
												<select class="form-control" name="user_role_edit" id="input-role-edit" required>
													<option id="option_empty" value="">-- Select New User Role --</option>
													<option id="option_admin" value="admin">Administrator</option>
													<option id="option_gm" value="gm">General Manager</option>
													<option id="option_manager" value="manager">Manager</option>
													<option id="option_user" value="user">User</option>
													<option id="option_guest" value="guest">Guest</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!-- Admin Scope and Department -->
								<div class="row" id="admin_input_edit" style="display:none;">
									<div class="col-md-6">
										<div class="form-group">
											<label>Scope</label>
											<input type="text" class="form-control" name="admin_scope_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<input type="text" class="form-control" name="admin_dept_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="admin_user_mail_edit" placeholder="Input email..." value="<?= $row['user_mail'] ?>">
										</div>
									</div>
								</div>
								<!-- End Admin Scope and Department -->
								<!-- GM Scope and Department -->
								<div class="row" id="gm_input_edit" style="display:none;">
									<div class="col-md-6">
										<div class="form-group">
											<label>Scope</label>
											<input type="text" class="form-control" name="gm_scope_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<input type="text" class="form-control" name="gm_dept_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="gm_user_mail_edit" placeholder="Input email..." value="<?= $row['user_mail'] ?>">
										</div>
									</div>
								</div>
								<!-- End GM Scope and Department -->
								<!-- Guest Scope and Department -->
								<div class="row" id="guest_input_edit" style="display:none;">
									<div class="col-md-6">
										<div class="form-group">
											<label>Scope</label>
											<input type="text" class="form-control" name="guest_scope_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<input type="text" class="form-control" name="guest_dept_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="guest_user_mail_edit" placeholder="Input email..." value="<?= $row['user_mail'] ?>">
										</div>
									</div>
								</div>
								<!-- End Guest Scope and Department -->
								<!-- Manager Scope and Department -->
								<div class="row" id="manager_input_edit" style="display:none;">
									<div class="col-md-6">
										<div class="form-group">
											<label>Scope</label>
											<input type="text" class="form-control" name="manager_scope_edit" value="all" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department <font style="color: red;">*</font></label>
											<select class="form-control" id="id_manager_dept_edit" name="manager_dept">
												<?php if ($row['user_dept'] == 'sea') { ?>
													<option value="<?= $row['user_dept'] ?>">Sea Freight</option>
												<?php } else if ($row['user_dept'] == 'air') { ?>
													<option value="<?= $row['user_dept'] ?>">Air Freight</option>
												<?php } ?>
												<option value="">-- Select User Role --</option>
												<option value="all">All</option>
												<option value="sea">Sea Freight</option>
												<option value="air">Air Freight</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="manager_user_mail_edit" placeholder="Input email..." value="<?= $row['user_mail'] ?>">
										</div>
									</div>
								</div>
								<!-- End Manager Scope and Department -->
								<!-- User Scope and Department -->
								<div class="row" id="user_input_edit" style="display:none;">
									<div class="col-md-6">
										<div class="form-group">
											<label>Scope <font style="color: red;">*</font></label>
											<select class="form-control" id="id_user_scope" name="user_scope_edit">
												<?php if ($row['user_role'] == 'user') { ?>
													<option value="<?= $row['user_scope'] ?>"><?= $row['user_scope'] ?></option>
													<option value="">-- Select Scope --</option>
													<option value="all">All</option>
													<option value="import">Import</option>
													<option value="export">Export</option>
												<?php } else { ?>
													<option value="">-- Select Scope --</option>
													<option value="all">All</option>
													<option value="import">Import</option>
													<option value="export">Export</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department <font style="color: red;">*</font></label>
											<select class="form-control" id="id_user_dept" name="user_dept_edit">
												<?php if ($row['user_role'] == 'user' || $row['user_role'] == 'manager') { ?>
													<?php if ($row['user_dept'] == 'sea') { ?>
														<option value="<?= $row['user_dept'] ?>">Sea Freight</option>
													<?php } else if ($row['user_dept'] == 'air') { ?>
														<option value="<?= $row['user_dept'] ?>">Air Freight</option>
													<?php } ?>
													<option value="">-- Select Department --</option>
													<option value="all">All</option>
													<option value="sea">Sea Freight</option>
													<option value="air">Air Freight</option>
												<?php } else { ?>
													<option value="">-- Select Scope --</option>
													<option value="all">All</option>
													<option value="sea">Sea Freight</option>
													<option value="air">Air Freight</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="user_user_mail_edit" placeholder="Input email..." value="<?= $row['user_mail'] ?>">
										</div>
									</div>
								</div>
								<!-- End User Scope and Department -->
							</div>
							<div class="modal-footer">
								<button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
								<a href="javascript:window.open('','_self').close();" type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'include/jquery.php';
include 'include/alert.php';
?>
<!-- Add, Edit, Validasi -->
<script type="text/javascript">
	// Edit
	$(function() {
		$("#input-role-edit").change(function() {
			if ($(this).val() == "admin") {
				$("#admin_input_edit").show();
				$("#gm_input_edit").hide();
				$("#guest_input_edit").hide();
				$("#manager_input_edit").hide();
				$("#user_input_edit").hide();
			} else if ($(this).val() == "gm") {
				$("#gm_input_edit").show();
				$("#admin_input_edit").hide();
				$("#guest_input_edit").hide();
				$("#manager_input_edit").hide();
				$("#user_input_edit").hide();
			} else if ($(this).val() == "guest") {
				$("#guest_input_edit").show();
				$("#admin_input_edit").hide();
				$("#gm_input_edit").hide();
				$("#manager_input_edit").hide();
				$("#user_input_edit").hide();
			} else if ($(this).val() == "manager") {
				$("#manager_input_edit").show();
				$("#admin_input_edit").hide();
				$("#gm_input_edit").hide();
				$("#guest_input_edit").hide();
				$("#user_input_edit").hide();
				Swal.fire({
					icon: 'info',
					title: 'Information!',
					imageWidth: 400,
					imageHeight: 250,
					imageAlt: 'Custom image',
					html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
					showCloseButton: false,
					showCancelButton: false,
					focusConfirm: false,
					confirmButtonText: 'OK'
				})
			} else if ($(this).val() == "user") {
				$("#user_input_edit").show();
				$("#admin_input_edit").hide();
				$("#gm_input_edit").hide();
				$("#guest_input_edit").hide();
				$("#manager_input_edit").hide();
				Swal.fire({
					icon: 'info',
					title: 'Information!',
					imageWidth: 400,
					imageHeight: 250,
					imageAlt: 'Custom image',
					html: '<font style="font-size: 12px;font-weight: 300;">Make sure the mandarory input is not empty. <br><b>Pay attention to the input label <font style="color: red">*</font></b></font>',
					showCloseButton: false,
					showCancelButton: false,
					focusConfirm: false,
					confirmButtonText: 'OK'
				})
			} else {
				$("#admin_input_edit").hide();
				$("#gm_input_edit").hide();
				$("#guest_input_edit").hide();
				$("#manager_input_edit").hide();
				$("#user_input_edit").hide();
			}
		});
	});
</script>
<!-- End Add, Edit, Validasi -->
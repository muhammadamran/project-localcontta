<script src="assets/js/jquery.min.js"></script> 
<?php
include "include/connection.php";
include "include/restrict.php";
include "include/datatables.php";

$con=mysqli_connect("localhost","root","","contta");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$uid    = $_GET['user_id'];
$result = mysqli_query($con,"SELECT * FROM tb_user WHERE user_id ='$uid'");
$row = mysqli_fetch_array($result);

// CHANGE PASSWORD
if(isset($_POST["change_pass"]))    
{ 
  $cek_ = $_POST['mustbe_change'];
  if ($cek_ == '1') { 
    $ID                  = $_POST['uid'];
    $user_pass           = $_POST['new_pass'];
    $user_pass_update    = date('Y-m-d h:m:i');
    $user_pass_update_by = $_POST['user_pass_update_by'];
    $mustbe_change       = '1';


    $query = mysql_query("UPDATE tb_user SET user_pass='$user_pass',
                                             user_pass_update= '$user_pass_update',
                                             user_pass_update_by= '$user_pass_update_by',
                                             mustbe_change= '$mustbe_change'
                                             WHERE user_id=$ID");

    if($query) {
      header("Location: ./iou_adm_user.php?UpdatePassSuccess=true");                                      
    } else {
      header("Location: ./iou_adm_user.php?UpdatePassFailed=true");                                                  
    }
  } else {
    $ID                  = $_POST['uid'];
    $user_pass           = $_POST['new_pass'];
    $user_pass_update    = date('Y-m-d h:m:i');
    $user_pass_update_by = $_POST['user_pass_update_by'];

    $query = mysql_query("UPDATE tb_user SET user_pass='$user_pass',
                                             user_pass_update= '$user_pass_update',
                                             user_pass_update_by= '$user_pass_update_by'
                                             WHERE user_id=$ID");

    if($query) {
      header("Location: ./iou_adm_user.php?UpdatePassSuccess=true");                                       
    } else {
      header("Location: ./iou_adm_user.php?UpdatePassFailed=true");                                                  
    }
  }
}
?>
<?php include 'include/head.php';?>
<div id="wrapper">
	<?php include 'include/header.php';?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<i class="fa fa-atlas icon-title"></i> Administration
				</h1>
				<nav aria-label="breadcrumb" role="navigation">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item">Management Users</li>
						<li class="breadcrumb-item active" aria-current="page">Change Password Users</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-table"></i> [Change Password] Management Users - <?= $row['user_name'];?>
					</div>
					<div class="panel-body">
						<!-- Change Password -->
						<form method="post" action=" ">
							<div class="modal-body">
								<div class="form-group">
									<label>User Name</label>
									<input type="text" name="username" class="form-control" value="<?= $row['user_name'];?>" required readonly>
									<input type="hidden" name="uid" class="form-control" value="<?= $row['user_id'];?>" required>
								</div>
								<div class="form-group" id="new_pass" style="display: show;">
									<label>New Password <font style="color: red;">*</font></label>
									<input type="password" name="new_pass" id="password-field" class="form-control" placeholder="New password" required>
									<!-- Icon Eye -->
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<!-- End Icon Eye -->
									<input type="hidden" name="uid" value="<?= $row['user_id'];?>">
									<input type="hidden" name="user_pass_update_by" value="<?= $_SESSION['username'];?>">
								</div>
								<div class="form-group">
									<input id="mustbe_change" type="checkbox"  name="mustbe_change" value="1">
									<label for="mustbe_change">
										<font style="font-weight: 400">Click if the user must update the password after sign in.</font>
									</label>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="change_pass" class="btn btn-change"><i class="fa fa-unlock"></i> Change Password</button>
								<a href="javascript:window.open('','_self').close();" type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</a>
							</div>
						</form>
						<!-- End Change Password -->
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
<!-- Show Password in Change Password -->
<script type="text/javascript">
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>
<!-- End Show Password in Change Password -->
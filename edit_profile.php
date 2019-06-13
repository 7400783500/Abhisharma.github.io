<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
	<form action="" method="post" enctype="multipart/form-data">
	<table class="table table-bordered table-hover">
	<tr align="center">
	<td colspan="6" class="active"><h2>Edit Profile</h2></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Change your Firstname</td>
	<td><input type="text" name="f_name" required value="<?php echo $first_name; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Change your Lastname</td>
	<td><input type="text" name="l_name" required value="<?php echo $last_name; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Change your Username</td>
	<td><input type="text" name="u_name" required value="<?php echo $user_name; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Description</td>
	<td><input type="text" name="describe_user" required value="<?php echo $describe_user; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Relationship_status</td>
	<td><select name="Realtionship" id="" class="form-control">
	<option value=""><?php echo $Relationship_status  ?></option>
	<option value="">Engaged</option>
	<option value="">Married</option>
	<option value="">Single</option>
	<option value="">In an Relationship</option>
	<option value="">It`s a complicated</option>
	<option value="">Separated</option>
	<option value="">Widowed</option>
	<option value="">Divorced</option>
	</select></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Email</td>
	<td><input type="email" name="u_email" required value="<?php echo $user_email; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Show Password</td>
	<td><input type="password" name="u_pass" required value="<?php echo $user_pass; ?>">
	<input type="checkbox" onclick="show_password();"><strong>Show Password</strong>
	</td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Country</td>
	<td><select name="user_country" id="" class="form-control">
	<option value=""><?php echo $user_country  ?></option>
	<option value="">India</option>
	<option value="">USA</option>
	<option value="">UK</option>
	<option value="">Pakistan</option>
	<option value="">Nepal</option>
	<option value="">Japan</option>
	<option value="">Asia</option>
	<option value="">Chin</option>
	</select></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Gender</td>
	<td><select name="user_gender" id="" class="form-control">
	<option value=""><?php echo $user_gender ?></option>
	<option value="">Male</option>
	<option value="">Female</option>
	<option value="">Others</option>
	</select></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Birthdate</td>
	<td><input type="text"  name="user_birthday" required value="<?php echo $user_birthday; ?>"></td>
	</tr>
	<tr>
	<td style="font-weight:bold" >Forgotten Password</td>
	<td><button class="btn btn-dafault" type="button" data-toggle="modal" data-target="#myModal">Turn On</button>
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Modal Header</h4>
	</div>
	<div class="modal-body">
	<form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
	<strong>What is your best friend name?</strong>
	<textarea name="content" placeholder="Someone" cols="83" rows="4" class="form-control"></textarea><br>
	<input type="submit" class="btn btn-dafault" name="sub" value="submit" style="width:100px;"><br><br>
	<pre>Answer the above question we will ask question if you forgot your <br>password.</pre><br><br>
	</form>
	<?php
	if(isset($_POST['sub']))
	{
		$bfn = htmlentities($_POST['content']);
		if($bfn == '')
		{
			echo "<script>alert('Please enter something')</script>";
			echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
			exit();
		}
		else{
			$update = "update users set recovery_account='$bfn' where user_id='$user_id'";
			$run = mysqli_query($con,$update);
			if($run)
			{
				echo "<script>alert('Working...')</script>";
			echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
			}
			else{
				echo "<script>alert('Error while updating information')</script>";
			echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
			}
		}
	}
	?>
	</div>
	<div class="modal-footer">
	<button type="button" class="btn btn-dafault" data-dismiss="modal">Close</button>
	</div>
	</div>
	</div>
	</div>
	</td>
	</tr>
	<tr align="center">
	<td colspan="6"><button type="button" name="updat" class="btn btn-info" style="width:250px;">Update</button></td>
	</tr>
	</table>
	</form>
	</div>
	<div class="col-sm-2"></div>
</div>
</body>
</html>

<?php
if(!isset($_POST['updat']))
{
	echo "<script>alert('Button is not pressed')</script>";
}
else{
	global $con;
	$f_name = htmlentities($_POST['f_name']);
	$l_name = htmlentities($_POST['l_name']);
	$u_name = htmlentities($_POST['u_name']);
	$describe_user = htmlentities($_POST['describe_user']);
	$Relationship_status = htmlentities($_POST['Relationship']);
	$u_pass = htmlentities($_POST['u_pass']);
	$u_email = htmlentities($_POST['u_email']);
	$u_country = htmlentities($_POST['user_country']); 
	$u_gender = htmlentities($_POST['user_gender']);
	$u_birthday = htmlentities($_POST['user_birthday']);
	$update = "update users set f_name='$f_name',l_name='$l_name',u_name='$u_name',describe_user='$describe_user',
	Relationship='$Relationship_status',u_pass='$u_pass',u_email='$u_email',user_country='$u_country',user_gender='$u_gender',user_birthday='$u_birthday' where user_id='$user_id'";
	$run = mysqli_query($con,$update);
	if($run)
	{
		echo "<script>alert('Your profile updated')</script>";
			echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
	}
	else{
		echo "<script>alert('Your profile  not updated')</script>";
			echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
	}
}

?>

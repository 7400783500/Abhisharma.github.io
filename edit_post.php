<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
    <title>Edit post</title>
</head>
<body>
   <div class="row">
   <div class="col-sm-3">
   </div>
   <div class="col-sm-6">
   <?php
   if(isset($_GET['post_id']))
   {
       $get_id = $_GET['post_id'];
       $get_post = "select * from posts  where post_id='$get_id'";
       $run_post = mysqli_query($con,$get_post);
       $row = mysqli_fetch_array($run_post);
       $post_con = $row['post_content'];

   }
   ?>
   <form action="" method="post" id="f">
   <center><h2>Edit your post:</h2></center><br>
   <textarea name="content" id="" cols="83" rows="4" class="form-control"><?php echo $post_con; ?></textarea><br>
   <input type="submit" name="update" value="Update post" class="btn btn-info">
   </form>
   <?php
   if(isset($_POST['update']))
   {
       $content = $_POST['content'];
       $update_post = "update posts set post_content='$content' where post_id ='$get_id'";
       $run_update = mysqli_query($con,$update_post);
       if($run_update)
       {
           echo "<script>alert('A post have been Updated!')</script>";
           echo "<script>window.open('home.php','_self')</script>";
       }
   }
   
   ?>
   </div>
   <div class="col-sm-3"></div>
   </div> 
</body>
</html>
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
	<div class="col-sm-12">
        <center><h2>Find New people</h2></center><br><br>
        <div class="row">
            <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <form action="" class="search_form">
            <input type="text" name="search_user" placeholder="Search People" style="padding: 10px;
	font-size: 17px;
	border-radius: 4px;
	border: 1px solid grey;
	float: left;
	width: 80%;
	background: #f1f1f1;">
            <button class="btn btn-info" name="search_user_btn" type="submit" style="float: left;
	 width: 20%;
	 font-size: 17px;
	 padding: 10px;
	 border: 1px solid grey;
	 border-left: none;
     cursor: pointer;
     margin-left:px">Search</button>
        </form>
        </div>
        <div class="col-sm-4"></div>
        </div><br><br>
        <?php search_user();?>
    </div>
</div>
</body>
</html>
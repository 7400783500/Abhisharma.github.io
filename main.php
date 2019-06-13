<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Abhi Sharma</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<style>
#signup{
	width:100%;
	border-radius:30px;
}
#login{
	width:100%;
	border-radius:30px;
	background-color:#fff;
	border:1px solid #1da1f2;
	color:#1da1f2;
}
#login:hover{
	width:100%;
	border-radius:30px;
	background-color:#fff;
	border:2px solid #1da1f2;
	color:aqua;
}
body{
	padding:0px;
	margin:0px;
	font-family:arial;
}
.container{
	position:absolute;
	left:0px;
	top:0px;
	width:100%;
	height:100vh;
	animation:slide 16s ease-in-out infinite;

}
/*@keyframes slide{
	0%{
	 background-image:url('image/zxc.jpg.jpg');
 }
 20%{
	 background-image:url('img/img1.jpg');
 }
 40%{
	 background-image:url('img/img2.jpg');
 }
 60%{
	 background-image:url('img/img3.jpg');
 }
 80%{
	 background-image:url('img/img10.jpg');
 }
 100%{
	 background-image:url('img/img11.jpg');
 }
}*/
</style>
</head>
<body style="background-image:url(image/zxc.jpg.jpg);background-repeat:no-repeat;background-size:cover;">
	
		<div class="outer responsive-img" >
			<div class="details">
			<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<div class="navbar-fixed">
				<nav class="teal">
					<a href="" class="brand-logo center">Facemash</a>
				</nav>
			</div>
		</div>
	<div class="col l3 m3 s6" style="background:rgba(0,0,0,0)">
	<div class="card">
<div class="card-image">
<img src="img/img10.jpg" alt="">
<span class="card-title red-text">Abhi</span>
</div>
<div class="card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa itaque nisi libero saepe molestias fugit voluptate minus expedita doloremque eos?</div>
<div class="card-action center cyan pulse"><a href="" class="white-text">Read More</a> </div>
</div>
</div>
<div class="col l3 m3 s6" style="background:rgba(0,0,0,0)">
	<div class="card">
<div class="card-image">
<img src="img/img14.jpg" alt="">
<span class="card-title red-text">Abhi</span>
</div>
<div class="card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa itaque nisi libero saepe molestias fugit voluptate minus expedita doloremque eos?</div>
<div class="card-action center blue pulse z-depth-5"><a href="" class="white-text">Read More</a> </div>
</div>
</div>

<div class="col l3 m4 s12" style="background:rgba(10,0,0,0)" >	

	<div class="card">
	<div class="card-image">
		<img src="img/img29.jpg" alt="">
		<span class="card-title blue-text">Abhi Sharma</span>
	</div>
	</div>
	<form action="" method="post" class="center">
		<button id="signup" class="btn btn-info btn-lg pulse z-depth-5" name="signup">Sign Up</button>
		<?php
		if(isset($_POST['signup']))
		{
			echo "<script> window.open('signup.php','_self')</script>";
		}
		?><br><br>
		<button id="login" class="btn btn-info btn-lg pulse z-depth-5 waves-effect" name="login">Login</button>
		<?php
		if(isset($_POST['login']))
		{
			echo "<script> window.open('signin.php','_self')</script>";
		}
		?>
	</form>
</div>
<div class="col l3 m3 s12" style="background:rgba(0,0,0,0)">
<ul class="collection">
<li class="collection-item">
<div class="input-field">
<input type="text" id="search" name="search" placeholder="Search Anything.....">
<div class="center">
<input type="submit" name="submit" class="btn">
</div>
</div>
</li>
</ul>
<div class="card center"><h4> Trending Post</h4>
<div class="collection with-header">
<a href="" class="collection-item">lorem</a>
</div>
<div class="collection with-header">
<a href="" class="collection-item grey lighten-3">lorem</a>
</div>
<div class="collection with-header">
<a href="" class="collection-item">lorem</a>
</div>
<div class="collection with-header">
<a href="" class="collection-item grey lighten-3">lorem</a>
</div>
<div class="collection with-header">
<a href="" class="collection-item">lorem</a>
</div>

	
	</div>
	
	</div>
				
			</div>
		</div>
	</div>
	
	<footer class="page-footer blue">
<div class="container-fluid">
THE GREAT ABHI SHARMA
<span class="right">Follow us know
<a href="" class="btn btn-floating blue"><i class="fa fa-facebook"></i></a>
<a href="" class="btn btn-floating red"><i class="fa fa-youtube"></i></a>
<a href="" class="btn btn-floating cyan"><i class="fa fa-twitter"></i></a>
<a href="" class="btn btn-floating red lighten-2" aria-hidden="true"><i class="fa fa-instagram"></i></a>
</span>
</div>
<div class="clearfix"></div>
<div class="footer-copyright">
<div class="container-fluid">
&copy; All Right Reserved , Abhi Sharma
</div>
</div>
</footer>

	


	
	<script type="text/javascript" src="js/materialize.min.js"></script>
	  <script src="js/jquery2.js"></script>
	  <script>
	  $(document).ready(function(){
		  $('.carousel').carousel();
	  });
	  </script>
</body>
</html>
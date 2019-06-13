<?php
session_start();
include ('connection.php');
?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" arai-expanded="false"></button>
<span class="sr-only">Toggle-navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<a href="home.php" class="navbar-brand"> Abhi Sharma</a>
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<?php
$user_email = $_SESSION['password'];
$get_user = "select * from users where email = '$user_email'";
$run_user = mysqli_query($conn,$get_user);
$row = mysqli_fetch_array($run_user);
$user_id = $row['id'];
$username = $row['username'];
$user_describe = $row['describe_user'];
$relationship = $row['Relationship'];
$user_image = $row['user_image'];
$user_cover = $row['user_cover'];
$recovery_account = $row['recovery_account'];
$register_data = $row['user_reg_data'];
$user_posts = "select * from posts where user id = '$user_id'";
$run_posts = mysqli_query($conn,$user_posts);
$posts = mysqli_num_rows($run_posts);

?>
<li><a href="profile.php?<?php echo 'id = $user_id' ?>"></a><?php echo "$username"; ?></li>
<li><a href="home.php">Home</a></li>
<li><a href="home.php">Find People</a></li>
<li><a href="messages.php?id = new">Messages</a></li>
<?php
echo "<li class='dropdown'>
<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true'
aria-expanded='false'><span class='glyphicon glyphicon_chevron-down'></span></a>
<ul class='dropdown-menu'>
<li>
    <a href='edit_profile.php?u_id=$user_id'>Edit account</a>
    </li>
    <li role='separator' class='divider'></li>
    <li><a href='logout.php'>Logout</a></li>
    </ul>
    </li>

";
?>
</ul>
<ul class="nav navbar-nav navbar-right" >
<li class="dropdown">
<form action="results.php" class="navbar-form navbar-left" method="get">
<div class="form-group">
<input type="text" name="user_query" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-info" name="search">Search</button>
</form>
</li>
</ul>
</div>
</div>
</nav>
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
    <style>
    #scroll_messages{
        max-height:500px;
        overflow:scroll;
    }
    #btn-msg{
        height:28px;
        width:20%;
        border-radius:5px;
        margin:5px;
        border:none;
        color:#fff;
        float:right;
        background-color:#2ecc71;
    }
    #select_user{
        max-height:500px;
        overflow:scroll;
    }
    
    #blue{
        font-size:16px;
        width:45%;
        border-radius:3px;
        padding:2.5px;
        border:none;
        border-color:#2980b9;
        float:right;
        background-color:#3489db; 
    }
    </style>
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
    <?php
    if(isset($_GET['u_id']))
    {
        global $con;
        $get_id = $_GET['u_id'];
        $get_user = "select * from users where user_id='$get_id'";
        $run_user = mysqli_query($con,$get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_to_msg = $row_user['user_id'];
        $user_to_name = $row_user['user_name'];

    }
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con,$get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_from_msg = $row['user_id'];
    $user_from_name = $row['user_name'];
    ?>
    <div class="col-sm-3" id="select_user">
    <?php
    $user = "select * from users";
    $run_user = mysqli_query($con,$user);
    while($row_user = mysqli_fetch_array($run_user))
    {
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $first_name = $row_user['f_name'];
        $last_name = $row_user['l_name'];
        $user_image = $row_user['user_image'];
        echo "
        <div class='container-fluid'>
        <a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='messages.php?u_id=$user_id'>
        <img src='users/$user_image' width='90px' height='80px' title='$user_name' class='img-circle'><strong>&nbsp $first_name $last_name</strong><br><br>
        </a>
        </div>
        ";
    }
    ?>
    </div>
   <div class="col-sm-6">
        <div class="load_msg" id="scroll_messages">
            <?php
            $sel_msg = "select * from user_messages2 where (user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
            $run_msg = mysqli_query($con,$sel_msg);
            while($row_msg = mysqli_fetch_array($run_msg))
            {
                $user_to = $row_msg['user_to'];
                $user_from = $row_msg['user_from'];
                $msg_body = $row_msg['msg_body'];
                $msg_date = $row_msg['date'];
                ?>
                <div id="loaded_msg">
                    <p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg)
                    {
                        echo "<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";
                    }
                    else 
                    {
                        echo "<div class='message' id='green' data-toggle='tooltip' style=' font-size:16px;
                        width:45%;
                        border-radius:3px;
                        padding:2.5px;
                        border:none;
                        border-color:#27ae60;
                        float:left;
                        background-color:#2ecc71; ' title='$msg_date'>$msg_body</div><br><br><br>";
                    }
                    ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if(isset($_GET['u_id']))
        {
            $u_id = $_GET['u_id'];
            if($u_id == "new")
            {
                echo "
                <form><center><h3>Select someone to start conservation</h3></center>
                <textarea disabled class='form-control' placeholder='Enter your message'></textarea>
                <input type='submit' class='btn btn-default' disabled value='Send'>
                </form><br><br>
                ";
            }
            else{
                echo '<form method="post">
                <textarea  class="form-control" placeholder="Enter your message" name="msg_box" id="message_textarea"></textarea>
                <input type="submit" class="btn btn-default" name="send_msg" id="btn-msg" value="Send">
                </form><br><br> ';
            }
        }
        ?>
        <?php
        if(isset($_POST['send_msg']))
        {
            $msg = htmlentities($_POST['msg_box']);
            if($msg == "")
            {
                echo "<h4 style='color:red;text-align:center;'>Message was unable to send </h4>";
            }
            else if(strlen($msg) >37){
                echo " <h4 style='color:red;text-align:center;'>Message is too long! Use only 37 characters </h4>" ;
            }
            else{
                $insert = "insert into user_messages2 (user_to,user_from,msg_body,date,msg_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
                $run_insert = mysqli_query($con,$insert);

            }
        }
        ?>
    </div>
    <div class="col-sm-3">
       <?php
      
    
    if(isset($_GET['u_id']))
    {
        global $con;
        $user_id = $_GET['u_id'];
        $select = "select *  from users where user_id='$user_id'";
        $run = mysqli_query($con,$select);
        $row = mysqli_fetch_array($run);
        $id = $row['user_id'];
        $image = $row['user_image'];
        $name = $row['user_name'];
        $f_name = $row['f_name'];
        $l_name = $row['l_name'];
        $describe_user = $row['describe_user'];
        $country = $row['user_country'];
        $gender = $row['user_gender'];
        $register_date = $row['user_reg_date'];
    }
    if($user_id == "new"){
        
    }
    else{
        echo "
        <div class='row'>
        <div class='col-sm-1'></div>
        <center>
        <div style='background-color:#e6e6e6' class='col-sm-11'><h2>
        Information About
        </h2>
        <img src='users/$image' class='img-circle' width='150px' height='150px'>
       
        <br><br>
        <ul class='list-group'>
        <li class='list-group-item' title='username'>
        <strong>$f_name $l_name</strong>
        </li>
        <li class='list-group-item' title='User status'>
        <strong style='color:grey;'>$describe_user</strong>
        </li>
        <li class='list-group-item' title='country'>
        <strong>$country</strong>
        </li>
        <li class='list-group-item' title='gender'>
        <strong>$gender</strong>
        </li>
        <li class='list-group-item' title='User Registraton Date'>
        <strong>$register_date</strong>
        </li>
        </ul>
        </div>
        <div class='col-sm-1'> </div>
        </div>
        ";
    }
    
        
   
    ?>
        
    </div>
</div>
<script>
var div  = docement.getElementById("scroll_messages");
div.scrollTop  =  div.scrollHeight;
</script>
</body>
</html>
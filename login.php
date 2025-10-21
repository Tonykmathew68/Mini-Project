<?php
session_start();
error_reporting(0);
include("include/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>

  <script>
   $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
   
		function loginValid(mail,passwrd)

		{
                    	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			
		   if(mail.value.match(mailformat))
			{
				
				if(passwrd.value.match(passw)) 
					{ 
					return true;
					}
					else
					{ 					
					window.location="login.php";
					}
			}
		  else
			{
			document.login.email.focus();
			}
		}
	</script>

<style>
	
	.errmessage
		{
			color:red;
			}
	</style>

</head>
<body> 
	<div class="header">
	
		<div class="bottom-header" style="background-color:palegreen;">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="register.php"><span> </span>Register</a></div>
							<ul class="login">
								<li><a href="login.php"><span> </span>LOGIN</a></li> |
								<li ><a href="register.php">SIGNUP</a></li>
							</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>REGISTERED USERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form onsubmit="return loginValid(document.login.mail,document.login.password)"  action="login.php"  name="login" id="login" method="POST">
				  <div>
					<span>Email Address<label style="color:red;">*</label></span>
					<input type="text"  placeholder="Enter Email id" class="input input1 form-control" name="mail" id="mail" required>
				  </div>
				  <div>
					<span>Password<label style="color:red;">*</label></span>
					<input type="password" placeholder="Enter Password " class="input input1 form-control" name="password" id="password" required>
				  </div>

				  <input type="submit" name="submit" value="Login" > &nbsp &nbsp &nbsp  <a href="forgot2.php">forgot password</a>
			    </form>
			   </div>	
			    <div class=" login-left">
			  	 <h3>Are you new to our site</h3>
				 
				 <a class="acount-btn" href="register.php">Sign Up here</a>
				
				 
			   </div>
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
	   		     		<img class="img-responsive chain" src="images/ii.jpg" alt=" " />   		     		
</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","organic_shop")or die ("Couldn't connect");
if(isset($_POST["submit"]))
{

$mail=$_POST["mail"];
$password=$_POST["password"];
$flag=0;

$disp="SELECT  * from tbl_login WHERE  email='$mail'";

$disp_result=mysqli_query($con,$disp);

$disp_reg="SELECT  * from tbl_registration WHERE  email='$mail'";
$disp_reg_res=mysqli_query($con,$disp_reg);

$reg_row=mysqli_fetch_array($disp_reg_res);
$rid1=$reg_row['rid'];

if(mysqli_num_rows($disp_result) > 0)
{
	while($row=mysqli_fetch_array($disp_result))
	{
	
	$email=$row['email'];
	$passwrd=$row['password'];
	$user_type_id=$row['user_type_id'];
	
	if((strcmp($email, $mail) == 0))
  	{	
		$flag=1;
		if((strcmp($passwrd, $password) == 0))
		{
			if($user_type_id==1)
			{
				
				
				$_SESSION['alogin']=$_POST['mail'];
				$c=1;
				$c=$c+1;
				echo "<script type='text/javascript'>alert('Logged in successfully '); 
				window.location='admin_home.php';
				</script>";
				break;
			}
			else if($user_type_id==3)
			{
				
				
					$_SESSION['alogin'] = $mail;
					echo "<script type='text/javascript'>alert('Logged in successfully'); 
					
					window.location='seller_home.php';</script>";

					break;
			}
			else if($user_type_id==2)
			{
				
					$_SESSION['alogin'] = $mail;
					echo "<script type='text/javascript'>window.location='customer_home.php?msg=Login Success';</script>";

					break;
				
			}
			else
				
				{
					echo "
			<script type='text/javascript'>alert('invalid user type !'); 
			window.location='login.php';
			</script>";
					
				}
		
		}
		else
			{
			echo "
			<script type='text/javascript'>alert('Wrong password.Please enter a valid password !'); 
			window.location='login.php';
			</script>";

			}
	}
	
 }
}
else
{

	echo "<script type='text/javascript'>

		alert('Your credentials are invalid or You are not enrolled ..Please sign up now');
		window.location='login.php';
		</script>";
		
exit();
		
}
}
?>

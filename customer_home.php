<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['email'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM tbl_login WHERE email='$emil' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['email'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer|Home</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="icon"href="1.jpg">
<script src="js/jquery.min.js"></script>
	<style>
							.w3l_search{
								float: left;
								width: 57%;
								margin:.1em 0 0em 10em;
							}
							.w3l_search input[type="text"]{
								outline: none;
								padding: 10px;
								color: #212121;
								font-size: 14px;
								width: 85%;
								background: #fff;
								border: 1px solid #999;
								float: left;
							}
							.w3l_search input[type="submit"]{
								outline: none;
								padding: 10px 0 9px;
								width: 15%;
								border: 1px solid;
								position: relative;								
							}
							.w3l_search input[type="submit"]:hover{
								background: url(img-sp.png) no-repeat 14px 5px #84C639;
							}
							</style>
<style>
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
* {box-sizing: border-box;}
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
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value=" search">
									</form>
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="customer_profile.php"><span> </span><?php echo $mail?></a></div>
							<ul class="login">						
								<li><a href="logout.php"><span> </span> </span>LOGOUT</a></li>                                
							</ul>
						<div class="cart"><a href="cart_view.php"><span> </span>CART </a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>	
	<div class="container">	
      	   <div class="account_grid">			   
				<div class=" login-right">			
			  	<h3>Welcome to organic world</h3><br><br>			
			   </div>
			   <div class=" login-right">	    
			  	<?php
					if(isset($_GET['msg'])){
						$msg=$_GET['msg'];
						echo"<center><p id='msgtext'><font color='red'>"
							.$msg
							."</font></p></center>";
					}
				?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script type="text/javascript">
					$(function(){
						$("#msgtext").fadeOut(2000);
					});
				</script>			
			   </div>
			    <div class=" login-left">			
			   </div>			
			   <div class="clearfix"> </div>		   
			 </div>			 
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		 <ul class="menu">
		 <ul class="kid-menu">
		<li><a href="seller_home.php"> Home</a></li>
		</ul>
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="customer_profile.php">View Profile </a></li>
				<!--<li class="subitem1"><a href="seller_update_profile.php">Update profile</a></li>-->
				<li class="subitem1"><a href="customer_update.php">Change Password</a></li>
			</ul>
		</li>			
		<ul class="kid-menu ">
				<li><a href="view_products.php">View Products</a></li>
				<li><a href="Customer_view_orders1.php">My Orders</a></li>			
				<li><a href="customer_complaints.php">My Complaints</a></li>				
			</ul>	
	</ul>
					</div>
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
					<div class=" chain-grid menu-chain">
	   		     		<img class="img-responsive chain" src="images/a.jpg" alt=" " />	   		     		
	   		     	</div>
			</div>
				 <center><image src="a.jpeg";
			  <div class="clearfix"> </div>
      	 </div>
	<div class="footer">	
		<div class="footer-bottom">
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>

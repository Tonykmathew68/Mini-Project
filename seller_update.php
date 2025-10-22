<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
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
				
				//document.login.email.focus();
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
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
									<form action="search_prod_action.php" method="POST">
										<input type="text" name="product" id="product" placeholder="Search a product..." required>
										<input type="submit" name="search" id="search" value=" ">
									</form>
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></a></div>
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li> 
								<!--<li ><a href="register.php">SIGNUP</a></li>-->
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
			  	<h3>UPDATE PASSWORD</h3>
				
				<form  action="customer_update_pass.php" name="updatepass" id="updatepass" method="POST">
					
					
				  <div>
					<span >OLD PASSWORD<label style="color:red;">*</label></span>
					<input type="password"  placeholder="Enter password" name="oldpassword" id="oldpassword"onblur="checkoldpassword()"class="input input1 form-control" required>
				  </div>
				    <h3 id="errorpswrdold"  name="errorpswrdold" class="errmessage" ></h3>
				  <div>
					<span   >NEW PASSWORD<label style="color:red;">*</label></span>
					<input type="password" placeholder="Enter Password " class="input input1 form-control" name="password" id="password"onblur="checkpassword()" required>
				  </div>
				  <h3 id="errorpswrd"  name="errorpswrd" class="errmessage" ></h3>
				  
                   <div>
					<span >CONFIRM PASSWORD<label style="color:red;">*</label></span>
					<input type="password" placeholder="Enter Password " class="input input1 form-control" name="cpassword" id="cpassword"  onblur="checkCpassword()" required>
				  </div>
				  <h3 id="errorCpswrd"  name="errorCpswrd" class="errmessage" ></h3>

				  
				  <script>
					
							function checkoldpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("oldpassword").value==null ||updatepass.oldpassword.value.length==0)
								{
								document.getElementById("errorpswrdold").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("oldpassword").value.match(passw))
								{
								document.getElementById("errorpswrdold").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrdold').innerHTML="Please enter a valid password";
								  
								   document.getElementById("oldpassword").value="";
								   
									}

							}
							
							
							
							function checkpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("password").value==null ||updatepass.password.value.length==0)
								{
								document.getElementById("errorpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("password").value.match(passw))
								{
								document.getElementById("errorpswrd").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrd').innerHTML="Please enter a valid password";
								   alert(' Your password should be 8 to 20 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character');
								   document.getElementById("password").value="";
								   
									}

							}

							function checkCpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
							var passwrd=document.getElementById("password").value;
							var cpasswrd=document.getElementById("cpassword").value;

									
							if(document.getElementById("cpassword").value==null ||updatepass.cpassword.value.length==0)
								{
								document.getElementById("errorCpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("cpassword").value.match(passw))
								{
								document.getElementById("errorCpswrd").innerHTML=" ";
								
										if(passwrd==cpasswrd)
													{ 	document.getElementById("errorCpswrd").innerHTML=" ";
													
														}
													else{
													document.getElementById("errorCpswrd").innerHTML="Password and confirm password did not match!";
														document.getElementById("cpassword").value="";
													}
								}

								else
								{
								document.getElementById('errorCpswrd').innerHTML="Password and confirm password should be valid and  same";
								document.getElementById("cpassword").value="";
								 }

							}

	</script>
				  <input type="submit" name="submitp"id="submitp" value="Change password" >
			    </form>
			   </div>		   
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>
		 <ul class="menu">
		 <ul class="kid-menu">
			<li ><a href="seller_home.php">Home</a></li>
			</ul>
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
			<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>		
			</ul>
		</li>
		<ul class="kid-menu">
			<li ><a href="product.php">Add Product</a></li>
			<li ><a href="viewproduct.php">My Products</a></li>		
			</ul>
			<li class="item2"><a href="#">Orders<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="new_received_orders.php">View new orders</a></li>
				<li class="subitem1"><a href="seller_delivered_orders.php">Dispatched Orders</a></li>
			</ul>
		</li>
		<li class="item2"><a href="#">complaints<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_complaint.php">New Complaints</a></li>
				<li class="subitem1"><a href="seller_replied_complaints.php">Replied Complaints</a></li>
			</ul>
		</li>
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
	   		     		<div class="grid-chain-bottom chain-watch">
	<div class="footer">
<?php
}
else
{
	header('Location:login.php');
}
?>

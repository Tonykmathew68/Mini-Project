<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php
$con=mysqli_connect("localhost","root","","organic_shop")or die ("Couldn't connect");
$disp="SELECT  tbl_registration.fname,tbl_registration.rid, tbl_registration.lname,tbl_registration.phone_no,tbl_registration.email,tbl_registration.place, tbl_registration.images  FROM tbl_registration INNER JOIN  tbl_login
ON tbl_login.email=tbl_registration.email WHERE  tbl_login.user_type_id=2  ORDER BY tbl_registration.email ASC";
$disp_result=mysqli_query($con,$disp);
$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Add|Category</title>
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

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
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
<div class="account"><a href="admin_profile.php"><span> </span><?php echo $mail?></a></div>				
						<div class="account"><a href="index.htmln> </span> logout</a></div>
							<ul class="login">
							
								<li><a href="logout.php"><span> </span>LOGOUT</a></li> 
								
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
			  	<h3>REGISTERD CUSTOMERS</h3>	
				<section style="margin-left:20px;margin-right:20px ;  padding:75px ">
				<form action="viewsellerproduct.php" method="POST" name="prod" id="prod">
<table  id="designs">	
<tr>
<th>No</th>
<th> first name</th>
<th>last name</th>
<th>phone no </th>
<th>email </th>
<th> place </th>
<th>Profile PIc </th>
 </tr>
<?php
$count=1;
 while($array=mysqli_fetch_array($disp_result))
	{
		
 ?>
 <tr>
  <td>
 <?php echo $count;?>
 </td>
<td>

<?php 

$fname=$array[0];

echo $fname;?></td>
<td>
<?php 
	echo $array[1];
?></td>
<td>

<?php 
echo $array[2];
?></td>
<td><?php echo $array[3];?></td>
<td><?php echo $array[4];?></td>
<td><img src="uploads/profile/<?php echo $array['images'] ?>"   alt="image"/ style="width:100px;height:100px;"  ></td>
<td><a href="viewsellerproduct.php?rid=<?php echo $array['rid'];?>&action=edit" background="#FF5733 "; style="color:red;" ><b></b></a><td> 
</tr>
<?php
$count++;
 } ?>
</table>
</form>
</br>
</br>
	</section>
</br>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
		<h3 class="cate">MENU</h3>			
		 <ul class="menu">
		 <ul class="kid-menu">
		<li ><a href="admin_home.php">Home</a></li>
		</ul>
		<li class="item2"><a href="view_users.php">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="admin_update.php">Update password </a></li>
				<li class="subitem1"><a href="admin_profile.php">View profile </a></li>
			</ul>
		</li>
		<li class="item2"><a href="view_users.php">View users<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="reg_sellers.php">View Sellers </a></li>
				<li class="subitem1"><a href="reg_customer.php">View Customers </a></li>
			</ul>
		</li>	
				<li>				
			<ul class="kid-menu">
				<li><a href="addcat.php">Add category</a></li>				
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

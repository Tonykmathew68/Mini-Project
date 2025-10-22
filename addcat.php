<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php
$con=mysqli_connect("localhost","root","","organic_shop")or die ("Couldnt connect");
$disp="SELECT  *from tbl_product_category ORDER BY prod_category_name ASC";
$disp_result=mysqli_query($con,$disp);
$prodname="";                                  
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
#designs {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#designs td, #designs th {
  border: 1px solid #ddd;
  padding: 8px;
}
#designs tr:nth-child(even){background-color: #f2f2f2;}
#designs tr:hover {background-color: #ddd;}
#designs th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #090200  ;
  color: white;
}
.headings {
  color: red;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 150%;
}
.errmessage
{
	color:red;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
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
							<ul class="login">
								<li><a href="logout.php"><span> </span>LOGOUT</a></li> 
							</ul>				
					<div class="clearfix"> </div>						
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
			  	<h3>ADD CATEGORY</h3>
				<p style="color:black">Add new product category</p>
</br>
		<table id="designs">		
		<tr>		
		<th>Enter product name</th>		
		</tr>		  
		<tr>
		<form action="addcat.php" method="POST" name="add_new_prod_cat" id="add_new_prod_cat">
						<td>
						
			<input type="text" name="prod_category_name" id="prod_category_name" autocomplete="off" onblur="checkNewProdCat()" placeholder="new category name" value="" required>
					<span id="nerrorname" class="errmessage">    </span>				
				<script>			
							function checkNewProdCat()
									{
									var letters = /^[a-zA-Z][a-zA-Z]+$/;						
									var fnamevalue=document.getElementById("prod_category_name").value;									
									if (fnamevalue==null || add_new_prod_cat.prod_category_name.value.length==0)
									{
									document.getElementById('nerrorname').innerHTML="Mandatory Field!";
									}
									else if(add_new_prod_cat.prod_category_name.value.match(letters))
									{
									document.getElementById('nerrorname').innerHTML=" ";
									}
									else
									{					
									document.getElementById('nerrorname').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('prod_category_name').value = ""; 
									add_new_prod_prod_category_name.value ="";
									}
									}	
					</script>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp				
						<center><input type="submit" name="newprod_cat_s" id="newprod_cat_s" value="Add product category">	</center>		
						</td>	
					</form>
<?php
if(isset($_POST["newprod_cat_s"]))
{
$prod_category_name=$_POST['prod_category_name'];
$flag=0;
$prodc="";
$checknamep="Select * from tbl_product_category WHERE prod_category_name='$prod_category_name'";
$disp_presult=mysqli_query($con,$checknamep);
while($row=mysqli_fetch_array($disp_presult))
{
$prodc=$row['prod_category_name'];
if((strcmp($prodc,$prod_category_name) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The category is already Existing'); 
		
		window.location='addcat.php';</script>";
		
		break;
	}
}
if($flag==0)
{
	$q_ins="INSERT INTO `tbl_product_category`(`prod_category_name` ) VALUES ('$prod_category_name')";
if(mysqli_query($con,$q_ins)==TRUE)
{
		echo "<script type='text/javascript'>				
				window.location='addcat.php';
				</script>";
}
else
{	
	echo "<script type='text/javascript'>				
				window.location='addcat.php';				
				</script>";
}
}
else
{
	echo "<script type='text/javascript'>			
				window.location='addcat.php';				
				</script>";
}
}
?>
		</table>		
		<br>
<h2 font size="4"><i> Product Category</i> </h2>
<table>
  <tr>
    <th>NO </th>
    <th>PRODUCT CATEGORY</th>
    <th>EDIT</th>
	<th>DELETE<th>
  </tr>
<tbody>
`							   <?php
									  $checknamep="Select * from tbl_product_category";
                                          $disp_presult=mysqli_query($con,$checknamep);
										  $counter = 0;
while($row=mysqli_fetch_array($disp_presult))
                                          {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td>  <?php echo $row["prod_category_name"];?></td>
                                                <td class="text-right"><a style="color:#FF0000;"href="docedit.php?k=<?php echo $row['product_category_id']?>& j=<?php echo $row['prod_category_name']?>"><img src="images/edit.png" width="25" height="25"></a></td>
                                                <td class="text-right"><a style="color:#FF0000;"  href="dodelete.php?j=<?php echo $row['product_category_id']?>"><img src="images/delete.jfif" width="25" height="25"></a></td>
                                            </tr>
                                            <?php
                                          }
                                          ?>
                                        </tbody>
</table>
</br>
</br>	
						<?php	
						$get=mysqli_query($con,"SELECT * FROM tbl_product_category  ORDER BY prod_category_name ASC");
							$option = '';
							 while($row = mysqli_fetch_assoc($get))
							{
							  $option .= '<option value = "'.$row['prod_category_name'].'">'.$row['prod_category_name'].'</option>';
						$prodname=$row['prod_category_name'];
						
							}			
						?>
						<?php echo $option;
						?>
<?php
if(isset($_POST["uprod_cat"]))
{
$newprodname=$_POST["prod_category_name"];
$prod_category_name=$_POST["prod_cat"];
						$getid=mysqli_query($con,"SELECT product_category_id FROM tbl_product_category  wHERE prod_category_name= '$prod_category_name' ");
							
							 while($row = mysqli_fetch_assoc($getid))
							{
							  
							$gproduct_category_id=$row['product_category_id'];
						
							}
if($newprodname=="")
{
		echo "<script type='text/javascript'>
				
				alert('Please enter valid prod name to update'); 
				window.location='addcat.php';
				</script>";
}
else{
	$q_update="UPDATE tbl_product_category SET prod_category_name='$newprodname' WHERE product_category_id='$gproduct_category_id' ";
}



if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Category  updated successfully'); 
				window.location='addcat.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('Category not updated'); 
				window.location='addcat.php';				
				</script>";
}


}
?>			
						<?php			
						$get=mysqli_query($con,"SELECT * FROM tbl_product_category  ORDER BY prod_category_name ASC");
							$option = '';
							 while($row = mysqli_fetch_assoc($get))
							{
							  $option .= '<option value = "'.$row['product_category_id'].'">'.$row['prod_category_name'].'</option>';
						$prodcid=$row['product_category_id'];
							}
							
						?>
						<?php echo $option; ?>
<?php

if(isset($_POST["uprod_cat_s"]))
{


$newprodstat=$_POST["statusp"];
$prod_cat_id=$_POST["prod_cat"];

$q_update="UPDATE tbl_product_category SET status='$newprodstat' WHERE product_category_id='$prod_cat_id' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Category  status updated successfully'+$prod_cat_id); 
				window.location='addcat.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('Category status not updated'+$prod_cat_id); 
				window.location='addcat.php';				
				</script>";
}


}
?>
		</table>
</br>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">			
		 <ul class="menu">	
		<h3 class="cate">MENU</h3>
		<ul class="cute">
		<li ><a href="admin_home.php">Home</a></li>
		</ul>
		<ul class="menu">	
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
	<div class="footer">
<?php
$con=mysqli_connect("localhost","root","","organic_shop_db")or die ("Couldn't connect");

if(isset($_POST["submit"]))
{

$mail=$_POST["mail"];
$password=$_POST["password"];
$flag=0;

$disp="SELECT  * from tbl_login WHERE  email='$mail'";

$disp_result=mysqli_query($con,$disp);


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
					echo "<script type='text/javascript'>alert('Logged in successfully'); 
					window.location='customer_home.php';</script>";
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
$_SESSION['errmsg']="Your credentials are invalid ";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
	echo "<script type='text/javascript'>
		alert('Your credentials are invalid or You are not enrolled ..Please sign up now');
		window.location='login.php';
		</script>";
exit();		
}	
}
?>
<?php
}
else
{
	header('Location:login.php');
}
?>

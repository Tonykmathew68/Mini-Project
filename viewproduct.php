<?php
session_start();
if(isset($_SESSION['alogin'])){
	$mail=$_SESSION['alogin'];
?>
<?php
$con=mysqli_connect("localhost","root","","organic_shop")or die ("Couldn't connect");
$disp="SELECT  *from tbl_product ORDER BY name ASC";
$disp_result=mysqli_query($con,$disp);
$prodname="";
$reg="Select rid from tbl_registration WHERE email='$mail'";
$regid=mysqli_query($con,$reg);
$rid_row1=mysqli_fetch_array($regid);
$rid=$rid_row1['rid'];
$viewbrand="Select * from tbl_product where rid='$rid'";
$d_seller_brand=mysqli_query($con,$viewbrand);
?>
<!DOCTYPE html>
<html>
<head>
<title>organicshoppi| view products</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
</head>
<body> 
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					 </div>
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
					<div class="w3l_search" style="margin-top:5px;margin-left:250px">
						</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="register.php"><span></span><?php echo $mail?> </span></a></div>
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
		
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
			<h4>MY PRODUCTS  </h4></a>
				
			     <div class="clearfix"> </div>	
			</div>
		</div>
		<div class="grid-product">		
			<?php while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		  <div class="  product-grid">	  
		  <form action="viewproduct.php" method="POST" name="prod" id="prod">
			<div class="content_box">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="uploads/products/<?php echo $rowp['image'] ?>"  class="img-responsive watch-right" alt="image"/style="width:300px;height:200px;">
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>		   	  
				</div>
				   <b> <h1 style="color:green ;"><b>  <?php   echo $rowp['name'] ;
					?></b></h1>			
				        <?php   echo $rowp['des'] ?> <br>
				   <h3 style="color:red;">  Rs.<?php   echo $rowp['price'] ?> for 1Kg<br></h3>
				     Quntity <?php   echo $rowp['qunty'] ?></b><br>
				 
				 <input type="text" name="prod_id" id="prod_id" value="<?php   echo $rowp['pid'] ?>" hidden>
				 <br>			
				 <a href="delete_seller_prod.php?pid=<?php echo $rowp['pid'];?>&action=edit" background="#FF5733 "; style="color:blue;" ><b>Update</b></a>   
<a href="delete_seller_prod.php?pid=<?php echo $rowp['pid'];?>&action=delete" background="green";  onclick="return (confirm('Are You Sure To Delete ?'));" style="color:red;" ><b>Delete </b></a>
				 </br>
			   	</div>
              </div>
			  </form>
			  
			  	<?php }
				?>		 
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="sub-cate">
				<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">MENU</h3>		
		 <ul class="menu">
		<ul class="kid-menu ">
				<li><a href="seller_home.php"> Home</a></li>
				</ul>
		<li class="item2"><a href="#">Profile<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_profile.php">View Profile </a></li>
				<li class="subitem1"><a href="seller_update.php">Change Password</a></li>
			</ul>
		</li>
		<ul class="kid-menu ">		
				<li><a href="product.php">add product</a></li>
			<li><a href="viewproduct.php">My Products</a></li>				
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
	<div class="clearfix"> </div>
</div>
	<div class="footer">
</body>
</html>
<?php
}
else
{
	header('Location:login.php');
}
?>

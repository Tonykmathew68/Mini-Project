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
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<style>
	
	.errmessage
		{
			color:red;
			text-decoration:capitalize;
			text-tranform-capitalize;
			}
	</style>
</head>
<body> 
		<div class="bottom-header" style="background-color:palegreen;">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
					<font size="4"><strong><i> <b><p style="color:red;">ORGANICSHOPPING </p> </b></i></strong></font>
					</div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="seller_profile.php"><span> </span><?php echo $mail?></a></div>
							
						<div class="cart"><a href="cart_view.php"><span> </span>CART</a></div>
						<ul class="login">
								<li><a href="login.php"><span> </span>LOGOUT</a></li> 
							</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<div class="container"> 
			         
		<div class="register">
		
		<form  action="product.php" method="POST" id="submit1" name="submit1" enctype="multipart/form-data" >
				 <div >
				 
					<h3 ><font color="chillyred"> Add New Product</font></h3>
					<div class="mation">
					<p><b>Product type</b></p>
<select name="cat" class="form-control" id="cat"required> 
        <option value="category">SELECT CATEGORY</option> 
		
		<?php
    
      $disp1="SELECT * from tbl_product_category ";
	$disp_result=mysqli_query($con,$disp1);
	if(mysqli_num_rows($disp_result)>0)
          {
          while($row=mysqli_fetch_array($disp_result))
          { 
            echo "<option value='" . $row[0] ."'>" . $row[1] ."</option>";
          }
        }
  
      ?>
      
 </select>
 <br>
 <br>
          <span><b>Product Name</span>
	     <input class="input-lg thumbnail form-control" type="text" name="name" id="name" onblur="checkFName()" style="width:100%" placeholder="Product Name" required >	   
	   <p id="errorname" class="errmessage">    </p>
					<script>
					
					function checkFName()
												{
												var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;

												if(document.getElementById('name').value==null ||submit1.name.value.length==0)
												{
												document.getElementById('errorname').innerHTML="Mandatory Field!";

												}
												else if(document.getElementById('name').value.match(letters))
												{
												document.getElementById('errorname').innerHTML=" ";

												}

												else
												{
													
												document.getElementById('errorname').innerHTML=" please fill out this field./incorrect format";
												document.getElementById('name').value = " "; 
												}

												}					
					</script>
		<p><b>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="number" class="form-control" name="price"  id="price"  min="1" max="500" placeholder="Price" required >
     
    </div> <span id="price_error_message" style="color:red"></span><br>
		<p>Description</p>
<textarea class="thumbnail form-control" name="des" id="des" style="width:100%; height:100px" placeholder="write here..."required></textarea>
<span id="desc_error_message" style="color:red"></span>
<p>Quantity</p>
<div class="input-group">
    
      <input type="number" name="qunty" id="qunty" class="form-control"  min="1"placeholder="Kg" required >
      <span id="items_error_message" style="color:red"></span>
    </div>
			<label for="date">Expiry Date </label>
  <input type="date" id="date" name="date"class="form-control"   required>
<p>Product Image</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="image" class="btn thumbnail" id="image" accept="application/jpg" required >
<p>image size shoud be less than 1mb</p>
     <span id="ermsg1" name="ermsg1" style="color:red"> </span>
	 <script>
			
									
var validExt = ".jpg,.jpeg,.png";
function fileExtValidate1(fdata) {
 var filePath = fdata.value;
 var getFileExt = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
 var pos = validExt.indexOf(getFileExt);
 if(pos < 0) {
						 document.getElementById("ermsg1").innerHTML='*only .jpg,.jpeg,.png images are allowed.' ;
						  document.getElementById("image").value="";
 	return false;
  } else {
	  	 document.getElementById("ermsg1").innerHTML="";
  	return true;
  }
}
var maxSize = '1024';
function fileSizeValidate1(fdata) {
	 if (fdata.files && fdata.files[0]) {
                var fsize = fdata.files[0].size/1024;
                if(fsize > maxSize) {
                	 //alert('Maximum file size exceed, This file size is: ' + fsize + "KB");
					 document.getElementById("ermsg1").innerHTML='Maximum file size(1 MB) exceed, This file size is: '+ fsize + "KB" ;
					 document.getElementById("image").value="";
                	 return false;
                } else {
					 document.getElementById("ermsg1").innerHTML="";
                	return true;
                }
     }
 }

$("#image").change(function () {
	    if(fileExtValidate1(this)) {
	    	 if(fileSizeValidate1(this)) {
	    	 	showImg(this);
	    	 }	 
	    }    
    });
</script>		
</div>
	
					</div>
					<div class="clearfix"> </div>
					<div class="register-but">
				   <center>
					   <input type="submit" value="Add" name="submit2" id="submit2" style="background-color:green;width:150px;height:50px;color:white;font-family:bold;border-radius:10px;border:2px solid white"  >
					   </center>
				  	</form>
					</div>
					
					 </div>
		
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
			<li class="subitem1"><a href="seller_profile.php">View profile </a></li>
				<li class="subitem1"><a href="seller_update.php">Update password </a></li>			
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
			<li class="item2"><a href="#">complaints<img class="arrow-img " src="images/arrow1.png" alt=""/></a>
			<ul class="cute">
				<li class="subitem1"><a href="seller_complaint.php">New Complaints</a></li>
				<li class="subitem1"><a href="seller_replied_complaints.php">Replied Complaints</a></li>
			</ul>
		</li>
		</li>				
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
	   		     	 	
			</div>      
	</div>
	<div class="footer">
</body>
</html>
<?php
if(isset($_POST["submit2"]))
{
$cat=$_POST["cat"];	
$name=$_POST["name"];
$price=$_POST["price"];
$des=$_POST["des"];
$qunty=$_POST["qunty"];
$date=$_POST["date"];
$Status=0;
$flag=0;
$prodc="";
$user="Select rid from tbl_registration WHERE email='$mail'";
$userid=mysqli_query($con,$user);
$rid_row=mysqli_fetch_array($userid);
$rid=$rid_row['rid'];
$checknamep="Select * from tbl_product WHERE name='$name' and rid='$rid'";
$disp_presult=mysqli_query($con,$checknamep);
while($row=mysqli_fetch_array($disp_presult))
{
$prodc=$row['name'];
if((strcmp($prodc,$name) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The category is already Existing'); 
		
		window.location='product.php';</script>";
		
		break;
	}
}	
if($flag==0)
{	
						$allowedExtsp = array("jpg");
						$image=$_FILES["image"]["name"];
						$tempp = explode(".", $_FILES["image"]["name"]);
						$extensionp = end($tempp);
						move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/products/" . $_FILES["image"]["name"]);					
	$rid=$rid_row['rid'];
	$q_ins1="insert into tbl_product(rid,product_category_id,name,price,des,qunty,date,image,picStatus) values ('$rid','$cat','$name','$price','$des',$qunty,'$date','$image','$Status')";	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('New product added successfully'); 
				window.location='product.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('Not added'); 
				window.location='product.php';				
				</script>";
}

}
else
{
	echo "<script type='text/javascript'>
				
				alert('The product is already added '); 
				window.location='product.php';				
				</script>";
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
